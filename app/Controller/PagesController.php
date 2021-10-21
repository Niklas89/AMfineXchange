<?php
class PagesController extends AppController
{
	public $components = array('RequestHandler');
	public $helpers = array('Text');
	var $paginate = array('limit' => 5);
	/**
	 *  Index pour debug des pages
	 **/
	function index()
	{
		if ($this->RequestHandler->isRss()) {
			$d['pages'] = $this->Page->find('all', array(
				'conditions' => array(
					'Page.online' => 1
				),
				'limit' => 20,
				'order' => 'Page.created DESC'
			));
			$this->set($d);
		} //$this->RequestHandler->isRss()
	}
	/**
	 * Pages spécifiques Kiid, Prospectus..
	 **/
	function specific()
	{
		//Quel page?
		$d['spe'] = $this->request->params['pass']['0'];

		//spécificitées css et mots clés pour recherche
		$this->loadModel('Product');
		switch ($this->request->params['pass']['0']) {
			case '1':
				$d['spe'] = "Kiid & Prospectus";
				$search   = array(
					'kiid',
					'prospectus',
					'kid',
					'Kiid',
					'Kid'
				);
				$d['col'] = "#F0B52C";
				break;
			case '2':
				$d['spe'] = "Reporting";
				$d['col'] = "#277dd9";
				$search   = array(
					'reporting'
				);
				break;
			case '3':
				$d['spe'] = "Données & Moteur de calcul";
				$d['col'] = "#5E1E5E";
				$search   = array(
					'donnees',
					'moteur de calcul'
				);
				break;
			default:
				$d['spe'] = "Kiid & Prospectus";
				$search   = array(
					'kiid',
					'prospectus'
				);
				$d['col'] = "#F0B52C";
				break;
		} //$this->request->params['pass']['0']

		//Recherche produits
		$d['product'] = $this->Product->find('all', array(
			'conditions' => array(
				'type' => $this->request->params['pass']['0']
			)
		));
		$d['product'] = $d['product']['0'];

		//Chargement models
		$this->loadModel('Page');
		$this->loadModel('Forum');
		$this->loadModel('Forumsujet');
		$this->loadModel('User');
		$this->loadModel('Event');

		//Discussion lié aux mots clés
		$d['forumsall'] = array();
		foreach ($search as $k => $v) {
			$f              = $this->Forum->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'OR' => array(
						'Forum.sujet LIKE' => "%$v%",
						'Forum.content LIKE' => "%$v%",
						'Forum.resume LIKE' => "%$v%"
					)
				)
			));
			$f2             = $this->Forumsujet->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'OR' => array(
						'Forumsujet.sujet LIKE' => "%$v%",
						'Forumsujet.message LIKE' => "%$v%"
					)
				)
			));
			//Fusion des resultat par mots clés + suppression doublon
			$temparray      = array();
			$temparray      = array_merge((array) $f, (array) $f2);
			$d['forumsall'] = array_merge((array) $d['forumsall'], (array) $temparray);
			$d['forumsall'] = array_map("unserialize", array_unique(array_map("serialize", $d['forumsall'])));
		} //$search as $k => $v

		//Document en une lié au sujet
		$d['uneactualite'] = array();
		$d['unedocument']  = array();
		$d['uneevenement'] = array();
		foreach ($search as $k => $v) {
			$f                 = $this->Page->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Page.diffusion_une' => 1,
					'Page.online' => 1,
					'Page.type !=' => 'footer',
					'OR' => array(
						'Page.content LIKE' => "%$v%",
						'Page.name LIKE' => "%$v%"
					)
				)
			));
			$d['uneactualite'] = array_merge((array) $d['uneactualite'], (array) $f);
			$d['uneactualite'] = array_map("unserialize", array_unique(array_map("serialize", $d['uneactualite'])));
			$k                 = $this->Page->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Page.online' => 1,
					'Page.type !=' => 'footer',
					'OR' => array(
						'Page.content LIKE' => "%$v%",
						'Page.name LIKE' => "%$v%"
					)
				)
			));
			$d['unedocument']  = array_merge((array) $d['unedocument'], (array) $k);
			$d['unedocument']  = array_map("unserialize", array_unique(array_map("serialize", $d['unedocument'])));
			$now               = date('Y-m-d', mktime());
			$e                 = $this->Event->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Event.date >=' => "$now",
					'OR' => array(
						'Event.theme LIKE' => "%$v%",
						'Event.presentation LIKE' => "%$v%",
						'Event.programme LIKE' => "%$v%",
						'Event.baseline LIKE' => "%$v%",
						'Event.organisateur LIKE' => "%$v%"
					)
				)
			));

			//Fusion des resultat par mots clés + suppression doublon
			$d['uneevenement'] = array_merge((array) $d['uneevenement'], (array) $e);
			$d['uneevenement'] = array_map("unserialize", array_unique(array_map("serialize", $d['uneevenement'])));
		} //$search as $k => $v



		//Recherche de document estampillé userclub
		$d['uneactualiteu'] = array();
		$d['unedocumentu']  = array();
		$d['uneevenementu'] = array();
		foreach ($search as $k => $v) {
			$f                  = $this->Page->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Page.diffusion_une' => 1,
					'Page.diffusion_userclub' => 1,
					'Page.online' => 1,
					'Page.type !=' => 'footer',
					'OR' => array(
						'Page.content LIKE' => "%$v%",
						'Page.name LIKE' => "%$v%"
					)
				)
			));
			$d['uneactualiteu'] = array_merge((array) $d['uneactualiteu'], (array) $f);
			$d['uneactualiteu'] = array_map("unserialize", array_unique(array_map("serialize", $d['uneactualiteu'])));
			$k                  = $this->Page->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Page.online' => 1,
					'Page.diffusion_userclub' => 1,
					'Page.type !=' => 'footer',
					'OR' => array(
						'Page.content LIKE' => "%$v%",
						'Page.name LIKE' => "%$v%"
					)
				)
			));
			$d['unedocumentu']  = array_merge((array) $d['unedocumentu'], (array) $k);
			$d['unedocumentu']  = array_map("unserialize", array_unique(array_map("serialize", $d['unedocumentu'])));
			$now                = date('Y-m-d', mktime());
			$e                  = $this->Event->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Event.date >=' => "$now",
					'OR' => array(
						'Event.theme LIKE' => "%$v%",
						'Event.presentation LIKE' => "%$v%",
						'Event.programme LIKE' => "%$v%",
						'Event.baseline LIKE' => "%$v%",
						'Event.organisateur LIKE' => "%$v%"
					),
					'OR' => array(
						'Event.theme LIKE' => "%club%",
						'Event.presentation LIKE' => "%club%",
						'Event.programme LIKE' => "%club%",
						'Event.baseline LIKE' => "%club%",
						'Event.organisateur LIKE' => "%club%"
					)
				)
			));

			//Fusion des resultat par mots clés + suppression doublon
			$d['uneevenementu'] = array_merge((array) $d['uneevenementu'], (array) $e);
			$d['uneevenementu'] = array_map("unserialize", array_unique(array_map("serialize", $d['uneevenementu'])));
		} //$search as $k => $v



		//Recherche de document estampillé Legalroom
		$d['uneactualitel'] = array();
		$d['unedocumentl']  = array();
		$d['uneevenementl'] = array();
		foreach ($search as $k => $v) {
			$f                  = $this->Page->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Page.diffusion_une' => 1,
					'Page.diffusion_legalroom' => 1,
					'Page.online' => 1,
					'Page.type !=' => 'footer',
					'OR' => array(
						'Page.content LIKE' => "%$v%",
						'Page.name LIKE' => "%$v%"
					)
				)
			));
			$d['uneactualitel'] = array_merge((array) $d['uneactualitel'], (array) $f);
			$d['uneactualitel'] = array_map("unserialize", array_unique(array_map("serialize", $d['uneactualitel'])));
			$k                  = $this->Page->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Page.online' => 1,
					'Page.diffusion_legalroom' => 1,
					'Page.type !=' => 'footer',
					'OR' => array(
						'Page.content LIKE' => "%$v%",
						'Page.name LIKE' => "%$v%"
					)
				)
			));
			$d['unedocumentl']  = array_merge((array) $d['unedocumentl'], (array) $k);
			$d['unedocumentl']  = array_map("unserialize", array_unique(array_map("serialize", $d['unedocumentl'])));
			$now                = date('Y-m-d', mktime());
			$e                  = $this->Event->find('all', array(
				'recursive' => 1,
				'conditions' => array(
					'Event.date >=' => "$now",
					'OR' => array(
						'Event.theme LIKE' => "%$v%",
						'Event.presentation LIKE' => "%$v%",
						'Event.programme LIKE' => "%$v%",
						'Event.baseline LIKE' => "%$v%",
						'Event.organisateur LIKE' => "%$v%"
					),
					'OR' => array(
						'Event.theme LIKE' => "%legal%",
						'Event.presentation LIKE' => "%legal%",
						'Event.programme LIKE' => "%legal%",
						'Event.baseline LIKE' => "%legal%",
						'Event.organisateur LIKE' => "%legal%"
					)
				)
			));

			//Fusion des resultat par mots clés + suppression doublon
			$d['uneevenementl'] = array_merge((array) $d['uneevenementl'], (array) $e);
			$d['uneevenementl'] = array_map("unserialize", array_unique(array_map("serialize", $d['uneevenementl'])));
		} //$search as $k => $v
		$this->set($d);
	}

	/**
	 * Ajouter un commentaire
	 **/
	function addcomment()
	{
		if (!$this->Auth->user('id')) {
			$this->redirect('/users/login');
		} //!$this->Auth->user('id')
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
	/**
	 * Affichage footer sans layout
	 **/
	function showfooter($id)
	{
		$page = $this->Page->find('first', array(
			'recursive' => 2,
			'conditions' => array(
				'Page.id' => $id
			)
		));
		echo $page['Page']['content'];
		$this->layout = false;
		$d['page']    = $page;
		$this->set($d);
	}

	/**
	* Affichage d'une page
	**/
	function show($id = null, $slug = null)
	{
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
	 * Liste des pages en admin
	 **/
	function admin_index()
	{
		$this->paginate = array(
			'Page' => array(
				'limit' => 10
			)
		);
		if (isset($this->request->params['pass']['0'])) {
			$parametre = $this->request->params['pass']['0'];
			switch ($parametre) {
				case 'all':
					$d['pages'] = $this->Paginate('Page');
					break;
				case 'une':
					$type       = "une";
					$d['pages'] = $this->Paginate('Page', array(
						'type' => $type
					));
					break;
				case 'footer':
					$type       = "footer";
					$d['pages'] = $this->Paginate('Page', array(
						'type' => $type
					));
					break;
				default:
					$d['pages'] = $this->Paginate('Page');
					break;
			} //$parametre
		} //isset($this->request->params['pass']['0'])
		else {
			$d['pages'] = $this->Paginate('Page');
		}
		$this->set($d);
	}

	/**
	* Supprime la page
	**/
	function admin_delete($id)
	{
		$this->Session->setFlash("La page a bien été supprimée", "notif");
		$this->Page->delete($id);
		$this->redirect($this->referer());
	}

	/**
	* Edit la page
	**/
	function admin_edit($id = null)
	{
		if ($this->request->is('put') || $this->request->is('post')) {
			$data = $this->request->data;
			$dir  = IMAGES . date('Y');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
			$dir .= DS . date('m');
			if (!file_exists($dir)) {
				mkdir($dir, 0777);
			} //!file_exists($dir)
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
			//Verification des droits en diffusion
			$data['Page']['diffusion_bestpractices'] = 0;
			$data['Page']['diffusion_legalroom']     = 0;
			$data['Page']['diffusion_legalroom2']    = 0;
			$data['Page']['diffusion_userclub']      = 0;
			$data['Page']['diffusion_autre']         = 0;
			switch ($data['Page']['diffusion']) {
				case 'Best Practices':
					$data['Page']['diffusion_bestpractices'] = 1;
					break;
				case 'LegalRoom':
					$data['Page']['diffusion_legalroom'] = 1;
					break;
				case 'LegalRoom2':
					$data['Page']['diffusion_legalroom2'] = 1;
					break;
				case 'autre':
					$data['Page']['diffusion_autre'] = 1;
					break;
				case 'USERCLUB':
					$data['Page']['diffusion_userclub'] = 1;
					break;
			} //$data['Page']['diffusion']
			if ($data['Page']['diffusion_une'] == 1 && $data['Page']['miniature'] == "") {
				$this->Session->setFlash("Les articles à la une nécessitent une miniature", "notif", array(
					'type' => 'error'
				));
				$this->Page->id      = $id;
				$this->request->data = $this->Page->read();
			} //$data['Page']['diffusion_une'] == 1 && $data['Page']['miniature'] == ""
			else {
				if (isset($this->request->data['x']) && !empty($this->request->data['x'])) {
					$targ_w       = $targ_h = 150;
					$jpeg_quality = 90;
					$src          = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $data['Page']['miniature'];
					$fileParts    = pathinfo($src);
					if ($fileParts['extension'] == "jpeg" || $fileParts['extension'] == "jpg") {
						$img_r = imagecreatefromjpeg($src);
					} //$fileParts['extension'] == "jpeg" || $fileParts['extension'] == "jpg"
					// GIF
					if ($fileParts['extension'] == "gif") {
						$img_r = imagecreatefromgif($src);
					} //$fileParts['extension'] == "gif"
					// PNG
					if ($fileParts['extension'] == "png") {
						$img_r = imagecreatefrompng($src);
					} //$fileParts['extension'] == "png"
					$dst_r = ImageCreateTrueColor($targ_w, $targ_h);
					imagecopyresampled($dst_r, $img_r, 0, 0, $this->request->data['x'], $this->request->data['y'], $targ_w, $targ_h, $this->request->data['w'], $this->request->data['h']);
					header('Content-type: image/jpeg');
					$t    = mktime();
					$save = $_SERVER['DOCUMENT_ROOT'] . '/img/miniature2/' . $t . '.jpg';
					imagejpeg($dst_r, $save, $jpeg_quality);
					$data['Page']['miniature2'] = '/img/miniature2/' . $t . '.jpg';
				} //isset($this->request->data['x']) && !empty($this->request->data['x'])
				if ($this->Page->save($data)) {
					if (!empty($data['Page']['naming'])) {
						move_uploaded_file($this->request->data['Page']['miniature']['tmp_name'], $dir . DS . $filename . '.' . $ext);
					} //!empty($data['Page']['naming'])
					$this->Session->setFlash("La page a bien été modifiée", "notif");
					$this->redirect(array(
						'action' => 'index'
					));
				} //$this->Page->save($data)
				else {
					$this->Session->setFlash("Veuillez verifiez les informations soumises", "notif", array(
						'type' => 'error'
					));
				}
			}
		} //$this->request->is('put') || $this->request->is('post')
		elseif ($id) {
			$this->Page->id      = $id;
			$this->request->data = $this->Page->read();
		} //$id
		$this->loadModel('User');
		$d['listu'] = $this->User->find('list');
		$this->set($d);
	}
}
?>