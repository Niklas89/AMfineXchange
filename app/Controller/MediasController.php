<?php
class MediasController extends AppController
{
	function beforeFilter()
	{
		//Layout du mini uploader tiny
		$this->layout = 'modal';
	}

	/**
	 * Suppression en admin du média
	 **/
	function admin_delete($id)
	{
		$this->Media->id = $id;
		$file            = $this->Media->field('file');
		$this->Media->delete($id);
		$this->Session->setFlash("Le Media a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}

	/**
	 * Affichage du récap d'ajout du media (en admin)
	 **/
	function admin_show($id = null)
	{
		$d = array();
		if ($this->request->is('post')) {
			$this->set($this->request->data['Media']);
			$this->layout = false;
			$this->render('tinymce');
			return;
		} //$this->request->is('post')
		if ($id) {
			$this->Media->id = $id;
			$media           = current($this->Media->read());
			$d['url']        = Router::url('/img/' . $media['file']);
			$d['alt']        = "Media" . $media['name'];
			$d['src']        = "/img/" . $media['file'];
			$d['class']      = "alignLeft";
			$this->set($d);
		} //$id
		else {
			$d = $this->request->query;
		}
	}
	/**
	 * Liste des médias en admin (tinymce)
	 **/
	function admin_index($page_id = null)
	{
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
			$f        = explode('.', $data['Media']['file']['name']);
			$ext      = end($f);
			$filename = strtolower(Inflector::slug(implode('.', array_slice($f, 0, -1))));
			//Sauvegarde en bdd
			$success  = $this->Media->save(array(
				'name' => $data['Media']['name'],
				'file' => date('Y') . '/' . date('m') . '/' . $filename . mktime() . '.' . $ext,
				'user_id' => $this->Auth->user('id')
			));
			if ($success) {
				move_uploaded_file($data['Media']['file']['tmp_name'], $dir . '/' . $filename . mktime() . '.' . $ext);
				$this->Session->setFlash("Fichier envoyé.", "notif");
			} //$success
			else {
				$this->Session->setFlash("Le fichier n'est pas au bon format.", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post')
		$d['medias'] = $this->Media->find('all', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')
			)
		));
		$this->set($d);
	}
}
?>