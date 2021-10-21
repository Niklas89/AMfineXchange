<?php
class CommentsController extends AppController
{

		
	/**
	 * Liste des commentaires admin
	 **/
	function admin_index()
	{
		$this->loadModel('Eventcomment');
		$d['items']  = $this->Paginate('Comment');
		$d['items2'] = $this->Paginate('Eventcomment');
		$this->set($d);
	}

		
	/**
	 * Ajout/Edition d'un commentaire
	 **/
	function admin_edit($id = null)
	{
		if (!empty($this->request->data)) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash("Le Commentaire a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Comment->save($this->request->data)
			else {
				$this->Session->setFlash("Le Commentaire n'a pas pu être sauvegardé", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Comment->id   = $id;
			$this->request->data = $this->Comment->read();
		} //$id != null
	}

		
	/**
	 * Ajout/Edition d'un commentaire sur évènement
	 **/
	function admin_edit2($id = null)
	{
		$this->loadModel('Eventcomment');
		if (!empty($this->request->data)) {
			if ($this->Eventcomment->save($this->request->data)) {
				$this->Session->setFlash("Le Commentaire a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Eventcomment->save($this->request->data)
			else {
				$this->Session->setFlash("Le Commentaire n'a pas pu être sauvegardé", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Eventcomment->id = $id;
			$this->request->data    = $this->Eventcomment->read();
		} //$id != null
	}

	/**
	 * Suppression d'un commentaire
	 **/
	function admin_delete($id)
	{
		$this->Comment->delete($id);
		$this->Session->setFlash("Le Commentaire a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
	/**
	 * Suppression d'un commentaire sur évènement
	 **/
	function admin_delete2($id)
	{
		$this->loadModel('Eventcomment');
		$this->Eventcomment->delete($id);
		$this->Session->setFlash("Le Commentaire a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
}