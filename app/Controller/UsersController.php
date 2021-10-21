<?php
class UsersController extends AppController
{

	/**
	 * Messagerie Inter Utilisateur
	 **/
	function messagerie()
	{
		$id = $this->Auth->user('id');
		//Si non connecté redir page login
		if (!$id) {
			$this->redirect('/users/login');
		} //!$id
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
	 * JS Dynamique js/php
	 **/
	function js()
	{
		$this->layout = false;
	}




	/**
	 * Appel en CRON de l'envoi INFONEWS
	 **/
	function infonewses()
	{
		//Liste les utilisateurs
		$u = $this->User->find('all', array(
			'conditions' => array()
		));
		foreach ($u as $k => $v) {
		
			$tel         = $v['User']['telmobile'];
			$datecreate  = $v['User']['created'];
			$idcourant   = $v['User']['id'];
			$mailcourant = $v['User']['email'];

			//Si infonews configurée récupération des infos choisies

			if (isset($v['Infonew'])) {
				$l1s2      = $v['Infonew']['l1s2'];
				$l2s2      = $v['Infonew']['l2s2'];
				$l3s2      = $v['Infonew']['l3s2'];
				$l4s2      = $v['Infonew']['l4s2'];
				$l5s2      = $v['Infonew']['l5s2'];
				$l6s2      = $v['Infonew']['l6s2'];
				$l7s2      = $v['Infonew']['l7s2'];
				$l8s2      = $v['Infonew']['l8s2'];
				$l9s2      = $v['Infonew']['l9s2'];
				$l10s2     = $v['Infonew']['l10s2'];
				$l11s2     = $v['Infonew']['l11s2'];
				$l12s2     = $v['Infonew']['l12s2'];
				$l13s2     = $v['Infonew']['l13s2'];
				$l14s2     = $v['Infonew']['smsmembers'];
				$l15s2     = $v['Infonew']['smsevent'];

			}else{
							$l1s2      = 1;
				$l2s2      = 1;
				$l3s2      = 1;
				$l4s2      = 1;
				$l5s2      = 1;
				$l6s2      = 1;
				$l7s2      = 1;
				$l8s2      = 1;
				$l9s2      = 1;
				$l10s2     = 1;
				$l11s2     = 1;
				$l12s2     = 1;
				$l13s2     = 1;
				$l14s2     = 1;
				$l15s2     = 1;
			}


			if (1==1) {


				//Vérifie si le délai choisi correspond à aujourd'hui
				$now       = mktime();
				$ecouler   = $now - $datecreate;
				$envoi     = array();
				$lastcheck = 0;
					//	echo date('d',$ecouler)." temps ecouler ";
				for ($i = 1; $i <= 15; $i++) {
					$var_name[$i] = "l" . $i . "s2";


					switch (${$var_name[$i]}) {
						case '1':
							if ((date('d', $ecouler) % 7) ==0) {

										//echo "7j-jour ecouler :".date('d', $ecouler); echo " ";echo ( (date('d', $ecouler) % 7) == 0 );echo "<br />";

					
								$envoi[] = $i;
								if ($i == 15) {
									$lastcheck = 7;
								} //$i == 15
							} //date('d', $ecouler) == 7
							break;
						case '2':
							if ((date('d', $ecouler) % 15)==0 ) {
								//echo "15j-jour ecouler :".date('d', $ecouler); echo " ";echo ( (date('d', $ecouler) % 7) == 0 );echo "<br />";
								$envoi[] = $i;
								if ($i == 15) {
									$lastcheck = 15;
								} //$i == 15
							} //date('d', $ecouler) == 15
							break;
						case '3':
							if ((date('d', $ecouler) % 30)==0 ) {
							//echo "30j-jour ecouler :".date('d', $ecouler); echo " ";echo ( (date('d', $ecouler) % 7) == 0 );echo "<br />";
								$envoi[] = $i;
								if ($i == 15) {
									$lastcheck = 30;
								} //$i == 15
							} //date('d', $ecouler) == 30
							break;
						case '4':
							if ((date('d', $ecouler) % 60)==0 ) {
							//	echo "60j-jour ecouler :".date('d', $ecouler); echo " ";echo ( (date('d', $ecouler) % 7) == 0 );echo "<br />";
								$envoi[] = $i;
								if ($i == 15) {
									$lastcheck = 60;
								} //$i == 15
							} //date('d', $ecouler) == 60
							break;
						default:
							break;
					} //${$var_name[$i]}
				} //$i = 1; $i <= 15; $i++
				
				$emails = 0;
				$smss   = 0;

				//Pour chaque envoi possible récupération des informations
				foreach ($envoi as $k => $v) {
					switch ($v) {
						case '1':
							$d['l1s2data'] = $this->User->find('all', array(
								'recursive' => 0,
								'order' => 'User.id desc',
								'limit' => 6,
								'conditions' => array(
									'User.sharename' => 1
								)
							));
							$emails++;
							break;
						case '2':
							$this->loadModel('Activity');
							$this->loadModel('Relation');
							$relation = $this->Relation->find('all', array(
								'conditions' => array(
									'Relation.user_id' => $idcourant
								)
							));
							$rel      = array();
							foreach ($relation as $k => $v) {
								array_push($rel, $v['Relation']['contact_id']);
							} //$relation as $k => $v
							$d['l2s2data'] = $this->Activity->find('all', array(
								'limit' => 10,
								'conditions' => array(
									'Activity.type !=' => 'lastvisit',
									'Activity.user_id ' => $rel
								)
							));
							$emails++;
							break;
						case '3':
							$d['l3s2data'] = $this->User->find('all', array(
								'recursive' => 0,
								'limit' => 6,
								'conditions' => array(
									'User.sharename' => 1,
									'User.membership' => 'Partenaire'
								)
							));
							$emails++;
							break;
						case '4':
							$this->loadModel('Activity');
							$this->loadModel('Relation');
							$part = $this->User->find('all', array(
								'recursive' => 0,
								'limit' => 6,
								'conditions' => array(
									'User.membership' => 'Partenaire'
								)
							));
							$rel  = array();
							foreach ($part as $k => $v) {
								array_push($rel, $v['User']['id']);
							} //$part as $k => $v
							$d['l4s2data'] = $this->Activity->find('all', array(
								'limit' => 10,
								'conditions' => array(
									'Activity.type !=' => 'lastvisit',
									'Activity.user_id ' => $rel
								)
							));
							$emails++;
							break;
						case '5':
							$this->loadModel('Event');
							$d['l5s2data'] = $this->Event->find('all', array(
								'limit' => 5,
								'order' => 'Event.date asc',
								'conditions',
								array(
									'Event.date >' => date('Y-m-d', mktime())
								)
							));
							$emails++;
							break;
						case '6':
							$this->loadModel('Page');
							$d['l6s2data'] = $this->Page->find('all', array(
								'limit' => 3,
								'conditions' => array(
									'Page.type' => 'compterendu'
								)
							));
							$emails++;
							break;
						case '7':
							$this->loadModel('Page');
							$d['l7s2data'] = $this->Page->find('all', array(
								'limit' => 5,
								'order' => 'Page.id desc'
							));
							$emails++;
							break;
						case '8':
							$d['l8s2data'] = "";
							break;
						case '9':
							$this->loadModel('Forumsujet');
							$d['l9s2data'] = $this->Forumsujet->find('all', array(
								'limit' => 5,
								'order' => 'Forumsujet.id desc'
							));
							$emails++;
							break;
						case '10':
							$this->loadModel('Forum');
							$d['l10s2data'] = $this->Forum->find('all', array(
								'limit' => 10,
								'order' => 'Forum.id desc'
							));
							$emails++;
							break;
						case '11':
							$this->loadModel('Forumsujet');
							$all  = $this->Forumsujet->find('all');
							$list = array();
							foreach ($all as $k => $v) {
								foreach ($v['Forum'] as $k2 => $v2) {
									if ($v2['user_id'] == $idcourant) {
										$list[] = $v['Forumsujet']['id'];
									} //$v2['user_id'] == $idcourant
								} //$v['Forum'] as $k2 => $v2
							} //$all as $k => $v
							$this->loadModel('Forumsujet');
							$d['l11s2data'] = $this->Forumsujet->find('all', array(
								'limit' => 5,
								'order' => 'Forumsujet.id desc',
								'conditions' => array(
									'Forumsujet.id' => $list
								)
							));
							$emails++;
							break;
						case '12':
							$d['l12s2data'] = "";
							break;
						case '13':
							$this->loadModel('Activity');
							$d['l13s2data'] = $this->Activity->find('all', array(
								'limit' => 10,
								'conditions' => array(
									'Activity.type' => 'lastvisit',
									'Activity.additionnal' => $idcourant
								)
							));
							$emails++;
							break;
						case '14':
							$now            = mktime();
							$oldnow         = $now - $lastcheck * 24 * 60 * 60;
							$d['l14s2data'] = $this->User->find('count', array(
								'conditions' => array(
									'User.created >=' => $oldnow
								)
							));
							$smss++;
							break;
						case '15':
							$this->loadModel('Event');
							$d['l15s2data'] = $this->Event->find('all', array(
								'limit' => 1,
								'order' => 'Event.date asc',
								'conditions' => array(
									'Event.date >' => date('Y-m-d', mktime())
								)
							));
							$smss++;
							break;
						default:
							break;
					} //$v
				} //$envoi as $k => $v


				//Si un email peut partir -> envoi à la vue
				if ($emails > 0) {
					$mail = new CakeEmail();
					
					$mail->from('noreply@amfinexchange.com')->to($mailcourant)->subject('Amfinexchange.com | Bulletion d\'information')->emailFormat('html')->template('infonewses')->viewVars(array(
						'd' => $d
					))->send();

				} //$emails > 0
				$messsms = "AmfineXchange ";

				//Vérification du format du téléphone mobile
				$valide  = $this->checkTel("gsm", $tel);
				if (($smss > 0) && ($valide == true)) {
					if (isset($d['l14s2data'])) {
						$messsms .= $d['l14s2data'] . " nouveaux membres depuis notre dernière correspondance ";
					} //isset($d['l14s2data'])
					if (isset($d['l15s2data'])) {
						$messsms .= "Prochain évènement(" . $d['l15s2data']['0']['Event']['baseline'] . ") prévu le " . $this->date_fran2(strtotime($d['l15s2data']['0']['Event']['date']));
					} //isset($d['l15s2data'])
				//	echo utf8_decode($messsms);
					$tel      = "0033" . substr($tel, 1, 9);
					$charsend = "https://www.ovh.com/cgi-bin/sms/http2sms.cgi?account=sms-mb48877-1&login=amfine&password=p4x622sr&from=0033180964160&to=" . $tel . "&message=" . $messsms;
				//	echo "<br />";
					//Si sms choisi -> envoi du message par get
					if (isset($d['l14s2data']) || isset($d['l15s2data'])) {
					echo '<iframe src="' . utf8_decode($charsend) . '" name="" width="" height=""></iframe>';
					} //isset($d['l14s2data']) || isset($d['l15s2data'])

				} //($smss > 0) && ($valide == true)
			} //isset($v['Infonew'])
		} //$u as $k => $v
		exit;
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


	/**
	 * Affichage page badge
	 **/
	function badges()
	{
	}


	/**
	 * Vérifie le format du tel mobile 06 et 07
	 **/
	function checkTel($type = "tous", $str)
	{
		// on cherche si le numéro est bien un portable pour sms
		if ($type == "gsm") {
			if (!preg_match("#06\d{7,9}#", $str) && !preg_match("#07\d{7,9}#", $str)) {
				//  echo "Confirmation SMS indisponible pour ce numéro : ".$str;
				$sms = false;
			} //!preg_match("#06\d{7,9}#", $str) && !preg_match("#07\d{7,9}#", $str)
			else {
				//  echo $str." : Numéro ok pour sms !  ";
				$sms = true;
				return true;
			}
		} //$type == "gsm"
		else {
			if (!preg_match("#0\d{8,9}#", $str)) {
				//  echo "Le numéro doit commencer par un 0 et être composé de 10 chiffres.";
			} //!preg_match("#0\d{8,9}#", $str)
			else {
				//  echo "Numéro valide : ".$str;
				return true;
			}
		}
		return false;
		exit;
	}

	/**
	 * Liste des infonews à configurer
	 **/
	function infonews()
	{
		if (!$this->Auth->user('id'))
			$this->redirect($this->referer());
		$me     = $this->User->findById($this->Auth->user('id'));
		$tel    = $me['User']['telmobile'];
		$valide = $this->checkTel("gsm", $tel);
		if ($valide == false) {
			$this->Session->setFlash('Attention votre numéro de téléphone mobile est non renseigné ou incorrect (Format: 06 XX XX XX XX ou 07 XX XX XX XX), il est indispensable à la réception de SMS <a href="/users/edit">Modifier mon numéro de téléphone</a> ', "notif", array(
				'type' => 'error'
			));
		} //$valide == false
		$this->loadModel('Infonew');
		$c = $this->Infonew->find('count', array(
			'conditions' => array(
				'Infonew.user_id' => $this->Auth->user('id')
			)
		));
		if ($this->request->is('post')) {
			$this->request->data['Infonews']['user_id'] = $this->Auth->user('id');
			$this->request->data['Infonew']             = $this->request->data['Infonews'];
			//unset($this->request->data['Infonews']);
			if ($this->Infonew->save($this->request->data)) {
				if (!isset($this->request->data['Infonew']['smsmembers'])) {
					$this->request->data['Infonew']['smsmembers'] = 0;
				} //!isset($this->request->data['Infonew']['smsmembers'])
				if (!isset($this->request->data['Infonew']['smsevent'])) {
					$this->request->data['Infonew']['smsevent'] = 0;
				} //!isset($this->request->data['Infonew']['smsevent'])
				$this->Infonew->updateAll(array(
					'Infonew.smsmembers' => $this->request->data['Infonew']['smsmembers']
				), array(
					'Infonew.id' => $this->Infonew->id
				));
				$this->Infonew->updateAll(array(
					'Infonew.smsevent' => $this->request->data['Infonew']['smsevent']
				), array(
					'Infonew.id' => $this->Infonew->id
				));
				$mail       = new CakeEmail();
				$d['l1s2']  = $this->request->data['Infonew']['l1s2'];
				$d['l2s2']  = $this->request->data['Infonew']['l2s2'];
				$d['l3s2']  = $this->request->data['Infonew']['l3s2'];
				$d['l4s2']  = $this->request->data['Infonew']['l4s2'];
				$d['l5s2']  = $this->request->data['Infonew']['l5s2'];
				$d['l6s2']  = $this->request->data['Infonew']['l6s2'];
				$d['l7s2']  = $this->request->data['Infonew']['l7s2'];
				$d['l9s2']  = $this->request->data['Infonew']['l9s2'];
				$d['l10s2'] = $this->request->data['Infonew']['l10s2'];
				$d['l11s2'] = $this->request->data['Infonew']['l11s2'];
				$d['l13s2'] = $this->request->data['Infonew']['l13s2'];
				$d['l14s2'] = $this->request->data['Infonew']['smsmembers'];
				$d['l15s2'] = $this->request->data['Infonew']['smsevent'];
				$mail->from('noreply@amfinexchange.com')->to($me['User']['email'])->subject('Amfinexchange.com | Configuration des infonews')->emailFormat('html')->template('infon')->viewVars(array(
					'data' => $d,
					'username' => $me['User']['firstname'] . ' ' . $me['User']['lastname']
				))->send();
				$this->Session->setFlash("Infonews sauvegardées !", "notif");
				$this->redirect(array(
					'action' => 'infonews'
				));
			} //$this->Infonew->save($this->request->data)
			else {
				$this->Session->setFlash("Les infonews n'ont pas pu être sauvegardé", "notif");
			}
		} //$this->request->is('post')
		elseif ($c != 0) {
			$this->request->data = $this->Infonew->find('first', array(
				'conditions' => array(
					'Infonew.user_id' => $this->Auth->user('id')
				)
			));
		} //$c != 0
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
				$this->Session->setFlash("Message envoyé", "notif");
				$this->redirect('/users/messagerie');
			} //$this->Message->save($data)
			else {
				$this->Session->setFlash("Votre message n'est pas correct.", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->data
	}

	/**
	 * Liste et gen de token en admin
	 **/
	function admin_token()
	{
		$this->loadModel('Token');
		$this->paginate = array(
			'order' => 'Token.id desc'
		);
		$d['items']     = $this->Paginate('Token');
		$this->set($d);
	}

	/**
	 * Liste de mes relations
	 **/
	function relation()
	{
		$this->loadModel('Relation');
		$id = $this->Auth->user('id');
		if (!$id) {
			$this->redirect('/users/login');
		} //!$id
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
	 * Liste des activitées de mes contacts
	 **/
	function activity()
	{
		$this->loadModel('Activity');
		$monid = $this->Auth->User('id');
		if (!$monid) {
			$this->redirect('/users/login');
		} //!$monid
		$this->paginate = array(
			'limit' => 5,
			'order' => 'Activity.created desc'
		);
		$this->loadModel('Relation');
		$relation = $this->Relation->find('all', array(
			'conditions' => array(
				'Relation.user_id' => $this->Auth->user('id')
			)
		));
		$rel      = array();
		foreach ($relation as $k => $v) {
			array_push($rel, $v['Relation']['contact_id']);
		} //$relation as $k => $v
		$d['acts'] = $this->paginate('Activity', array(
			'Activity.type !=' => 'lastvisit',
			'Activity.user_id ' => $rel
		));
		$this->set($d);
	}

	/**
	 * Mes dernières visites
	 **/
	function visites()
	{
		$this->loadModel('Activity');
		$monid = $this->Auth->User('id');
		if (!$monid) {
			$this->redirect('/users/login');
		} //!$monid
		$c              = 0;
		//Last visit en Activitée
		$c2             = $this->Activity->find('all', array(
			'conditions' => array(
				'Activity.type' => 'lastvisit',
				'Activity.additionnal' => $monid
			)
		));
		//Pagination résultat par date
		$this->paginate = array(
			'limit' => 5,
			'order' => 'Activity.updated desc'
		);
		foreach ($c2 as $k => $v) {
			$v = current($v);
			$c = $c + $v['additionnal2'];
		} //$c2 as $k => $v
		$visites = $this->paginate('Activity', array(
			'Activity.type' => 'lastvisit',
			'Activity.additionnal' => $monid
		));
		$this->loadModel('Relation');
		foreach ($visites as $k => $v) {
			$iduser                          = $v['User']['id'];
			$relation                        = $this->Relation->find('count', array(
				'conditions' => array(
					'Relation.user_id' => $iduser
				)
			));
			$visites[$k]['User']['relcount'] = $relation;
		} //$visites as $k => $v
		$d['counting'] = $c;
		$d['visites']  = $visites;
		$this->set($d);
	}

	/**
	 * Affichage d'un message
	 **/
	function messagerieshow()
	{
	}



	/**
	 * Création du compte
	 **/
	function signup()
	{
		if ($this->request->is('post')) {
			$d               = $this->request->data;
			$d['User']['id'] = null;
			if (!empty($d['User']['password'])) {
				$d['User']['password'] = Security::hash($d['User']['password'], null, true);
			} //!empty($d['User']['password'])
			$this->loadModel('Token');

			//Token VALIDE?
			$token = $d['User']['token'];
			if ($token == "") {
				$token = "invite";
			} //$token == ""
			$c = $this->Token->find('count', array(
				'conditions' => array(
					'Token.token' => $token,
					'Token.status' => 0
				)
			));

			//Droits d'accès lié au Token
			if ($c == 0 && $token == "invite") {
				$c                       = 2;
				$d['User']['membership'] = "";
			} //$c == 0 && $token == "invite"
			else {
				$d['User']['membership'] = "User Club Member";
			}

			//Purge token usager
			$allTokens = $this->Token->find('all', array(
				'conditions' => array(
					'Token.status' => 0
				)
			));
			//Validitée du token par date
			foreach ($allTokens as $k => $v) {
				$v                 = current($v);
				$ouverture         = strtotime($v['ouverture']);
				$ouvertureplussept = $ouverture + 30 * 24 * 60 * 60;
				$now               = mktime();
				if ($now > $ouvertureplussept) {
					$this->Token->id = $v['id'];
					$this->Token->saveField('status', 1);
				} //$now > $ouvertureplussept
			} //$allTokens as $k => $v

			if ($c > 0) {
				//Si sauvegarde Ok 
				if ($this->User->save($d, true, array(
					'username',
					'password',
					'email',
					'firstname',
					'lastname',
					'societe',
					'membership'
				))) {
					//Mise à jour du token (brulé)
					$this->Token->updateAll(array(
						'Token.status' => 1
					), array(
						'Token.token' => $token
					));
					$d['User']['username'] = $d['User']['firstname'] . " " . $d['User']['lastname'];
					if ($c == 2) {
						//Envoi d'un mail d'activation
						$mail = new CakeEmail();
						$link = array(
							'controller' => 'users',
							'action' => 'activate',
							$this->User->id . '-' . md5($d['User']['password'])
						);
						$mail->from('noreply@amfinexchange.com')->to($d['User']['email'])->subject('Amfinexchange.com | Votre Inscription')->emailFormat('html')->template('signup2')->viewVars(array(
							'username' => $d['User']['username'],
							'link' => $link,
							'email' => $d['User']['email']
						))->send();
					} //$c == 2
					else {
						//Envoi d'un mail d'attente (compte validé manuellement)
						$mail = new CakeEmail();
						$link = array(
							'controller' => 'users',
							'action' => 'activate',
							$this->User->id . '-' . md5($d['User']['password'])
						);
						$mail->from('noreply@amfinexchange.com')->to($d['User']['email'])->subject('Amfinexchange.com | Votre Inscription')->emailFormat('html')->template('signup')->viewVars(array(
							'username' => $d['User']['username'],
							'link' => $link,
							'email' => $d['User']['email']
						))->send();
					}
					$this->Session->setFlash("Votre compte a bien été créé , un email de validation a été envoyé.", "notif");
					$this->redirect('/');
				} //$this->User->save($d, true, array( 'username', 'password', 'email', 'firstname', 'lastname', 'societe', 'membership' ))
				else {
					$this->Session->setFlash("Merci de corriger le formulaire", "notif", array(
						'type' => 'error'
					));
				}
			} //$c > 0
			else {
				$this->Session->setFlash("Ce Token d'inscription est incorrect ou périmé", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post')
	}

	/**
	* Rappel du mot de passe
	**/
	function rappel()
	{
		if (!empty($this->request->params['named']['token'])) {
			$token = $this->request->params['named']['token'];
			$token = explode("-", $token);
			$id    = $token[0];
			$token = $token[1];
			$user  = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $id,
					'User.active' => '1',
					'MD5(User.password)' => $token
				)
			));
			if ($user) {
				$this->User->id = $id;
				$password       = substr(md5(uniqid(rand(), true)), 0, 8);
				$this->User->saveField('password', Security::hash($password, null, true));
				$email = new CakeEmail();
				$email->from('noreply@amfinexchange.com')->to($user['User']['email'])->subject('Amfinexchange.com | Votre nouveau mot de passe')->emailFormat('html')->template('rappel2')->viewVars(array(
					'username' => $user['User']['firstname'] . ' ' . $user['User']['lastname'],
					'password' => $password,
					'email' => $user['User']['email']
				))->send();
				$this->Session->setFlash("Votre nouveau mot de passe est : <span style=\"font-size:13px;font-weight:bold;\";>" . $password . "</span>", "notif");
			} //$user
			else {
				$this->Session->setFlash("Ce lien n'est plus valide", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->params['named']['token'])
		if ($this->request->is('post')) {
			$d     = $this->request->data['User'];
			$email = $d['email'];
			if (!isset($d['rappel']))
				die();
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.email' => $d['email'],
					'User.active' => '1'
				)
			));
			if (empty($user)) {
				$this->Session->setFlash("Aucun utilisateur existant.", "notif", array(
					'type' => 'error'
				));
			} //empty($user)
			else {
				$user  = current($user);
				$email = new CakeEmail();
				$link  = array(
					'controller' => 'users',
					'action' => 'rappel',
					'token' => $user['id'] . '-' . md5($user['password'])
				);
				$email->from('noreply@amfinexchange.com')->to($user['email'])->subject('Amfinexchange.com | Mot de passe oublié')->emailFormat('html')->template('rappel')->viewVars(array(
					'username' => $user['User']['firstname'] . ' ' . $user['User']['lastname'],
					'email' => $user['User']['email'],
					'link' => $link
				))->send();
				$this->Session->setFlash("Un email vient de vous être envoyé", "notif");
			}
		} //$this->request->is('post')
	}

	/**
	 * Formulaire de login sur le site
	 **/
	function login()
	{
		$this->layout = false;
		if ($this->request->is('Post')) {
			$this->Auth->logout();


			if ($this->Auth->login()) {
				$this->Session->setFlash("Vous êtes connecté", "notif");
				$this->redirect('/');
			} //$this->Auth->login()
			else {
			
				$this->Session->setFlash("Identifiants incorrects", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('Post')
	}
	/**
	 * Update de l'image user (ajax)
	 **/
	function updatepic()
	{
		$user   = $this->Auth->user('id');
		$img    = $this->request->data['name'];
		$rening = $this->request->params['pass']['0'];
		$link   = '/uploads/' . $rening . str_replace("/uploads/", "", $img);
		echo $link;
		$this->User->id = $user;
		$this->User->saveField('photo', $link);
		$this->layout = false;
		exit;
	}
	/**
	 * Déco
	 **/
	function logout()
	{
		$this->Auth->logout();
		$this->redirect($this->referer());
	}
	/**
	 * Changement de mot de passe
	 **/
	function pass()
	{
		$monid = $this->Auth->User('id');
		if (!$monid) {
			$this->redirect('/users/login');
		} //!$monid
		if ($this->request->is('post')) {
			$d = $this->request->data;
			$u = $this->User->findById($this->Auth->user('id'));
			if ($u['User']['password'] != Security::hash($d['User']['passwordold'], null, true)) {
				$this->Session->setFlash("Ancien mot de passe incorrect", "notif", array(
					'type' => 'error'
				));
			} //$u['User']['password'] != Security::hash($d['User']['passwordold'], null, true)
			elseif ($d['User']['password1'] != $d['User']['password2']) {
				$this->Session->setFlash("Les deux nouveaux mots de passes ne sont pas identiques.", "notif", array(
					'type' => 'error'
				));
			} //$d['User']['password1'] != $d['User']['password2']
				elseif (strlen($d['User']['password1']) < 3) {
				$this->Session->setFlash("Taille du mot de passe incorrect", "notif", array(
					'type' => 'error'
				));
			} //strlen($d['User']['password1']) < 3
			else {
				$this->User->id = $this->Auth->user('id');
				$this->User->saveField('password', Security::hash($d['User']['password1'], null, true));
				$this->Session->setFlash("Votre mot de passe a bien été changé", "notif");
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'profil'
				));
			}
		} //$this->request->is('post')
	}

	/**
	 *Affichage profil public
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
		if (!$this->Auth->user('id')) {
			$this->redirect('/users/login');
		} //!$this->Auth->user('id')
	}
	/**
	 * Inviter un ami
	 **/
	public function contactadd($id)
	{
		if (!$this->Auth->user('id'))
			$this->redirect($this->referer());
		if ($id == $this->Auth->user('id')) {
			$this->redirect('/users/membres');
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
		$this->redirect('/users/relation');
	}

	/**
	 * Affichage des membres
	 **/
	function membres()
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
		} //$d['users'] as $k => $v
		$this->set($d);
	}

	/**
	 * Met à jour le statut (ajax)
	 **/
	function updatestatus()
	{
		$this->User->id = $this->Auth->user('id');
		$this->User->saveField('partage', $this->request->data['partage']);
		exit;
	}

	/**
	 * Edition du profil utilisateur
	 **/
	function edit()
	{
		$user_id      = $this->Auth->user('id');
		$d['user_id'] = $user_id;
		if (!$user_id) {
			$this->redirect('/');
			die();
		} //!$user_id
		$this->User->id = $user_id;
		if ($this->request->is('put') || $this->request->is('post')) {
			$passError       = false;
			$d               = $this->request->data;
			$d['User']['id'] = $user_id;
			if (!empty($d['User']['service2'])) {
				$d['User']['service'] = $d['User']['service2'];
			} //!empty($d['User']['service2'])
			if (!empty($d['User']['pass1'])) {
				if ($d['User']['pass1'] == $d['User']['pass2']) {
					$d['User']['password'] = Security::hash($d['User']['pass1'], null, true);
				} //$d['User']['pass1'] == $d['User']['pass2']
				else {
					$passError = true;
				}
			} //!empty($d['User']['pass1'])
			if ($this->User->save($d)) {
				$this->Session->setFlash("Votre profil a bien été édité", "notif");
			} //$this->User->save($d)
			else {
				$this->Session->setFlash("Il y'a une erreur dans les informations fournies", "notif", array(
					'type' => 'error'
				));
			}
			if ($passError)
				$this->User->validationErrors['pass2'] = array(
					'Mot de passe incorrect'
				);
		} //$this->request->is('put') || $this->request->is('post')
		else {
			$this->request->data = $this->User->read();
		}
		$this->request->data['User']['pass1'] = $this->request->data['User']['pass2'] = "";
		$d['actualuser']                      = $this->User->read();
		$this->set($d);
	}


	/**
	 * Activation du compte par lien hash
	 **/
	function activate($token)
	{
		$token = explode('-', $token);
		$user  = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $token[0],
				'MD5(User.password)' => $token[1],
				'active' => 0
			)
		));
		if (!empty($user)) {
			$this->User->id = $user['User']['id'];
			$this->User->saveField('active', 1);
			$this->Session->setFlash("Votre compte a bien été validée", "notif");
			$this->Auth->login($user['User']);
			$this->redirect("/");
		} //!empty($user)
		else {
			$this->Session->setFlash("Ce lien d'activation n'est pas valide", "notif", array(
				'type' => 'error'
			));
		}
		$this->redirect('/');
	}
	/**
	 * Liste des utilisateurs en admin
	 **/
	function admin_index()
	{
		$d['items'] = $this->Paginate('User');
		$d['count'] = $this->User->find('count');
		$this->set($d);
	}


	/**
	 * Envoi du mess massif
	 **/
	function admin_emailing3($id = null)
	{
		$this->loadModel('Draft');
		if (!empty($this->request->data)) {
			$this->request->data['Draft'] = $this->request->data['User'];
			if ($this->Draft->save($this->request->data)) {
				$this->Session->setFlash("Le brouillon a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'emailing'
				));
			} //$this->Draft->save($this->request->data)
			else {
				$this->Session->setFlash("Le brouillon n'a pas pu être sauvegardé", "notif");
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Draft->id             = $id;
			$this->request->data         = $this->Draft->read();
			$this->request->data['User'] = $this->request->data['Draft'];
		} //$id != null
	}

	/**
	 * Ajax - Récup titre par modèle
	 **/
	function emailgettitle($id = null)
	{
		$this->loadModel('Draft');
		$draft = $this->Draft->findById($id);
		echo $draft['Draft']['titre'];
		exit;
	}

	/**
	 * Ajax - Suppr d'un draft
	 **/
	function delbrouillon($id = null)
	{
		$this->loadModel('Draft');
		$draft = $this->Draft->delete($id);
		exit;
	}

	/**
	 *  Ajax - Récup content par modèle
	 **/
	function emailgetcontent($id = null)
	{
		$this->loadModel('Draft');
		$draft = $this->Draft->findById($id);
		echo $draft['Draft']['content'];
		exit;
	}
	/**
	 * Ajax - Suppr d'un draft (2)
	 **/
	function admin_deleteb($id)
	{
		$this->loadModel('Draft');
		$this->Draft->delete($id);
		$this->Session->setFlash("Le brouillon a bien été supprimé", "notif");
		$this->redirect('emailing');
	}

	/**
	 * Composition du mess massif
	 **/
	function admin_emailing2()
	{
		$this->loadModel('Draft');
		$d['items'] = $this->Paginate('Draft');
		$this->set($d);
		if ($this->request->is('post')) {
			$d = $this->request->data;
			if (isset($d['User']['sendto'])) {
				if (empty($d['User']['titre']) || empty($d['User']['content'])) {
					$d['chaine'] = $d['User']['sendto'];
					$this->set($d);
					$this->Session->setFlash("Un champ est vide", "notif", array(
						'type' => 'error'
					));
				} //empty($d['User']['titre']) || empty($d['User']['content'])
				else {
					$dest = $d['User']['sendto'];
					$dest = explode('-', $dest);
					foreach ($dest as $k => $v) {
						if (empty($v)) {
							unset($dest[$k]);
						} //empty($v)
					} //$dest as $k => $v
					$titre   = $d['User']['titre'];
					$content = $d['User']['content'];
					foreach ($dest as $k => $v) {
						//envoi des messages
						$this->loadModel('User');
						$u    = $this->User->findById($v);
						$mail = new CakeEmail();
						$mail->from('noreply@amfinexchange.com')->to($u['User']['email'])->subject($titre)->emailFormat('html')->template('newsletter')->viewVars(array(
							'username' => $content
						))->send();
					} //$dest as $k => $v
					$this->Session->setFlash("Message(s) envoyé(s)", "notif");
					$this->redirect('/admin/users/emailing');
					exit;
				}
			} //isset($d['User']['sendto'])
			else {
				$total  = 0;
				$chaine = "";
				foreach ($d['User'] as $k => $v) {
					if ($v == 1) {
						$total++;
						$id = str_replace("u_", "", $k);
						$chaine .= $id . "-";
					} //$v == 1
				} //$d['User'] as $k => $v
				$d['chaine'] = $chaine;
				$this->set($d);
				if ($total == 0) {
					$this->redirect('/admin/users/emailing');
				} //$total == 0
			}
		} //$this->request->is('post')
	}
	/**
	 * Email massif
	 **/
	function admin_emailing()
	{
		$this->paginate = array(
			'limit' => 90000000000
		);
		$d['items']     = $this->Paginate('User');
		$d['count']     = $this->User->find('count');
		$this->set($d);
	}

	/**
	 * Edit d'un utilisateur en admin
	 **/
	function admin_edit($id = null)
	{
		$d['me'] = $this->User->findById($this->Auth->user('id'));
		$this->set($d);
		if (!empty($this->request->data)) {
			if ($this->User->save($this->request->data)) {
				$d         = $this->request->data;
				$active    = $this->request->data['User']['active'];
				$activeold = $this->request->data['User']['activeold'];
				if (($activeold == 0) && $active == 1) {
					$mail                  = new CakeEmail();
					$de                    = $this->User->findById($d['User']['id']);
					$d['User']['username'] = $de['User']['firstname'] . " " . $de['User']['lastname'];
					$mail->from('noreply@amfinexchange.com')->to($d['User']['email'])->subject('Amfinexchange.com | Votre Inscription')->emailFormat('html')->template('signup3')->viewVars(array(
						'username' => $d['User']['username'],
						'email' => $d['User']['email']
					))->send();
				} //($activeold == 0) && $active == 1
				$this->Session->setFlash("L'utilisateur a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->User->save($this->request->data)
			else {
				$this->Session->setFlash("L'utilisateur n'a pas pu être sauvegardé", "notif");
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->User->id      = $id;
			$this->request->data = $this->User->read();
		} //$id != null
	}

	/**
	 * Génération d'un mot de passe en random
	 **/
	function random($car)
	{
		$string = "";
		$chaine = "abcdefghijklmnpqrstuvwxy123456789";
		srand((double) microtime() * 1000000);
		for ($i = 0; $i < $car; $i++) {
			$string .= $chaine[rand() % strlen($chaine)];
		} //$i = 0; $i < $car; $i++
		return $string;
	}

	/**
	 * Token - Marquer envoyé
	 **/
	function admin_tokenenv($id)
	{
		$this->loadModel('Token');
		$this->Token->updateAll(array(
			'Token.sent' => 1
		), array(
			'Token.id' => $id
		));
		$this->redirect($this->referer());
	}

	/**
	 * Ajouter 10 tokens
	 **/
	function admin_token10()
	{
		$this->loadModel('Token');
		$numtoken = 10;
		for ($i = 0; $i < $numtoken; $i++) {
			$this->Token->create();
			$this->Token->set('token', $this->random(10));
			$this->Token->set('ouverture', date('Y-m-d H:i:s', mktime()));
			$this->Token->save();
		} //$i = 0; $i < $numtoken; $i++
		$this->redirect($this->referer());
	}

	/**
	 * Ajouter 100 tokens
	 **/
	function admin_token100()
	{
		$this->loadModel('Token');
		$numtoken = 100;
		for ($i = 0; $i < $numtoken; $i++) {
			$this->Token->create();
			$this->Token->set('token', $this->random(10));
			$this->Token->set('ouverture', date('Y-m-d H:i:s', mktime()));
			$this->Token->save();
		} //$i = 0; $i < $numtoken; $i++
		$this->redirect($this->referer());
	}

	/**
	 * Export XLS / Création header
	 **/
	function xlsBOF()
	{
		echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
		return;
	}
	/**
	 * Export XLS / Fin de fichier
	 **/
	function xlsEOF()
	{
		echo pack("ss", 0x0A, 0x00);
		return;
	}

	/**
	 * Export XLS / Ecrire un nombre
	 **/
	function xlsWriteNumber($Row, $Col, $Value)
	{
		echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
		echo pack("d", $Value);
		return;
	}

	/**
	 * Export XLS / Ecrire un texte
	 **/
	function xlsWriteLabel($Row, $Col, $Value)
	{
		$L = strlen($Value);
		echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
		echo $Value;
		return;
	}

	/**
	 * Inscrit aujourd'hui
	 **/
	function insctoday()
	{
		$users = $this->User->find('all');
		$mess  = "";
		foreach ($users as $k => $v) {
			if (date('Y-m-d', $v['User']['created']) == date('Y-m-d', mktime())) {
				$mess .= "ID: " . $v['User']['id'] . " - " . $v['User']['firstname'] . " " . $v['User']['lastname'] . "<br />";
			} //date('Y-m-d', $v['User']['created']) == date('Y-m-d', mktime())
		} //$users as $k => $v
		$mail = new CakeEmail();
		$mail->from('noreply@amfinexchange.com')->to(Configure::read('site.emailadmin'))->subject('Amfinexchange.com | Nouveaux inscrits')->emailFormat('html')->template('insc')->viewVars(array(
			'mess' => $mess
		))->send();
		exit;
	}

	/**
	 * Export xls filtré
	 **/
	function admin_xlsusersfilter()
	{
		if ($this->request->is('post')) {
			$d       = $this->request->data;
			$filtre  = $d['User']['filtre'];
			$date1   = strtotime($d['User']['date1']);
			$date2   = strtotime($d['User']['date2']);
			$users   = $this->User->find('all', array(
				'conditions' => array(
					'User.membership LIKE' => "%$filtre%",
					'User.created >=' => $date1,
					'User.created <=' => $date2
				)
			));
			$country = array(
				'Afghanistan',
				'Albania',
				'Algeria',
				'American Samoa',
				'Andorra',
				'Angola',
				'Anguilla',
				'Antarctica',
				'Antigua And Barbuda',
				'Argentina',
				'Armenia',
				'Aruba',
				'Australia',
				'Austria',
				'Azerbaijan',
				'Bahamas',
				'Bahrain',
				'Bangladesh',
				'Barbados',
				'Belarus',
				'Belgium',
				'Belize',
				'Benin',
				'Bermuda',
				'Bhutan',
				'Bolivia',
				'Bosnia And Herzegovina',
				'Botswana',
				'Bouvet Island',
				'Brazil',
				'British Indian Ocean Territory',
				'Brunei',
				'Bulgaria',
				'Burkina Faso',
				'Burundi',
				'Cambodia',
				'Cameroon',
				'Canada',
				'Cape Verde',
				'Cayman Islands',
				'Central African Republic',
				'Chad',
				'Chile',
				'China',
				'Christmas Island',
				'Cocos (Keeling) Islands',
				'Columbia',
				'Comoros',
				'Congo',
				'Cook Islands',
				'Costa Rica',
				'Cote D\'Ivorie (Ivory Coast)',
				'Croatia (Hrvatska)',
				'Cuba',
				'Cyprus',
				'Czech Republic',
				'Democratic Republic Of Congo (Zaire)',
				'Denmark',
				'Djibouti',
				'Dominica',
				'Dominican Republic',
				'East Timor',
				'Ecuador',
				'Egypt',
				'El Salvador',
				'Equatorial Guinea',
				'Eritrea',
				'Estonia',
				'Ethiopia',
				'Falkland Islands (Malvinas)',
				'Faroe Islands',
				'Fiji',
				'Finland',
				'France',
				'France, Metropolitan',
				'French Guinea',
				'French Polynesia',
				'French Southern Territories',
				'Gabon',
				'Gambia',
				'Georgia',
				'Germany',
				'Ghana',
				'Gibraltar',
				'Greece',
				'Greenland',
				'Grenada',
				'Guadeloupe',
				'Guam',
				'Guatemala',
				'Guinea',
				'Guinea-Bissau',
				'Guyana',
				'Haiti',
				'Heard And McDonald Islands',
				'Honduras',
				'Hong Kong',
				'Hungary',
				'Iceland',
				'India',
				'Indonesia',
				'Iran',
				'Iraq',
				'Ireland',
				'Israel',
				'Italy',
				'Jamaica',
				'Japan',
				'Jordan',
				'Kazakhstan',
				'Kenya',
				'Kiribati',
				'Kuwait',
				'Kyrgyzstan',
				'Laos',
				'Latvia',
				'Lebanon',
				'Lesotho',
				'Liberia',
				'Libya',
				'Liechtenstein',
				'Lithuania',
				'Luxembourg',
				'Macau',
				'Macedonia',
				'Madagascar',
				'Malawi',
				'Malaysia',
				'Maldives',
				'Mali',
				'Malta',
				'Marshall Islands',
				'Martinique',
				'Mauritania',
				'Mauritius',
				'Mayotte',
				'Mexico',
				'Micronesia',
				'Moldova',
				'Monaco',
				'Mongolia',
				'Montserrat',
				'Morocco',
				'Mozambique',
				'Myanmar (Burma)',
				'Namibia',
				'Nauru',
				'Nepal',
				'Netherlands',
				'Netherlands Antilles',
				'New Caledonia',
				'New Zealand',
				'Nicaragua',
				'Niger',
				'Nigeria',
				'Niue',
				'Norfolk Island',
				'North Korea',
				'Northern Mariana Islands',
				'Norway',
				'Oman',
				'Pakistan',
				'Palau',
				'Panama',
				'Papua New Guinea',
				'Paraguay',
				'Peru',
				'Philippines',
				'Pitcairn',
				'Poland',
				'Portugal',
				'Puerto Rico',
				'Qatar',
				'Reunion',
				'Romania',
				'Russia',
				'Rwanda',
				'Saint Helena',
				'Saint Kitts And Nevis',
				'Saint Lucia',
				'Saint Pierre And Miquelon',
				'Saint Vincent And The Grenadines',
				'San Marino',
				'Sao Tome And Principe',
				'Saudi Arabia',
				'Senegal',
				'Seychelles',
				'Sierra Leone',
				'Singapore',
				'Slovak Republic',
				'Slovenia',
				'Solomon Islands',
				'Somalia',
				'South Africa',
				'South Georgia And South Sandwich Islands',
				'South Korea',
				'Spain',
				'Sri Lanka',
				'Sudan',
				'Suriname',
				'Svalbard And Jan Mayen',
				'Swaziland',
				'Sweden',
				'Switzerland',
				'Syria',
				'Taiwan',
				'Tajikistan',
				'Tanzania',
				'Thailand',
				'Togo',
				'Tokelau',
				'Tonga',
				'Trinidad And Tobago',
				'Tunisia',
				'Turkey',
				'Turkmenistan',
				'Turks And Caicos Islands',
				'Tuvalu',
				'Uganda',
				'Ukraine',
				'United Arab Emirates',
				'United Kingdom',
				'United States',
				'United States Minor Outlying Islands',
				'Uruguay',
				'Uzbekistan',
				'Vanuatu',
				'Vatican City (Holy See)',
				'Venezuela',
				'Vietnam',
				'Virgin Islands (British)',
				'Virgin Islands (US)',
				'Wallis And Futuna Islands',
				'Western Sahara',
				'Western Samoa',
				'Yemen',
				'Yugoslavia',
				'Zambia',
				'Zimbabwe'
			);
			$service = array(
				'Légal / Juridique' => 'Légal / Juridique',
				'Marketing / Communication' => 'Marketing / Communication',
				'Informatique' => 'Informatique',
				'Contrôle interne' => 'Contrôle interne',
				'MOA' => 'MOA',
				'Commercial' => 'Commercial',
				'Direction générale' => 'Direction générale',
				'Autre, précisez' => 'Autre, précisez'
			);
			$secteur = array(
				'Administrateur / dépositaire / valorisateur' => 'Administrateur / dépositaire / valorisateur',
				'Administration' => 'Administration',
				'Association' => 'Association',
				'Assurance' => 'Assurance',
				'Banque' => 'Banque',
				'Banque privée' => 'Banque privée',
				'Broker / Salle de marché' => 'Broker / Salle de marché',
				'Consultant indépendant' => 'Consultant indépendant',
				'Editeur de logiciels' => 'Editeur de logiciels',
				'Fournisseur de services' => 'Fournisseur de services',
				'Hébergeur' => 'Hébergeur',
				'Intégrateur de systèmes' => 'Intégrateur de systèmes',
				'Media' => 'Media',
				'Formation' => 'Formation',
				'Société d\'Audit' => 'Société d\'Audit',
				'Société de conseil' => 'Société de conseil',
				'Société de gestion (grande)' => 'Société de gestion (grande)',
				'Société de gestion (moyenne)' => 'Société de gestion (moyenne)',
				'Société de gestion (petite)' => 'Société de gestion (petite)',
				'Autre, précisez' => 'Autre, précisez'
			);
			// Send Header
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment;filename=Users.xls "); // à¹à¸¥à¹‰à¸§à¸™à¸µà¹ˆà¸à¹‡à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ
			header("Content-Transfer-Encoding: text/plain ");
			$this->xlsBOF();
			$this->xlsWriteLabel(0, 0, "ID");
			$this->xlsWriteLabel(0, 1, "Email");
			$this->xlsWriteLabel(0, 2, "Date de création");
			$this->xlsWriteLabel(0, 3, "Compte Actif");
			$this->xlsWriteLabel(0, 4, "Prénom");
			$this->xlsWriteLabel(0, 5, "Nom");
			$this->xlsWriteLabel(0, 6, "Membership");
			$this->xlsWriteLabel(0, 7, "Presentation");
			$this->xlsWriteLabel(0, 8, "Centres Intérêts");
			$this->xlsWriteLabel(0, 9, "Sports");
			$this->xlsWriteLabel(0, 10, "Culture / Art");
			$this->xlsWriteLabel(0, 11, "Societé-SiteInternet");
			$this->xlsWriteLabel(0, 12, "Societé-SecteurActivité");
			$this->xlsWriteLabel(0, 13, "Anniversaire");
			$this->xlsWriteLabel(0, 14, "Tél-Mobile");
			$this->xlsWriteLabel(0, 15, "Langues Pratiquées");
			$this->xlsWriteLabel(0, 16, "Fonction");
			$this->xlsWriteLabel(0, 17, "Service");
			$this->xlsWriteLabel(0, 18, "Club/Asso");
			$this->xlsWriteLabel(0, 19, "Blog");
			$this->xlsWriteLabel(0, 20, "LinkedIn");
			$this->xlsWriteLabel(0, 21, "Viadeo");
			$this->xlsWriteLabel(0, 22, "Twitter");
			$this->xlsWriteLabel(0, 23, "Facebook");
			$this->xlsWriteLabel(0, 24, "Societe");
			$this->xlsWriteLabel(0, 25, "Ville");
			$this->xlsWriteLabel(0, 26, "Pays");
			$this->xlsWriteLabel(0, 27, "Site");
			$this->xlsWriteLabel(0, 28, "Autorisation publication du nom");
			$this->xlsWriteLabel(0, 29, "Activités (Event)");
			$this->xlsWriteLabel(0, 30, "Activités (Discussion)");
			$this->xlsWriteLabel(0, 31, "Activités (Commentaires-Page)");
			$this->xlsWriteLabel(0, 32, "Activités (Commentaires-Event)");
			$ligne = 0;
			foreach ($users as $k => $v) {
				$ligne++;
				$this->xlsWriteLabel($ligne, 0, $v['User']['id']);
				$this->xlsWriteLabel($ligne, 1, $v['User']['email']);
				$this->xlsWriteLabel($ligne, 2, date('Y-m-d H:i:s', $v['User']['created']));
				$this->xlsWriteLabel($ligne, 3, $v['User']['active']);
				$this->xlsWriteLabel($ligne, 4, $v['User']['firstname']);
				$this->xlsWriteLabel($ligne, 5, $v['User']['lastname']);
				$this->xlsWriteLabel($ligne, 6, $v['User']['membership']);
				$this->xlsWriteLabel($ligne, 7, $v['User']['presentation']);
				$this->xlsWriteLabel($ligne, 8, $v['User']['centresinterets']);
				$this->xlsWriteLabel($ligne, 9, $v['User']['sport']);
				$this->xlsWriteLabel($ligne, 10, $v['User']['cultureart']);
				$this->xlsWriteLabel($ligne, 11, $v['User']['societesiteinternet']);
				$this->xlsWriteLabel($ligne, 12, $secteur[$v['User']['societesecreuractivite']]);
				$this->xlsWriteLabel($ligne, 13, $v['User']['anniversaire']);
				$this->xlsWriteLabel($ligne, 14, $v['User']['telmobile']);
				$this->xlsWriteLabel($ligne, 15, $v['User']['languesparlees']);
				$this->xlsWriteLabel($ligne, 16, $v['User']['fonction']);
				$this->xlsWriteLabel($ligne, 17, $service[$v['User']['service']]);
				$this->xlsWriteLabel($ligne, 18, $v['User']['clubassociation']);
				$this->xlsWriteLabel($ligne, 19, $v['User']['blog']);
				$this->xlsWriteLabel($ligne, 20, $v['User']['linkedin']);
				$this->xlsWriteLabel($ligne, 21, $v['User']['viadeo']);
				$this->xlsWriteLabel($ligne, 22, $v['User']['twitter']);
				$this->xlsWriteLabel($ligne, 23, $v['User']['facebook']);
				$this->xlsWriteLabel($ligne, 24, $v['User']['societe']);
				$this->xlsWriteLabel($ligne, 25, $v['User']['ville']);
				$this->xlsWriteLabel($ligne, 26, $country[$v['User']['pays']]);
				$this->xlsWriteLabel($ligne, 27, $v['User']['site']);
				$this->xlsWriteLabel($ligne, 28, $v['User']['sharename']);
				$c1 = 0;
				$c2 = 0;
				$c3 = 0;
				$c4 = 0;
				foreach ($v['Activity'] as $k2 => $v2) {
					switch ($v2['type']) {
						case 'discussion':
							$c2++;
							break;
						case 'eventcom':
							$c4++;
							break;
						case 'pagecom':
							$c3++;
							break;
						case 'participe':
							$c1++;
							break;
					} //$v2['type']
				} //$v['Activity'] as $k2 => $v2
				$this->xlsWriteLabel($ligne, 29, $c1);
				$this->xlsWriteLabel($ligne, 30, $c2);
				$this->xlsWriteLabel($ligne, 31, $c3);
				$this->xlsWriteLabel($ligne, 32, $c4);
			} //$users as $k => $v
			$this->xlsEOF();
			exit;
		} //$this->request->is('post')
	}

	/**
	 * Export xls des utilisateurs
	 **/
	function admin_xlsusers()
	{
		$users   = $this->User->find('all');
		$country = array(
			'Afghanistan',
			'Albania',
			'Algeria',
			'American Samoa',
			'Andorra',
			'Angola',
			'Anguilla',
			'Antarctica',
			'Antigua And Barbuda',
			'Argentina',
			'Armenia',
			'Aruba',
			'Australia',
			'Austria',
			'Azerbaijan',
			'Bahamas',
			'Bahrain',
			'Bangladesh',
			'Barbados',
			'Belarus',
			'Belgium',
			'Belize',
			'Benin',
			'Bermuda',
			'Bhutan',
			'Bolivia',
			'Bosnia And Herzegovina',
			'Botswana',
			'Bouvet Island',
			'Brazil',
			'British Indian Ocean Territory',
			'Brunei',
			'Bulgaria',
			'Burkina Faso',
			'Burundi',
			'Cambodia',
			'Cameroon',
			'Canada',
			'Cape Verde',
			'Cayman Islands',
			'Central African Republic',
			'Chad',
			'Chile',
			'China',
			'Christmas Island',
			'Cocos (Keeling) Islands',
			'Columbia',
			'Comoros',
			'Congo',
			'Cook Islands',
			'Costa Rica',
			'Cote D\'Ivorie (Ivory Coast)',
			'Croatia (Hrvatska)',
			'Cuba',
			'Cyprus',
			'Czech Republic',
			'Democratic Republic Of Congo (Zaire)',
			'Denmark',
			'Djibouti',
			'Dominica',
			'Dominican Republic',
			'East Timor',
			'Ecuador',
			'Egypt',
			'El Salvador',
			'Equatorial Guinea',
			'Eritrea',
			'Estonia',
			'Ethiopia',
			'Falkland Islands (Malvinas)',
			'Faroe Islands',
			'Fiji',
			'Finland',
			'France',
			'France, Metropolitan',
			'French Guinea',
			'French Polynesia',
			'French Southern Territories',
			'Gabon',
			'Gambia',
			'Georgia',
			'Germany',
			'Ghana',
			'Gibraltar',
			'Greece',
			'Greenland',
			'Grenada',
			'Guadeloupe',
			'Guam',
			'Guatemala',
			'Guinea',
			'Guinea-Bissau',
			'Guyana',
			'Haiti',
			'Heard And McDonald Islands',
			'Honduras',
			'Hong Kong',
			'Hungary',
			'Iceland',
			'India',
			'Indonesia',
			'Iran',
			'Iraq',
			'Ireland',
			'Israel',
			'Italy',
			'Jamaica',
			'Japan',
			'Jordan',
			'Kazakhstan',
			'Kenya',
			'Kiribati',
			'Kuwait',
			'Kyrgyzstan',
			'Laos',
			'Latvia',
			'Lebanon',
			'Lesotho',
			'Liberia',
			'Libya',
			'Liechtenstein',
			'Lithuania',
			'Luxembourg',
			'Macau',
			'Macedonia',
			'Madagascar',
			'Malawi',
			'Malaysia',
			'Maldives',
			'Mali',
			'Malta',
			'Marshall Islands',
			'Martinique',
			'Mauritania',
			'Mauritius',
			'Mayotte',
			'Mexico',
			'Micronesia',
			'Moldova',
			'Monaco',
			'Mongolia',
			'Montserrat',
			'Morocco',
			'Mozambique',
			'Myanmar (Burma)',
			'Namibia',
			'Nauru',
			'Nepal',
			'Netherlands',
			'Netherlands Antilles',
			'New Caledonia',
			'New Zealand',
			'Nicaragua',
			'Niger',
			'Nigeria',
			'Niue',
			'Norfolk Island',
			'North Korea',
			'Northern Mariana Islands',
			'Norway',
			'Oman',
			'Pakistan',
			'Palau',
			'Panama',
			'Papua New Guinea',
			'Paraguay',
			'Peru',
			'Philippines',
			'Pitcairn',
			'Poland',
			'Portugal',
			'Puerto Rico',
			'Qatar',
			'Reunion',
			'Romania',
			'Russia',
			'Rwanda',
			'Saint Helena',
			'Saint Kitts And Nevis',
			'Saint Lucia',
			'Saint Pierre And Miquelon',
			'Saint Vincent And The Grenadines',
			'San Marino',
			'Sao Tome And Principe',
			'Saudi Arabia',
			'Senegal',
			'Seychelles',
			'Sierra Leone',
			'Singapore',
			'Slovak Republic',
			'Slovenia',
			'Solomon Islands',
			'Somalia',
			'South Africa',
			'South Georgia And South Sandwich Islands',
			'South Korea',
			'Spain',
			'Sri Lanka',
			'Sudan',
			'Suriname',
			'Svalbard And Jan Mayen',
			'Swaziland',
			'Sweden',
			'Switzerland',
			'Syria',
			'Taiwan',
			'Tajikistan',
			'Tanzania',
			'Thailand',
			'Togo',
			'Tokelau',
			'Tonga',
			'Trinidad And Tobago',
			'Tunisia',
			'Turkey',
			'Turkmenistan',
			'Turks And Caicos Islands',
			'Tuvalu',
			'Uganda',
			'Ukraine',
			'United Arab Emirates',
			'United Kingdom',
			'United States',
			'United States Minor Outlying Islands',
			'Uruguay',
			'Uzbekistan',
			'Vanuatu',
			'Vatican City (Holy See)',
			'Venezuela',
			'Vietnam',
			'Virgin Islands (British)',
			'Virgin Islands (US)',
			'Wallis And Futuna Islands',
			'Western Sahara',
			'Western Samoa',
			'Yemen',
			'Yugoslavia',
			'Zambia',
			'Zimbabwe'
		);
		$service = array(
			'Légal / Juridique' => 'Légal / Juridique',
			'Marketing / Communication' => 'Marketing / Communication',
			'Informatique' => 'Informatique',
			'Contrôle interne' => 'Contrôle interne',
			'MOA' => 'MOA',
			'Commercial' => 'Commercial',
			'Direction générale' => 'Direction générale',
			'Autre, précisez' => 'Autre, précisez'
		);
		$secteur = array(
			'Administrateur / dépositaire / valorisateur' => 'Administrateur / dépositaire / valorisateur',
			'Administration' => 'Administration',
			'Association' => 'Association',
			'Assurance' => 'Assurance',
			'Banque' => 'Banque',
			'Banque privée' => 'Banque privée',
			'Broker / Salle de marché' => 'Broker / Salle de marché',
			'Consultant indépendant' => 'Consultant indépendant',
			'Editeur de logiciels' => 'Editeur de logiciels',
			'Fournisseur de services' => 'Fournisseur de services',
			'Hébergeur' => 'Hébergeur',
			'Intégrateur de systèmes' => 'Intégrateur de systèmes',
			'Media' => 'Media',
			'Formation' => 'Formation',
			'Société d\'Audit' => 'Société d\'Audit',
			'Société de conseil' => 'Société de conseil',
			'Société de gestion (grande)' => 'Société de gestion (grande)',
			'Société de gestion (moyenne)' => 'Société de gestion (moyenne)',
			'Société de gestion (petite)' => 'Société de gestion (petite)',
			'Autre, précisez' => 'Autre, précisez'
		);
		// Send Header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=Users.xls "); // à¹à¸¥à¹‰à¸§à¸™à¸µà¹ˆà¸à¹‡à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ
		header("Content-Transfer-Encoding: text/plain ");
		$this->xlsBOF();
		$this->xlsWriteLabel(0, 0, "ID");
		$this->xlsWriteLabel(0, 1, "Email");
		$this->xlsWriteLabel(0, 2, "Date de création");
		$this->xlsWriteLabel(0, 3, "Compte Actif");
		$this->xlsWriteLabel(0, 4, "Prénom");
		$this->xlsWriteLabel(0, 5, "Nom");
		$this->xlsWriteLabel(0, 6, "Membership");
		$this->xlsWriteLabel(0, 7, "Presentation");
		$this->xlsWriteLabel(0, 8, "Centres Intérêts");
		$this->xlsWriteLabel(0, 9, "Sports");
		$this->xlsWriteLabel(0, 10, "Culture / Art");
		$this->xlsWriteLabel(0, 11, "Societé-SiteInternet");
		$this->xlsWriteLabel(0, 12, "Societé-SecteurActivité");
		$this->xlsWriteLabel(0, 13, "Anniversaire");
		$this->xlsWriteLabel(0, 14, "Tél-Mobile");
		$this->xlsWriteLabel(0, 15, "Langues Pratiquées");
		$this->xlsWriteLabel(0, 16, "Fonction");
		$this->xlsWriteLabel(0, 17, "Service");
		$this->xlsWriteLabel(0, 18, "Club/Asso");
		$this->xlsWriteLabel(0, 19, "Blog");
		$this->xlsWriteLabel(0, 20, "LinkedIn");
		$this->xlsWriteLabel(0, 21, "Viadeo");
		$this->xlsWriteLabel(0, 22, "Twitter");
		$this->xlsWriteLabel(0, 23, "Facebook");
		$this->xlsWriteLabel(0, 24, "Societe");
		$this->xlsWriteLabel(0, 25, "Ville");
		$this->xlsWriteLabel(0, 26, "Pays");
		$this->xlsWriteLabel(0, 27, "Site");
		$this->xlsWriteLabel(0, 28, "Autorisation publication du nom");
		$this->xlsWriteLabel(0, 29, "Activités (Event)");
		$this->xlsWriteLabel(0, 30, "Activités (Discussion)");
		$this->xlsWriteLabel(0, 31, "Activités (Commentaires-Page)");
		$this->xlsWriteLabel(0, 32, "Activités (Commentaires-Event)");
		$ligne = 0;
		foreach ($users as $k => $v) {
			$ligne++;
			$this->xlsWriteLabel($ligne, 0, $v['User']['id']);
			$this->xlsWriteLabel($ligne, 1, $v['User']['email']);
			$this->xlsWriteLabel($ligne, 2, date('Y-m-d H:i:s', $v['User']['created']));
			$this->xlsWriteLabel($ligne, 3, $v['User']['active']);
			$this->xlsWriteLabel($ligne, 4, $v['User']['firstname']);
			$this->xlsWriteLabel($ligne, 5, $v['User']['lastname']);
			$this->xlsWriteLabel($ligne, 6, $v['User']['membership']);
			$this->xlsWriteLabel($ligne, 7, $v['User']['presentation']);
			$this->xlsWriteLabel($ligne, 8, $v['User']['centresinterets']);
			$this->xlsWriteLabel($ligne, 9, $v['User']['sport']);
			$this->xlsWriteLabel($ligne, 10, $v['User']['cultureart']);
			$this->xlsWriteLabel($ligne, 11, $v['User']['societesiteinternet']);
			$this->xlsWriteLabel($ligne, 12, $secteur[$v['User']['societesecreuractivite']]);
			$this->xlsWriteLabel($ligne, 13, $v['User']['anniversaire']);
			$this->xlsWriteLabel($ligne, 14, $v['User']['telmobile']);
			$this->xlsWriteLabel($ligne, 15, $v['User']['languesparlees']);
			$this->xlsWriteLabel($ligne, 16, $v['User']['fonction']);
			$this->xlsWriteLabel($ligne, 17, $service[$v['User']['service']]);
			$this->xlsWriteLabel($ligne, 18, $v['User']['clubassociation']);
			$this->xlsWriteLabel($ligne, 19, $v['User']['blog']);
			$this->xlsWriteLabel($ligne, 20, $v['User']['linkedin']);
			$this->xlsWriteLabel($ligne, 21, $v['User']['viadeo']);
			$this->xlsWriteLabel($ligne, 22, $v['User']['twitter']);
			$this->xlsWriteLabel($ligne, 23, $v['User']['facebook']);
			$this->xlsWriteLabel($ligne, 24, $v['User']['societe']);
			$this->xlsWriteLabel($ligne, 25, $v['User']['ville']);
			$this->xlsWriteLabel($ligne, 26, $country[$v['User']['pays']]);
			$this->xlsWriteLabel($ligne, 27, $v['User']['site']);
			$this->xlsWriteLabel($ligne, 28, $v['User']['sharename']);
			$c1 = 0;
			$c2 = 0;
			$c3 = 0;
			$c4 = 0;
			foreach ($v['Activity'] as $k2 => $v2) {
				switch ($v2['type']) {
					case 'discussion':
						$c2++;
						break;
					case 'eventcom':
						$c4++;
						break;
					case 'pagecom':
						$c3++;
						break;
					case 'participe':
						$c1++;
						break;
				} //$v2['type']
			} //$v['Activity'] as $k2 => $v2
			$this->xlsWriteLabel($ligne, 29, $c1);
			$this->xlsWriteLabel($ligne, 30, $c2);
			$this->xlsWriteLabel($ligne, 31, $c3);
			$this->xlsWriteLabel($ligne, 32, $c4);
		} //$users as $k => $v
		$this->xlsEOF();
		exit;
	}
	/**
	 * Ajouter 100 tokenstxt
	 **/
	function admin_token100txt()
	{
		$this->loadModel('Token');
		$numtoken = 100;
		// Send Header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=Tokens.xls "); // à¹à¸¥à¹‰à¸§à¸™à¸µà¹ˆà¸à¹‡à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ
		header("Content-Transfer-Encoding: binary ");
		$this->xlsBOF();
		for ($i = 0; $i < $numtoken; $i++) {
			$this->Token->create();
			$tok = $this->random(10);
			$this->Token->set('token', $tok);
			$this->Token->set('sent', 1);
			$this->Token->set('ouverture', date('Y-m-d H:i:s', mktime()));
			$this->Token->save();
			//echo $tok;
			$this->xlsWriteLabel($i, 0, $tok);
		} //$i = 0; $i < $numtoken; $i++
		$this->xlsEOF();
		exit;
		$this->redirect($this->referer());
	}
	/**
	 * Supprime les tokens utilisés
	 **/
	function admin_tokenused()
	{
		$this->loadModel('Token');
		$this->Token->deleteAll(array(
			'Token.status' => 1
		));
		$this->redirect($this->referer());
	}
	/**
	 * Supprime les tokens envoyé
	 **/
	function admin_tokensent()
	{
		$this->loadModel('Token');
		$this->Token->deleteAll(array(
			'Token.sent' => 1
		));
		$this->redirect($this->referer());
	}
	/**
	 * Supprime un utilisateur en admin
	 **/
	function admin_delete($id)
	{
		$this->User->delete($id);
		$this->Session->setFlash("L'utilisateur a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
	/**
	 * Supprime un token en admin
	 **/
	function admin_deletetoken($id)
	{
		$this->loadModel('Token');
		$this->Token->delete($id);
		$this->Session->setFlash("Le Token a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
	
	
	
	
	
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
	
	
	
	
}