<?php
class ForumsController extends AppController
{
	/**
	 * Liste des topics sur Forum
	 **/
	function index()
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
	 * Liste des message
	 **/
	function participer()
	{
	}
	/**
	 * Ajouter une réponse
	 **/
	function addrep($id = null)
	{
		if (!empty($this->request->data)) {
			//Vérifie si nous sommes connecté
			if (!isset($this->request->data['Forums']['forumsujet_id'])) {
				$this->redirect('/');
			} //!isset($this->request->data['Forums']['forumsujet_id'])


			$this->Forum->set('user_id', $this->Auth->user('id'));
			//Valide et sauvegarde la réponse
			if ($this->Forum->save($this->request->data['Forums'])) {
				$this->Session->setFlash("Votre réponse a bien été sauvegardé", "notif");

				//Participation en activité
				$this->loadModel('Activity');
				$this->Activity->create();
				$this->Activity->set('type', 'discussion');
				$this->Activity->set('additionnal', $this->request->data['Forums']['forumsujet_id']);
				$this->Activity->set('user_id', $this->Auth->user('id'));
				$this->Activity->save();
				$this->redirect(array(
					'action' => 'show',
					$this->request->data['Forums']['forumsujet_id']
				));
			} //$this->Forum->save($this->request->data['Forums'])
			else {
				//Affichage Erreur
				$this->Session->setFlash("Votre réponse comporte un champ vide", "notif", array(
					'type' => 'error'
				));

			}
		} //!empty($this->request->data)
		elseif ($id != null) {

		} //$id != null
	}
	function addrep2($id = null)
	{
		if (!empty($this->request->data)) {
			//Vérifie si nous sommes connecté
			if (!isset($this->request->data['Forums']['forumsujet_id'])) {
				$this->redirect('/');
			} //!isset($this->request->data['Forums']['forumsujet_id'])

			// Si demande d'édition->Exit
			if (isset($this->request->data['Forums']['id']) && ($this->request->data['Forums']['id'] != "")) {
				$fo = $this->Forum->findById($this->request->data['Forums']['id']);
				if ($fo['Forum']['user_id'] != $this->Auth->user('id')) {
					echo "ip logged";
					exit;
				} //$fo['Forum']['user_id'] != $this->Auth->user('id')
			} //isset($this->request->data['Forums']['id']) && ($this->request->data['Forums']['id'] != "")
			$this->request->data['Forums']['user_id'] = $this->Auth->user('id');

			//Valide et sauvegarde la réponse
			if ($this->Forum->save($this->request->data['Forums'])) {
				$this->Session->setFlash("Votre réponse a bien été sauvegardé", "notif");

				//Participation en activité
				$this->loadModel('Activity');
				$this->Activity->create();
				$this->Activity->set('type', 'discussion');
				$this->Activity->set('additionnal', $this->request->data['Forums']['forumsujet_id']);
				$this->Activity->set('user_id', $this->Auth->user('id'));
				$this->Activity->save();
				$this->redirect(array(
					'action' => 'show',
					$this->request->data['Forums']['forumsujet_id']
				));
			} //$this->Forum->save($this->request->data['Forums'])
			else {
				//Affichage Erreur
				$this->Session->setFlash("Votre réponse comporte un champ vide", "notif", array(
					'type' => 'error'
				));
				$this->Forum->id     = $id;
				$this->request->data = $this->Forum->read();
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Forum->id     = $id;
			$this->request->data = $this->Forum->read();
		} //$id != null
	}
	/**
	 * Affiche un post
	 **/
	function show($id = null)
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
	 * Ajout/Edition d'un sujet pour les discussions
	 **/
	function admin_addsujet($id = null)
	{
		$this->loadModel('Forumsujet');
		if (!empty($this->request->data)) {
			$this->request->data['Forumsujets'] = $this->request->data['Forums'];
			$originallogo                       = "";

			// Miniature de discussion
			if (isset($this->request->data['Forumsujets']['id'])) {
				$e            = $this->Forumsujet->findById($this->request->data['Forumsujets']['id']);
				$originallogo = $e['Forumsujet']['miniature'];
			} //isset($this->request->data['Forumsujets']['id'])
			$this->request->data['Forumsujets']['user_id'] = $this->Auth->user('id');
			$dir                                           = IMAGES . date('Y');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
			$dir .= DS . date('m');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
			$f        = explode('.', $this->request->data['Forums']['miniature']['name']);
			$ext      = end($f);
			$filename = Inflector::slug(implode('.', array_slice($f, 0, -1)));
			$fileurl  = date('Y') . '/' . date('m') . '/' . $filename . '.' . $ext;
			if (empty($this->request->data['Forumsujets']['miniature']['name'])) {
				$this->request->data['Forumsujets']['miniature'] = $originallogo;
			} //empty($this->request->data['Forumsujets']['miniature']['name'])
			else {
				$this->request->data['Forumsujets']['miniature2'] = $this->request->data['Forumsujets']['miniature'];
				$this->request->data['Forumsujets']['miniature']  = $fileurl;
			}
			if ($this->Forumsujet->save($this->request->data['Forumsujets'])) {
				if ($this->request->data['Forumsujets']['miniature'] != $originallogo) {
					move_uploaded_file($this->request->data['Forumsujets']['miniature2']['tmp_name'], $dir . DS . $filename . '.' . $ext);
				} //$this->request->data['Forumsujets']['miniature'] != $originallogo
				$this->Session->setFlash("Le sujet a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Forumsujet->save($this->request->data['Forumsujets'])
			else {
				$this->Session->setFlash("Merci de compléter le sujet et le contenu du sujet", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Forumsujet->id         = $id;
			$this->request->data          = $this->Forumsujet->read();
			$this->request->data['Forum'] = $this->request->data['Forumsujet'];
		} //$id != null
		$this->loadModel('Forumcat');
		$d['forumcats'] = $this->Forumcat->find('list');
		$this->set($d);
	}


	/**
	 * Proposition d'un sujet par membre
	 **/
	function addsujet($id = null)
	{
		$this->loadModel('Forumsujet');
		if (!empty($this->request->data)) {
			if (empty($this->request->data['Forums']['sujet']) || empty($this->request->data['Forums']['message'])) {
				$this->Session->setFlash("Attention, un champ est vide.", "notif", array(
					'type' => 'error'
				));
			} //empty($this->request->data['Forums']['sujet']) || empty($this->request->data['Forums']['message'])
			else {
				$this->Forumsujet->set('miniature', '2012/01/bulles_icon.png');
				$this->request->data['Forumsujets'] = $this->request->data['Forums'];
				$originallogo                       = "";
				if (isset($this->request->data['Forumsujets']['id'])) {
					$e            = $this->Forumsujet->findById($this->request->data['Forumsujets']['id']);
					$originallogo = $e['Forumsujet']['miniature'];
				} //isset($this->request->data['Forumsujets']['id'])
				$this->request->data['Forumsujets']['user_id'] = $this->Auth->user('id');
				if ($this->Forumsujet->save($this->request->data['Forumsujets'])) {
					$this->Session->setFlash("Le sujet a bien été sauvegardé", "notif");
					$this->redirect(array(
						'action' => 'index'
					));
				} //$this->Forumsujet->save($this->request->data['Forumsujets'])
				else {
					$this->Session->setFlash("Le sujet n'a pas pu être sauvegardé", "notif", array(
						'type' => 'error'
					));
				}
			}
		} //!empty($this->request->data)
		$this->loadModel('Forumcat');
		$d['forumcats'] = $this->Forumcat->find('list');
		$this->set($d);
	}


	/**
	 * Ajouter une catégorie de sujet dans le forum / Administrateurs
	 **/
	function admin_addcat($id = null)
	{
		$this->loadModel('Forumcat');
		if (!empty($this->request->data)) {
			$this->request->data['Forumcats'] = $this->request->data['Forums'];
			if ($this->Forumcat->save($this->request->data['Forumcats'])) {
				$this->Session->setFlash("La catégorie a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Forumcat->save($this->request->data['Forumcats'])
			else {
				$this->Session->setFlash("La catégorie n'a pas pu être sauvegardé", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Forumcat->id           = $id;
			$this->request->data          = $this->Forumcat->read();
			$this->request->data['Forum'] = $this->request->data['Forumcat'];
		} //$id != null
	}


	/**
	 * Liste des posts en administrateur
	 **/
	function admin_index()
	{
		$this->paginate = array(
			'limit' => 10,
			'order' => 'Forum.created desc'
		);
		$d['forums']    = $this->Paginate('Forum');
		$this->loadModel('Forumcat');
		$d['cats'] = $this->Forumcat->find('all');
		$this->loadModel('Forumsujet');
		$d['sujets'] = $this->Forumsujet->find('all');
		$this->set($d);
	}

	/**
	 * Ajout/Edition d'un posts
	 **/
	function admin_edit($id = null)
	{
		if (!empty($this->request->data)) {
			if ($this->Forum->save($this->request->data)) {
				$this->Session->setFlash("La discussion a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Forum->save($this->request->data)
			else {
				$this->Session->setFlash("La discussion n'a pas pu être sauvegardé", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Forum->id     = $id;
			$this->request->data = $this->Forum->read();
		} //$id != null
	}

	/**
	 * Suppression discussion en admin
	 **/
	function admin_delete($id)
	{
		$this->Forum->delete($id);
		$this->Session->setFlash("La discussion a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}


	/**
	 * Suppression catégorie en admin
	 **/
	function admin_deletecat($id)
	{
		$this->loadModel('Forumcat');
		$this->Forumcat->delete($id);
		$this->Session->setFlash("La catégorie a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}

	/**
	 * Suppression d'un sujet en admin
	 **/
	function admin_deletesujet($id)
	{
		$this->loadModel('Forumsujet');
		$this->Forumsujet->delete($id);
		$this->Session->setFlash("Le sujet a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
}