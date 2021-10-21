<?php
class ContactsController extends AppController
{
	/**
	 * Index du formulaire de contact
	 **/
	function index()
	{
		$this->loadModel('Contact');
		$this->loadModel('User');
		$d['moi'] = $this->User->findById($this->Auth->user('id'));
		$this->set($d);
		if ($this->request->is('post')) {
			$d = $this->request->data;
			if ((!empty($d['Contact']['nom'])) && (!empty($d['Contact']['prenom'])) && (!empty($d['Contact']['email'])) && (!empty($d['Contact']['message']))) {
				// Envoi du message
				$mail = new CakeEmail();
				$mail->from($d['Contact']['email'])->to(Configure::read('site.emailadmin'))->subject('Amfinexchange.com | Un formulaire de contact a été envoyé')->emailFormat('html')->template('contactform')->viewVars(array(
					'data' => $d
				))->send();
				$this->Session->setFlash("Message envoyé", "notif");
				$this->redirect('/');
			} //(!empty($d['Contact']['nom'])) && (!empty($d['Contact']['prenom'])) && (!empty($d['Contact']['email'])) && (!empty($d['Contact']['message']))
			else {
				$this->Session->setFlash("Un ou plusieurs champs sont vides.", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post')
	}
}