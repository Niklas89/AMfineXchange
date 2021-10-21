<?php
class MobileController extends AppController {

	var $uses = array();
	
	function beforeRender(){
		$this->layout = 'mobile';
	}
	
	function login()
	{
		if ($this->request->is('Post')) {
			$this->Auth->logout();


			if ($this->Auth->login()) {
				$this->Session->setFlash("Vous êtes connecté", "notif");
				$this->redirect('/mobile');
			} //$this->Auth->login()
			else {
			
				$this->Session->setFlash("Identifiants incorrects", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('Post')
		
	}
	
	
	
	function index(){
	
	}
	
	function others(){
		
	
	}
	
	function legalroom(){

	}
	
	
	function faq(){
		
		$this->layout = 'mobile';
		
	}
	
	
	function actus($ref){
		
		
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
	* Affichage d'une page
	**/
	function pages_show($id = null, $slug = null)
	{
		
		
		$this->loadModel('Page');
		$page = $this->Page->find('first', array(
			'recursive' => 2,
			'conditions' => array(
				'Page.id' => $id
			)
		));
		//Authorisations à l'affichage
		if (!$this->Auth->user('id')) {
			$droits = "droits_visiteurs";
		} //!$this->Auth->user('id')
		else {
			$this->loadModel('User');
			$u      = $this->User->findById($this->Auth->user('id'));
			$droits = $u['User']['membership'];
			switch ($droits) {
				case 'User Club Member':
					$droits = "droits_userclub";
					break;
				case 'Legal Room Member':
					$droits = "droits_legalroom";
					break;
				case 'Partenaire':
					$droits = "droits_partenaire";
					break;
				case 'Full Access Member':
					$droits = "droits_fullaccess";
					break;
				default:
					$droits = "droits_invite";
					break;
			} //$droits
		}
		$granted = 0;
		if ($page['Page'][$droits] == 1) {
			$granted = 1;
		} //$page['Page'][$droits] == 1
		if ($granted == 0) {
			$this->Session->setFlash("Not granted", "notifnotgranted");
			$this->redirect('/users/signup');
		} //$granted == 0
		if (!$id) {
			throw new NotFoundException('Id inexistant');
		} //!$id
		if (empty($page)) {
			throw new NotFoundException('Aucune page ne correspond à cet id');
		} //empty($page)
		if ($slug != $page['Page']['slug']) {
			$this->redirect($page['Page']['link'], 301);
		} //$slug != $page['Page']['slug']
		$d['idc'] = 0;
		if ($page['Page']['type'] == "compterendu") {
			$this->loadModel('Event');
			$e        = $this->Event->findByCompterendu($page['Page']['id']);
			$d['idc'] = $e['Event']['id'];
		} //$page['Page']['type'] == "compterendu"
		$this->loadModel('Comment');
		$d['comments'] = $this->Comment->find('all', array(
			'conditions' => array(
				'Comment.page_id' => $page['Page']['id']
			)
		));
		$d['page']     = $page;
		if ($id == 19) {
			$this->paginate = array(
				'limit' => 10
			);
			$d['pages']     = $this->paginate('Page', array(
				'Page.online' => 1,
				'Page.diffusion_legalroom' => 1
			));
			$d['pages2']    = $this->paginate('Page', array(
				'Page.online' => 1,
				'Page.diffusion_legalroom2' => 1
			));
			foreach ($d['pages'] as $k => $v) {
				if ($v['Page']['miniature'] == "") {
					$d['pages'][$k]['Page']['miniature'] = "2012/01/log_in.png";
				} //$v['Page']['miniature'] == ""
			} //$d['pages'] as $k => $v
			foreach ($d['pages2'] as $k => $v) {
				if ($v['Page']['miniature'] == "") {
					$d['pages2'][$k]['Page']['miniature'] = "2012/01/log_in.png";
				} //$v['Page']['miniature'] == ""
			} //$d['pages2'] as $k => $v
		} //$id == 19
		$this->set($d);
	}
	
	
	
	/**
	 * Ajouter un commentaire
	 **/
	function pages_addcomment()
	{
		
		
		$this->loadModel('Comment');
		if ($this->request->is('post')) {
			$d                             = $this->request->data;
			$comment['Comment']            = $d['Pages'];
			$comment['Comment']['user_id'] = $this->Auth->user('id');

			//Vérifie la validation et ajoute le commentaire
			if ($this->Comment->save($comment)) {
				$this->Session->setFlash("Votre commentaire a été posté", "notif");
				$this->loadModel('Activity');
				$this->Activity->create();
				$this->Activity->set('type', 'pagecom');
				$this->Activity->set('additionnal', $comment['Comment']['page_id']);
				$this->Activity->set('user_id', $this->Auth->user('id'));
				$this->Activity->save();
				$this->redirect(array(
					'controller' => 'pages',
					'action' => 'show',
					$comment['Comment']['page_id']
				));
			} //$this->Comment->save($comment)
			else {
				if (isset($comment['Comment']['page_id'])) {
					$id = $comment['Comment']['page_id'];
				} //isset($comment['Comment']['page_id'])
				else {
					$id = $this->request->params['pass']['0'];
					$id = $this->request->params['pass']['0'];
				}
				$this->set('id', $id);
				$this->Session->setFlash("Merci de corriger le formulaire", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post')
		else {
			if (!isset($this->request->params['pass']['0'])) {
				$this->redirect('/');
			} //!isset($this->request->params['pass']['0'])
			else {
				$id = $this->request->params['pass']['0'];
				$this->set('id', $id);
			}
		}
	}
	
	
	
	function bestpractices(){
		
		
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
	
	function etude_de_cas() {
		
		
		$this->loadModel('Page');
		$this->paginate = array(
			'limit' => 10
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
	
	
	/**
	 * Liste des topics sur Forum
	 **/
	function discussions()
	{
		
		
		$this->loadModel('Forumsujet');
		$this->loadModel('Forumcat');
		$d['cats'] = $this->Forumcat->find('all', array(
			'recursive' => 2
		));
		//Authorisations à l'affichage
		if (!$this->Auth->user('id')) {
			$droits = "droits_visiteurs";
		} //!$this->Auth->user('id')
		else {
			$this->loadModel('User');
			$u              = $this->User->findById($this->Auth->user('id'));
			$droits         = $u['User']['membership'];
			$d['userclub']  = 0;
			$d['public']    = 0;
			$d['legalroom'] = 0;
			switch ($droits) {
				case 'User Club Member':
					$d['public']   = 1;
					$d['userclub'] = 1;
					break;
				case 'Legal Room Member':
					$d['public']    = 1;
					$d['legalroom'] = 1;
					break;
				case 'Partenaire':
					$d['public']    = 1;
					$d['userclub']  = 1;
					$d['legalroom'] = 1;
					break;
				case 'Full Access Member':
					$d['public']    = 1;
					$d['userclub']  = 1;
					$d['legalroom'] = 1;
					break;
				default:
					$d['public'] = 1;
					break;
			} //$droits
			$this->set($d);
		}
		$this->set($d);
	}
	
	
	
	
	
		/**
	 * Affiche un post
	 **/
	function discussions_show($id = null)
	{
		
		
		if ($id == null) {
			$this->redirect("/");
		} //$id == null
		$this->loadModel('User');
		$this->loadModel('Forumsujet');
		$d['topic'] = $this->Forumsujet->findById($id);
		//Authorisations à l'affichage
		if (!$this->Auth->user('id')) {
			$droits = "droits_visiteurs";
		} //!$this->Auth->user('id')
		else {
			//Vérification des droits d'accès
			$this->loadModel('User');
			$u                 = $this->User->findById($this->Auth->user('id'));
			$droits            = $u['User']['membership'];
			$d['userclub']     = 0;
			$d['public']       = 0;
			$d['legalroom']    = 0;
			$d['exploitation'] = 0;
			switch ($droits) {
				case 'User Club Member':
					$d['public']       = 1;
					$d['userclub']     = 1;
					$d['exploitation'] = 1;
					break;
				case 'Legal Room Member':
					$d['public']       = 1;
					$d['legalroom']    = 1;
					$d['exploitation'] = 1;
					break;
				case 'Partenaire':
					$d['public']       = 1;
					$d['userclub']     = 1;
					$d['legalroom']    = 1;
					$d['exploitation'] = 1;
					break;
				case 'Full Access Member':
					$d['public']       = 1;
					$d['userclub']     = 1;
					$d['legalroom']    = 1;
					$d['exploitation'] = 1;
					break;
				default:
					$d['public'] = 1;
					break;
			} //$droits
		} 

		//Calcul si affichage popup Not Granted
		if (($d['topic']['Forumcat']['id'] == 3) && $d['public'] == 0) {
			$this->Session->setFlash("Not granted", "notifnotgranted");
			$this->redirect('/users/signup');
		} //($d['topic']['Forumcat']['id'] == 3) && $d['public'] == 0
		if (($d['topic']['Forumcat']['id'] == 6) && $d['public'] == 0) {
			$this->Session->setFlash("Not granted", "notifnotgranted");
			$this->redirect('/users/signup');
		} //($d['topic']['Forumcat']['id'] == 6) && $d['public'] == 0
		if (($d['topic']['Forumcat']['id'] == 7) && $d['legalroom'] == 0) {
			$this->Session->setFlash("Not granted", "notifnotgranted");
			$this->redirect('/users/signup');
		} //($d['topic']['Forumcat']['id'] == 7) && $d['legalroom'] == 0
		if (($d['topic']['Forumcat']['id'] == 8) && $d['userclub'] == 0) {
			$this->Session->setFlash("Not granted", "notifnotgranted");
			$this->redirect('/users/signup');
		} //($d['topic']['Forumcat']['id'] == 8) && $d['userclub'] == 0
		if (($d['topic']['Forumcat']['id'] == 9) && $d['exploitation'] == 0) {
			$this->Session->setFlash("Not granted", "notifnotgranted");
			$this->redirect('/users/signup');
		} //($d['topic']['Forumcat']['id'] == 9) && $d['exploitation'] == 0
		
		//Récupération des posts forums
		$this->paginate = array(
			'limit' => 10,
			'order' => 'Forum.created asc'
		);
		$d['forums']    = $this->paginate('Forum', array(
			'Forum.forumsujet_id' => $id
		));
		$c              = 0;
		foreach ($d['forums'] as $k => $v) {
			$u                                   = $this->User->findById($v['Forum']['user_id']);
			$d['forums'][$k]['Forum']['naming']  = $u['User']['firstname'] . ' ' . $u['User']['lastname'];
			$d['forums'][$k]['Forum']['namingm'] = $u['User']['photo'];
			$c++;
		} //$d['forums'] as $k => $v
		$d['counting'] = $this->Forum->find('count', array(
			'Forum.forumsujet_id' => $id
		));
		$this->set($d);
	}
	
	
	
	
	
	/**
	 * Affichage des membres
	 **/
	function communaute()
	{
		
		
		$this->paginate = array(
			'limit' => 20,
			'order' => 'User.created desc'
		);

		//Affichage par ID (contact de contact)
		if (isset($this->request->query['byid'])) {
			$this->paginate = array(
				'limit' => 20000,
				'order' => 'User.created desc'
			);
			$id             = $this->request->query['byid'];
			$this->loadModel('Relation');
			$relations = $this->paginate('Relation', array(
				'Relation.user_id' => $id
			));
			$users     = array();
			foreach ($relations as $k => $v) {
				$c['User'] = $v['Contact'];
				array_push($users, $c);
			} //$relations as $k => $v
			$d['users'] = $users;
		} //isset($this->request->query['byid'])
		elseif (isset($this->request->query['messagerie'])) {
			//Séléction par messagerie
			$this->paginate = array(
				'limit' => 20000,
				'order' => 'User.created desc'
			);
			$id             = $this->request->query['messagerie'];
			$this->loadModel('Relation');
			$relations = $this->paginate('Relation', array(
				'Relation.user_id' => $this->Auth->user('id')
			));
			$users     = array();
			foreach ($relations as $k => $v) {
				$c['User'] = $v['Contact'];
				array_push($users, $c);
			} //$relations as $k => $v
			$d['users'] = $users;
		} //isset($this->request->query['messagerie'])
		else {
			//Filtrage par Accès
			if (isset($this->request->query['data']['User']['filtre'])) {
				$filtre = $this->request->query['data']['User']['filtre'];
			} //isset($this->request->query['data']['User']['filtre'])
			elseif (isset($this->request->data['User']['filtre'])) {
				$filtre = $this->request->data['User']['filtre'];
			} //isset($this->request->data['User']['filtre'])
				elseif (isset($this->request->params['named']['filter'])) {
				$filtre = $this->request->params['named']['filter'];
			} //isset($this->request->params['named']['filter'])
			else {
				$filtre = "";
			}
			$d['filtre'] = $filtre;
			//$d['users'] = $this->User->find('all',array('conditions'=>array('User.active'=>1,'User.membership LIKE'=>"%$filtre%")));	
			$d['users']  = $this->paginate('User', array(
				'User.active' => 1,
				'User.membership LIKE' => "%$filtre%"
			));
		}
		foreach ($d['users'] as $k => $v) {
			$c                                  = $this->Relation->find('count', array(
				'conditions' => array(
					'Relation.user_id' => $v['User']['id']
				)
			));
			$d['users'][$k]['User']['countrel'] = $c;
			$droits = $v['User']['membership'];
					switch ($droits) {
						case 'User Club Member':
							$img_droits = "filtre_userclub.png";
							break;
						case 'Legal Room Member':
							$img_droits = "filtre_legalroom.png";
							break;
						case 'Partenaire':
							$img_droits = "filtre_partner.png";
							break;
						case 'Full Access Member':
							$img_droits = "filtre_fullaccess.png";
							break;
						case 'Membre invité':
							$img_droits = "filtre_member.png";
							break;
					} //$droits
			$d['users'][$k]['User']['img'] = $img_droits;
		} //$d['users'] as $k => $v
		$this->set($d);
	}
	
	/**
	 *Affichage profil public dans communaute
	 **/
	function profilvoir()
	{
		
		
		if (!isset($this->request->params['pass']['0'])) {
			$this->redirect('/');
		} //!isset($this->request->params['pass']['0'])
		$monid = $this->Auth->User('id');
		if (!$monid) {
			$this->redirect('/users/login');
		} //!$monid
		if ($monid != $this->request->params['pass']['0']) {
			$contact = $this->request->params['pass']['0'];
			$this->loadModel('Activity');
			$count = $count2 = $this->Activity->find('all', array(
				'conditions' => array(
					'Activity.type' => 'lastvisit',
					'Activity.user_id' => $monid,
					'Activity.additionnal' => $contact
				)
			));
			$count = count($count);
			if ($count == 1) {
				$idactivity         = $count2['0']['Activity']['id'];
				$this->Activity->id = $idactivity;
				$add                = $count2['0']['Activity']['additionnal2'] + 1;
				$this->Activity->set('type', 'lastvisit');
				$this->Activity->set('additionnal2', $add);
				$this->Activity->save();
			} //$count == 1
			elseif ($count == 0) {
				$this->Activity->create();
				$this->Activity->set('type', 'lastvisit');
				$this->Activity->set('user_id', $monid);
				$this->Activity->set('additionnal', $contact);
				$this->Activity->set('additionnal2', 1);
				$this->Activity->save();
			} //$count == 0
		} //$monid != $this->request->params['pass']['0']
		$d['user'] = $this->User->findById($this->request->params['pass']['0']);
		$this->set($d);
	}
	
	/**
	 *Affichage de mon profil
	 **/
	function profil()
	{
		
		
	}
	
	/**
	 *  events prochains
	 **/
	function nextevents()
	{
		
		
		$d['events'] = $this->Event->find('all');
		$this->set($d);
	}
	
		/**
	 *  events passés
	 **/
	function pastevents()
	{
		
		
		$d['events'] = $this->Event->find('all');
		$this->set($d);
	}
	
	
	/**
	 * Affichage d'un évènement
	 **/
	function event_show($id = null)
	{
		
		
		$event = $this->Event->find('first', array(
			'recursive' => 2,
			'conditions' => array(
				'Event.id' => $id
			)
		));
		$this->loadModel('Eventcomment');
		$d['comments'] = $this->Eventcomment->find('all', array(
			'conditions' => array(
				'Eventcomment.event_id' => $event['Event']['id']
			)
		));
		if ($event['Event']['finished'] == 1) {
			//$this->redirect('/pages/show/'.$event['Event']['compterendu']);
		} //$event['Event']['finished'] == 1
		if (!$id) {
			throw new NotFoundException('Id inexistant');
		} //!$id
		if (empty($event)) {
			throw new NotFoundException('Aucun évènement ne correspond à cet id');
		} //empty($event)
		$this->loadModel('Participation');
		$d['jeparticipe'] = 0;
		$c                = $this->Participation->find('count', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id'),
				'event_id' => $id
			)
		));
		if ($c == 1) {
			$d['jeparticipe'] = 1;
		} //$c == 1
		$d['participants'] = 0;
		$c                 = $this->Participation->find('count', array(
			'conditions' => array(
				'event_id' => $id
			)
		));
		$d['participants'] = $c;
		$d['event']        = $event;
		$this->set($d);
	}
	
	/**
	 * Ajoute un commentaire sur évènement
	 **/
	function event_addcomment()
	{
		
		
		$this->loadModel('Eventcomment');
		if ($this->request->is('post')) {
			$d                                  = $this->request->data;
			$comment['Eventcomment']            = $d['Events'];
			$comment['Eventcomment']['user_id'] = $this->Auth->user('id');
			if ($this->Eventcomment->save($comment)) {
				$this->Session->setFlash("Votre commentaire a été posté", "notif");
				$this->loadModel('Activity');
				$this->Activity->create();
				$this->Activity->set('type', 'eventcom');
				$this->Activity->set('additionnal', $comment['Eventcomment']['event_id']);
				$this->Activity->set('user_id', $this->Auth->user('id'));
				$this->Activity->save();
				$this->redirect(array(
					'controller' => 'events',
					'action' => 'show',
					$comment['Eventcomment']['event_id']
				));
			} //$this->Eventcomment->save($comment)
			else {
				if (isset($comment['Eventcomment']['event_id'])) {
					$id = $comment['Eventcomment']['event_id'];
				} //isset($comment['Eventcomment']['event_id'])
				else {
					$id = $this->request->params['pass']['0'];
					$id = $this->request->params['pass']['0'];
				}
				$this->set('id', $id);
				$this->Session->setFlash("Merci de corriger le formulaire", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post')
		else {
			if (!isset($this->request->params['pass']['0'])) {
				$this->redirect('/');
			} //!isset($this->request->params['pass']['0'])
			else {
				$id = $this->request->params['pass']['0'];
				$this->set('id', $id);
			}
		}
	}

	/**
	 * Liste de mes relations
	 **/
	function contact()
	{
		
		
		
		$this->loadModel('Relation');
		
		$this->paginate = array(
			'limit' => 6,
			'order' => 'Relation.created desc'
		);
		$d['relations'] = $this->Relation->find('all', array(
			'conditions' => array(
				'Relation.user_id' => $id
			)
		));
		$d['relations'] = $this->paginate('Relation', array(
			'Relation.user_id' => $id
		));
		$d['counting']  = $this->Relation->find('count', array(
			'conditions' => array(
				'Relation.user_id' => $id
			)
		));
		$this->set($d);
	}
	
	
	
	/**
	 * Inviter un ami
	 **/
	public function contactadd($id)
	{
		if (!$this->Auth->user('id'))
			$this->redirect($this->referer());
		if ($id == $this->Auth->user('id')) {
			$this->redirect('/mobile/communaute');
		} //$id == $this->Auth->user('id')
		$this->loadModel('Relation');
		$this->Relation->create();
		$this->Relation->set('user_id', $this->Auth->user('id'));
		$this->Relation->set('contact_id', $id);
		$test = $this->Relation->find('count', array(
			'conditions' => array(
				'Relation.user_id' => $this->Auth->user('id'),
				'Relation.contact_id' => $id
			)
		));
		if ($test == 0) {
			$this->Relation->save();
		} //$test == 0
		$this->redirect('/mobile/contact');
	}
	
	/**
	 * Messagerie Inter Utilisateur
	 **/
	function messagerie()
	{
		
		
		$this->loadModel('Message');
		//Liste des messages
		$d['messages'] = $this->Message->find('all', array(
			'conditions' => array(
				'Message.receiver_id' => $id
			)
		));
		$this->set($d);
	}
	
	
	/**
	 * Envoyer un message
	 **/
	function messagerieenvoyer()
	{
		
		
		if ($this->request->data) {
			$data = $this->request->data;
			$this->loadModel('Relation');
			$c = $this->Relation->find('count', array(
				'conditions' => array(
					'Relation.user_id' => $this->Auth->user('id'),
					'Relation.contact_id' => $data['Message']['contact_id']
				)
			));
			if ($c == 0) {
				echo "ip logged";
				exit;
			} //$c == 0
			$this->loadModel('Message');
			$data['Message']['sender_id']   = $this->Auth->user('id');
			$data['Message']['receiver_id'] = $data['Message']['contact_id'];
			$receiver                       = $this->User->findById($data['Message']['receiver_id']);
			if ($this->Message->save($data)) {
				$mail = new CakeEmail();
				$mail->from('noreply@amfinexchange.com')->to($receiver['User']['email'])->subject('Amfinexchange.com | Nouveau message')->emailFormat('html')->template('message')->viewVars(array(
					'username' => $receiver['User']['firstname'] . ' ' . $receiver['User']['lastname']
				))->send();
				$this->Session->setFlash("Votre message a bien été envoyé.", "notif");
				$this->redirect('/mobile/messagerie');
			} //$this->Message->save($data)
			else {
				$this->Session->setFlash("Votre message n'est pas correct.", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->data
	}
	
	
	//Formatage de date (à suppr)
	function date_fran2($time)
	{
		$mois  = array(
			"Janvier",
			"Fevrier",
			"Mars",
			"Avril",
			"Mai",
			"Juin",
			"Juillet",
			"Août",
			"Septembre",
			"Octobre",
			"Novembre",
			"Decembre"
		);
		$jours = array(
			"Dimanche",
			"Lundi",
			"Mardi",
			"Mercredi",
			"Jeudi",
			"Vendredi",
			"Samedi"
		);
		return $jours[date("w", $time)] . " " . date("j", $time) . (date("j", $time) == 1 ? "er" : " ") . $mois[date("n", $time) - 1] . " " . date("Y", $time);
	}
	
	
	

	function logout()
	{
		$this->Auth->logout();
		$this->redirect('/mobile/login');
	}
}

?>