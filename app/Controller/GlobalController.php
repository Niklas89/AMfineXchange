<?php
class GlobalController extends AppController
{
	/**
	 * Formulaire ajout best practices
	 **/
	function addbes()
	{
		if (!$this->Auth->user('id')) {
			$this->redirect($this->referer());
		} //!$this->Auth->user('id')
		if (isset($this->request->data['Page']['id'])) {
			exit;
		} //isset($this->request->data['Page']['id'])
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$dir  = IMAGES . date('Y');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
			$dir .= DS . date('m');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)

			//Upload image
			$f        = explode('.', $data['Page']['miniature']['name']);
			$ext      = end($f);
			$filename = Inflector::slug(implode('.', array_slice($f, 0, -1)));
			$fileurl  = date('Y') . '/' . date('m') . '/' . $filename . '.' . $ext;
			if (isset($data['Page']['id'])) {
				$p = $this->Page->findById($data['Page']['id']);
				$m = $p['Page']['miniature'];
			} //isset($data['Page']['id'])
			if ($data['Page']['miniature']['name'] != "") {
				$data['Page']['naming']    = $data['Page']['miniature'];
				$data['Page']['miniature'] = $fileurl;
			} //$data['Page']['miniature']['name'] != ""
			elseif (empty($data['Page']['miniature']['name'])) {
				$data['Page']['miniature'] = $m;
			} //empty($data['Page']['miniature']['name'])
			else {
				$data['Page']['miniature'] = "";
			}



			//Validation et sauvegarde
			if ($this->Page->save($data)) {
				if (!empty($data['Page']['naming'])) {
					move_uploaded_file($this->request->data['Page']['miniature']['tmp_name'], $dir . DS . $filename . '.' . $ext);
				} //!empty($data['Page']['naming'])
				$this->Session->setFlash("La page a bien été soumise", "notif");
				$this->redirect(array(
					'action' => 'bestpractices'
				));
			} //$this->Page->save($data)
			else {
				$this->Session->setFlash("Veuillez verifiez les informations soumises", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post')
		$this->loadModel('User');
		$d['listu'] = $this->User->find('list');
		$this->set($d);
	}

		
	/**
	 * Page d'accueil
	 **/
	public function index()
	{
		$this->loadModel('Page');
		$this->paginate = array(
			'limit' => 5
		);
		if (!isset($this->request->params['pass']['0'])) {
			$this->request->params['pass']['0'] = 0;
		} //!isset($this->request->params['pass']['0'])
		$affectation = $this->request->params['pass']['0'];
		if ($this->request->params['pass']['0'] == 0) {
			$d['news'] = $this->paginate('Page', array(
				'online' => 1,
				'Page.diffusion_une' => 1
			));
		} //$this->request->params['pass']['0'] == 0
		else {
			$d['news'] = $this->paginate('Page', array(
				'online' => 1,
				'Page.diffusion_une' => 1,
				'Page.affectation' => $affectation
			));
		}
		foreach ($d['news'] as $k => $v) {
			if ($v['Page']['miniature'] == "") {
				$d['news'][$k]['Page']['miniature'] = "2012/01/log_in.png";
			} //$v['Page']['miniature'] == ""
		} //$d['news'] as $k => $v
		$this->set($d);
	}



	/**
	 * Ajout en FAQ
	 **/
	function addfaq()
	{
		if (strlen($this->request->data['Globals']['faq']) == 0) {
			$this->Session->setFlash("Votre proposition est vide", "notif", array(
				'type' => 'error'
			));
		} //strlen($this->request->data['Globals']['faq']) == 0
		else {
			$mail = new CakeEmail();
			$this->loadModel('User');
			$d                     = $this->User->findById($this->Auth->user('id'));
			$d['User']['username'] = $d['User']['firstname'] . " " . $d['User']['lastname'];
			$mail->from('noreply@amfinexchange.com')->to(Configure::read('site.emailadmin'))->subject('Amfinexchange.com | Demande de mise à jour de la faq')->emailFormat('html')->template('faq')->viewVars(array(
				'username' => $d['User']['username'],
				'faq' => $this->request->data['Globals']['faq']
			))->send();
			$this->Session->setFlash("Votre proposition a bien été enregistrée", "notif");
		}
		$this->redirect($this->referer());
	}


	/**
	 * Rendu formulaire de recherche
	 **/
	function recherche()
	{
		$search = $this->request->data['search'];
		$this->loadModel('Page');
		$this->loadModel('Forum');
		$this->loadModel('Forumsujet');
		$this->loadModel('User');
		$this->loadModel('Event');
		$d['search']  = $search;
		$d['pages']   = $this->Page->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'Page.online' => 1,
				'Page.type !=' => 'footer',
				'OR' => array(
					'Page.content LIKE' => "%$search%",
					'Page.name LIKE' => "%$search%"
				)
			)
		));
		$d['forums']  = $this->Forum->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'OR' => array(
					'Forum.sujet LIKE' => "%$search%",
					'Forum.content LIKE' => "%$search%",
					'Forum.resume LIKE' => "%$search%"
				)
			)
		));
		$d['forums2'] = $this->Forumsujet->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'OR' => array(
					'Forumsujet.sujet LIKE' => "%$search%",
					'Forumsujet.message LIKE' => "%$search%"
				)
			)
		));
		$d['forums']  = array_merge((array) $d['forums'], (array) $d['forums2']);
		$d['users']   = $this->User->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'User.active' => 1,
				'OR' => array(
					'User.username LIKE' => "%$search%",
					'User.firstname LIKE' => "%$search%",
					'User.lastname LIKE' => "%$search%",
					'User.statut LIKE' => "%$search%",
					'User.membership LIKE' => "%$search%",
					'User.presentation LIKE' => "%$search%",
					'User.centresinterets LIKE' => "%$search%",
					'User.sport LIKE' => "%$search%",
					'User.cultureart LIKE' => "%$search%",
					'User.societecategorie LIKE' => "%$search%",
					'User.societesiteinternet LIKE' => "%$search%",
					'User.societesecreuractivite LIKE' => "%$search%",
					'User.telmobile LIKE' => "%$search%",
					'User.languesparlees LIKE' => "%$search%",
					'User.fonction LIKE' => "%$search%",
					'User.service LIKE' => "%$search%",
					'User.clubassociation LIKE' => "%$search%",
					'User.blog LIKE' => "%$search%",
					'User.societe LIKE' => "%$search%",
					'User.ville LIKE' => "%$search%",
					'User.pays LIKE' => "%$search%",
					'User.site LIKE' => "%$search%"
				)
			)
		));
		$d['events']  = $this->Event->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'OR' => array(
					'Event.theme LIKE' => "%$search%",
					'Event.presentation LIKE' => "%$search%",
					'Event.programme LIKE' => "%$search%",
					'Event.baseline LIKE' => "%$search%",
					'Event.organisateur LIKE' => "%$search%"
				)
			)
		));
		$this->set($d);
	}

	
	/**
	 * bestpractices affichage liste
	 **/
	function bestpractices()
	{
		$this->loadModel('Page');
		$this->paginate = array(
			'limit' => 5
		);
		$d['pages']     = $this->paginate('Page', array(
			'Page.online' => 1,
			'Page.diffusion_bestpractices' => 1
		));
		foreach ($d['pages'] as $k => $v) {
			if ($v['Page']['miniature'] == "") {
				$d['pages'][$k]['Page']['miniature'] = "2012/01/log_in.png";
			} //$v['Page']['miniature'] == ""
		} //$d['pages'] as $k => $v
		$this->set($d);
	}
}