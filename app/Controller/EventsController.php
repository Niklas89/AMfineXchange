<?php
class EventsController extends AppController
{
	/**
	 *  Non utilisé
	 **/
	function index()
	{
		$d['events'] = $this->Event->find('all');
		$this->set($d);
	}
	/**
	 * Liste des évènements
	 **/
	function admin_index()
	{
		$d['items'] = $this->Paginate('Event');
		$this->set($d);
	}

	/**
	 * Renvoi au compte rendu
	 **/
	function showc($id = null)
	{
		$event = $this->Event->find('first', array(
			'recursive' => 2,
			'conditions' => array(
				'Event.id' => $id
			)
		));
		if ($event['Event']['finished'] == 1) {
			$this->redirect('/pages/show/' . $event['Event']['compterendu']);
		} //$event['Event']['finished'] == 1
	}
	/**
	 * Affichage d'un évènement
	 **/
	function show($id = null)
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
	 * Participer à un événement
	 **/
	function participe()
	{
		if (!$this->Auth->user('id')) {
			$this->redirect('/users/login');
		} //!$this->Auth->user('id')
		$eventid = $this->request->params['pass']['0'];
		$this->loadModel('Participation');
		$this->Participation->create();
		$this->Participation->set('user_id', $this->Auth->user('id'));
		$this->Participation->set('event_id', $eventid);
		$this->Participation->save();
		$this->loadModel('Activity');
		$this->Activity->create();
		$this->Activity->set('type', 'participe');
		$this->Activity->set('additionnal', $eventid);
		$this->Activity->set('user_id', $this->Auth->user('id'));
		$this->Activity->save();
		$this->Session->setFlash("Votre participation est enregistrée", "notif");
		$this->redirect($this->referer());
	}

	/**
	 * Ne pas participer à un événement
	 **/
	function participeno()
	{
		if (!$this->Auth->user('id')) {
			$this->redirect('/users/login');
		} //!$this->Auth->user('id')
		$eventid = $this->request->params['pass']['0'];
		$this->loadModel('Participation');
		$this->Participation->deleteAll(array(
			'Participation.user_id' => $this->Auth->user('id'),
			'Participation.event_id' => $eventid
		));
		$this->loadModel('Activity');
		$this->Activity->deleteAll(array(
			'Activity.user_id' => $this->Auth->user('id'),
			'Activity.type' => 'participe',
			'Activity.additionnal' => $eventid
		));
		$this->Session->setFlash("Votre participation a bien été annulée", "notif");
		$this->redirect($this->referer());
	}

	/**
	 * Ajoute un commentaire sur évènement
	 **/
	function addcomment()
	{
		if (!$this->Auth->user('id')) {
			$this->redirect('/users/login');
		} //!$this->Auth->user('id')
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
	 * Edition en admin d'un évènement + miniatures
	 **/
	function admin_edit($id = null)
	{
		if (!empty($this->request->data)) {
			$originallogo = "";
			if (isset($this->request->data['Event']['id'])) {
				$e            = $this->Event->findById($this->request->data['Event']['id']);
				$originallogo = $e['Event']['logo'];
			} //isset($this->request->data['Event']['id'])
			$dir = IMAGES . date('Y');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
			$dir .= DS . date('m');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
			$f        = explode('.', $this->request->data['Event']['logo']['name']);
			$ext      = end($f);
			$filename = Inflector::slug(implode('.', array_slice($f, 0, -1)));
			$fileurl  = date('Y') . '/' . date('m') . '/' . $filename . '.' . $ext;
			if (empty($this->request->data['Event']['logo']['name'])) {
				$this->request->data['Event']['logo'] = $originallogo;
			} //empty($this->request->data['Event']['logo']['name'])
			else {
				$this->request->data['Event']['logo2'] = $this->request->data['Event']['logo'];
				$this->request->data['Event']['logo']  = $fileurl;
			}
			if ($this->Event->save($this->request->data)) {
				if ($this->request->data['Event']['logo'] != $originallogo) {
					move_uploaded_file($this->request->data['Event']['logo2']['tmp_name'], $dir . DS . $filename . '.' . $ext);
				} //$this->request->data['Event']['logo'] != $originallogo
				$this->Session->setFlash("L'évènement a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Event->save($this->request->data)
			else {
				$this->Session->setFlash("L'évènement n'a pas pu être sauvegardé", "notif");
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Event->id     = $id;
			$this->request->data = $this->Event->read();
		} //$id != null
		$this->loadModel('Page');
		$d['pages'] = $this->Page->find('list', array(
			'conditions' => array(
				'Page.type' => 'compterendu'
			)
		));
		$this->set($d);
	}

	/**
	 * Suppression d'un évènement
	 **/
	function admin_delete($id)
	{
		$this->Event->delete($id);
		$this->Session->setFlash("L'évènement a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
}