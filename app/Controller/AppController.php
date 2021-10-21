<?php
class AppController extends Controller
{
	var $helpers = array('Form', 'Html', 'Session', 'Formattext', 'Time');
	public $components = array('Session', 'Cookie', 'Auth' => array('authenticate' => array('Form' => array('fields' => array('username' => 'email'), 'scope' => array('User.active' => 1)))), 'Email');
	function beforeFilter()
	{
		$this->loadModel('User');
		$this->loadModel('Eventfront');
		$d['eventfront'] = $this->Eventfront->findById(1);

		//User courant
		$me              = $this->User->findById($this->Auth->user('id'));
		$this->set('me', $this->User->findById($this->Auth->user('id')));
		//affichage en Legalroom Access
		$membership         = $me['User']['membership'];
		$d['display_legal'] = 0;
		switch ($membership) {
			case 'User Club Member':
				$d['display_legal'] = 0;
				break;
			case 'Legal Room Member':
				$d['display_legal'] = 1;
				break;
			case 'Partenaire':
				$d['display_legal'] = 1;
				break;
			case 'Full Access Member':
				$d['display_legal'] = 1;
				break;
			default:
				$d['display_legal'] = 0;
				break;
		} //$membership




		//A participer au sondage?
		$this->loadModel('Sondage');
		$d['sondageactif'] = 0;
		$d['sondageactif'] = $this->Sondage->find('count', array(
			'conditions' => array(
				'Sondage.actif' => 1
			)
		));
		$s                 = $this->Sondage->findByActif(1);
		$d['sondage']      = $s;
		$d['participer']   = 0;
		foreach ($s['Sondageparticipation'] as $k => $v) {
			if ($v['user_id'] == $this->Auth->user('id')) {
				$d['participer'] = 1;
			} //$v['user_id'] == $this->Auth->user('id')
		} //$s['Sondageparticipation'] as $k => $v


	 	//Participation à des évènements
		$participations = $me['Participation'];
		$part           = array();
		if ($me) {
			$this->loadModel('Participation');
			$this->loadModel('Event');
			foreach ($participations as $k => $v) {
				$e = $this->Event->findById($v['event_id']);
				array_push($part, $e);
			} //$participations as $k => $v
			$this->set('part', $part);
		} //$me



		// Première visite
		$this->set('topop', '0');
		if (isset($_COOKIE["visites"])) {
			$numvisites = $_COOKIE["visites"];
		} //isset($_COOKIE["visites"])
		else {
			$numvisites = 0;
		}
		if ($numvisites) {
			setcookie("visites", $numvisites + 1, time() + 365 * 24 * 60 * 60);
			/* expire dans 1 an */
			$modulo = fmod($numvisites, 5);
		} //$numvisites
		if ($this->request->params['action'] == "signup") {
			$w = 0;
		} //$this->request->params['action'] == "signup"
		if (($modulo == 0)) {
			if (empty($me)) {
				$w = 1;
			} //empty($me)
			else {
				$w = 0;
			}
		} //($modulo == 0)
		else {
			$w = 0;
		}


		//Dernières pages + Derniers postes forums en sidebar
		$this->set('topop', $w);
		$this->loadModel('Page');
		$this->loadModel('Forumsujet');
		$d['leftp'] = $this->Page->find('all', array(
			'limit' => 5,
			'order' => 'Page.id desc',
			'conditions' => array(
				'Page.diffusion_une' => 1,
				'Page.online' => 1
			)
		));
		$d['leftf'] = $this->Forumsujet->find('all', array(
			'limit' => 5,
			'order' => 'Forumsujet.id desc'
			)
		);
		$user_id    = $this->Auth->user('id');
		// Cherche les messages de partage



		//Partages ajax de mes relations
		$this->loadModel('Relation');
		$r = $this->Relation->find('all', array(
			'conditions' => array(
				'Relation.user_id' => $this->Auth->user('id')
			)
		));

		foreach ($r as $k => $v) {
			if ($v['Contact']['partage'] == "")
				unset($r[$k]);
		} //$r as $k => $v
	
		$d['etats'] = $r;



		//Recup les events
		$this->loadModel('Event');
		$e              = $this->Event->find('all', array(
			'limit' => 5,
			'order' => 'date asc',
			'conditions' => array(
				'Event.date >' => date('Y-m-d', time())
			)
		));
		$d['eventslid'] = $e;
		$d['user_id']   = $user_id;



		//Test affichage layout admin
		if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == "admin") {
			$this->loadModel('User');
			$qui = $this->User->findById($this->Auth->user('id'));
			if (($qui['User']['role'] == 1) || ($qui['User']['id'] == 1)) {
				//Good
			} //($qui['User']['role'] == 1) || ($qui['User']['id'] == 1)
			elseif (($qui['User']['role'] == 3 && $this->request->params['controller'] == "forums")) {
			} //($qui['User']['role'] == 3 && $this->request->params['controller'] == "forums")
				elseif (($qui['User']['role'] == 3 && $this->request->params['controller'] == "comments")) {
			} //($qui['User']['role'] == 3 && $this->request->params['controller'] == "comments")
				elseif (($qui['User']['role'] == 3 && $this->request->params['controller'] == "pages")) {
				$this->redirect('/admin/comments');
			} //($qui['User']['role'] == 3 && $this->request->params['controller'] == "pages")
			else {
				if ($this->Auth->user('id') != 1) {
					$this->redirect('/');
				} //$this->Auth->user('id') != 1
			}
			$this->layout = "admin";
		} //isset($this->request->params['prefix']) && $this->request->params['prefix'] == "admin"
		if ($this->Auth->user('id') == 1) {
			$d['admin'] = 1;
		} //$this->Auth->user('id') == 1
		else {
			$d['admin'] = 0;
		}
		
		//Calcul des accès
		$this->Auth->allow();
		$this->set($d);
		
	}
	/*
	if($this->detect_mobile()){
	    $this->layout = 'mobile';
	  }
	function detect_mobile() {
	    $useragent = $_SERVER['HTTP_USER_AGENT'];
	    $useragent = strtolower($useragent);

	    if(strrpos($useragent,"iphone") > 0 || strrpos($useragent,"symbianos") > 0 || strrpos($useragent,"ipad") > 0 || strrpos($useragent,"ipod") > 0 || strrpos($useragent,"android") > 0 || strrpos($useragent,"blackberry") > 0 || strrpos($useragent,"samsung") > 0 || strrpos($useragent,"nokia") > 0 || strrpos($useragent,"windows ce") > 0 || strrpos($useragent,"sonyericsson") > 0 || strrpos($useragent,"webos") > 0 || strrpos($useragent,"wap") > 0 || strrpos($useragent,"motor") > 0 || strrpos($useragent,"symbian") > 0)
	        return true;
	    else
	        return false;

	}
	
	*/
	
}
?>