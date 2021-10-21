<?php
class AdsController extends AppController
{
	/**
	 * Index ads administrateur
	 **/
	function admin_index()
	{
		$d['items'] = $this->Paginate('Ad');
		$this->loadModel('Event');
		$d['options2'] = $this->Event->find('list');
		$this->set($d);
	}
	/**
	 * Affichage footer sans layout
	 **/
	function showfooter($id)
	{
		$page = $this->Ad->find('first', array(
			'recursive' => 2,
			'conditions' => array(
				'Ad.id' => $id,
				'Ad.open' => '1'
			)
		));
		echo $page['Ad']['content'];
		$this->layout = false;
		$d['page']    = $page;
		$this->set($d);
	}
	/**
	 * Edit ads administrateur
	 **/
	function admin_edit($id = null)
	{
		if (!empty($this->request->data)) {
			if ($this->Ad->save($this->request->data)) {
				$this->Session->setFlash("La publicité a bien été sauvegardée", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Ad->save($this->request->data)
			else {
				$this->Session->setFlash("La publicité n'a pas pu être sauvegardée", "notif");
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Ad->id        = $id;
			$this->request->data = $this->Ad->read();
		} //$id != null
	}
}
?>