<?php
class ProductsController extends AppController
{
	/**
	 * Liste des produits en admin
	 **/
	function admin_index()
	{
		$d['items'] = $this->Paginate('Product');
		$this->set($d);
	}
	/**
	 * Editions des produits en admin
	 **/
	function admin_edit($id = null)
	{
		if (!empty($this->request->data)) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash("La page produit a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Product->save($this->request->data)
			else {
				$this->Session->setFlash("La page produit n'a pas pu être sauvegardé", "notif");
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Product->id   = $id;
			$this->request->data = $this->Product->read();
		} //$id != null
		$this->loadModel('Page');
		$d['p1'] = $this->Page->find('list');
		$d['p2'] = $this->Page->find('list');
		$d['p3'] = $this->Page->find('list');
		$d['p4'] = $this->Page->find('list');
		$this->set($d);
	}
	/**
	 * Suppression des produits en admin
	 **/
	function admin_delete($id)
	{
		$this->Product->delete($id);
		$this->Session->setFlash("La page produit a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
}