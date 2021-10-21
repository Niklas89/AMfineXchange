<?php
class SondagesController extends AppController
{
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
	 * Export XLS / Génération du fichier XLS
	 **/
	function admin_xlssondage()
	{
		$sondages = $this->Sondage->find('all');
		// Send Header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=Sondages.xls "); // à¹à¸¥à¹‰à¸§à¸™à¸µà¹ˆà¸à¹‡à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ
		header("Content-Transfer-Encoding: text/plain ");
		$this->xlsBOF();
		$this->xlsWriteLabel(0, 0, "ID");
		$this->xlsWriteLabel(0, 1, "Question");
		$this->xlsWriteLabel(0, 2, "REP 1");
		$this->xlsWriteLabel(0, 3, "REP 2");
		$this->xlsWriteLabel(0, 4, "REP 3");
		$this->xlsWriteLabel(0, 5, "REP 4");
		$this->xlsWriteLabel(0, 6, "REP 5");
		$this->xlsWriteLabel(0, 7, "REP 6");
		$this->xlsWriteLabel(0, 8, "VOTE REP 1");
		$this->xlsWriteLabel(0, 9, "VOTE REP 2");
		$this->xlsWriteLabel(0, 10, "VOTE REP 3");
		$this->xlsWriteLabel(0, 11, "VOTE REP 4");
		$this->xlsWriteLabel(0, 12, "VOTE REP 5");
		$this->xlsWriteLabel(0, 13, "VOTE REP 6");
		$ligne = 0;
		foreach ($sondages as $k => $v) {
			$ligne++;
			$this->xlsWriteLabel($ligne, 0, $v['Sondage']['id']);
			$this->xlsWriteLabel($ligne, 1, utf8_decode($v['Sondage']['question']));
			$this->xlsWriteLabel($ligne, 2, $v['Sondage']['r1']);
			$this->xlsWriteLabel($ligne, 3, $v['Sondage']['r2']);
			$this->xlsWriteLabel($ligne, 4, $v['Sondage']['r3']);
			$this->xlsWriteLabel($ligne, 5, $v['Sondage']['r4']);
			$this->xlsWriteLabel($ligne, 6, $v['Sondage']['r5']);
			$this->xlsWriteLabel($ligne, 7, $v['Sondage']['r6']);
			$this->xlsWriteLabel($ligne, 8, $v['Sondage']['r1v']);
			$this->xlsWriteLabel($ligne, 9, $v['Sondage']['r2v']);
			$this->xlsWriteLabel($ligne, 10, $v['Sondage']['r3v']);
			$this->xlsWriteLabel($ligne, 11, $v['Sondage']['r4v']);
			$this->xlsWriteLabel($ligne, 12, $v['Sondage']['r5v']);
			$this->xlsWriteLabel($ligne, 13, $v['Sondage']['r6v']);
		} //$sondages as $k => $v
		$this->xlsEOF();
		exit;
	}

	/**
	 * Liste des sondages en cours
	 **/
	function admin_index()
	{
		$d['items'] = $this->Paginate('Sondage');
		$this->set($d);
	}


	/**
	 * Voter à un sondage
	 **/
	function vote()
	{
		$vote                                  = $this->request->data['Infonews']['r'];
		$this->request->data['Infonews']['r1'] = 0;
		$this->request->data['Infonews']['r2'] = 0;
		$this->request->data['Infonews']['r3'] = 0;
		$this->request->data['Infonews']['r4'] = 0;
		$this->request->data['Infonews']['r5'] = 0;
		$this->request->data['Infonews']['r6'] = 0;
		$s                                     = $this->Sondage->findByActif(1);
		$ids                                   = $s['Sondage']['id'];

		// Si nous avons une remarque / Mail amfine
		if ($this->request->data['remarquer'] != "Remarque") {
			$mail = new CakeEmail();
			$this->loadModel('User');
			$d                     = $this->User->findById($this->Auth->user('id'));
			$d['User']['username'] = $d['User']['firstname'] . " " . $d['User']['lastname'];
			$mail->from('noreply@amfinexchange.com')->to(Configure::read('site.emailadmin'))->subject('Amfinexchange.com | Remarque sur le Sondage')->emailFormat('html')->template('remarque')->viewVars(array(
				'username' => $d['User']['username'],
				'remarque' => $this->request->data['remarquer']
			))->send();
		} //$this->request->data['remarquer'] != "Remarque"

		//Vérification de la réponse choisies
		switch ($vote) {
			case '1':
				$this->Sondage->updateAll(array(
					'Sondage.r1v' => 'Sondage.r1v+1'
				), array(
					'Sondage.id' => $ids
				));
				break;
			case '2':
				$this->Sondage->updateAll(array(
					'Sondage.r2v' => 'Sondage.r2v+1'
				), array(
					'Sondage.id' => $ids
				));
				break;
			case '3':
				$this->Sondage->updateAll(array(
					'Sondage.r3v' => 'Sondage.r3v+1'
				), array(
					'Sondage.id' => $ids
				));
				break;
			case '4':
				$this->Sondage->updateAll(array(
					'Sondage.r4v' => 'Sondage.r4v+1'
				), array(
					'Sondage.id' => $ids
				));
				break;
			case '5':
				$this->Sondage->updateAll(array(
					'Sondage.r5v' => 'Sondage.r5v+1'
				), array(
					'Sondage.id' => $ids
				));
				break;
			case '6':
				$this->Sondage->updateAll(array(
					'Sondage.r6v' => 'Sondage.r6v+1'
				), array(
					'Sondage.id' => $ids
				));
				break;
			default:
				// code...
				break;
		} //$vote

		//Sauvegarde d'un sondage
		$this->loadModel('Sondageparticipation');
		$this->Sondageparticipation->create();
		$this->Sondageparticipation->set('user_id', $this->Auth->user('id'));
		$this->Sondageparticipation->set('sondage_id', $ids);
		$this->Sondageparticipation->set('vote', $vote);
		$this->Sondageparticipation->save();

		$this->Session->setFlash("Votre réponse au sondage a bien été enregistrée. Merci.", "notif");
		$this->redirect($this->referer());
	}

	/**
	 * Editer un sondage en admin
	 **/
	function admin_edit($id = null)
	{
		if (!empty($this->request->data)) {
			if ($this->Sondage->save($this->request->data)) {
				$id = $this->Sondage->id;
				if ($this->request->data['Sondage']['actif'] == 1) {
					$this->Sondage->updateAll(array(
						'Sondage.actif' => 0
					));
					$this->Sondage->updateAll(array(
						'Sondage.actif' => 1
					), array(
						'Sondage.id' => $id
					));
				} //$this->request->data['Sondage']['actif'] == 1
				$this->Session->setFlash("Le Sondages a bien été sauvegardé", "notif");
				$this->redirect(array(
					'action' => 'index'
				));
			} //$this->Sondage->save($this->request->data)
			else {
				$this->Session->setFlash("Le Sondages n'a pas pu être sauvegardé", "notif", array(
					'type' => 'error'
				));
			}
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Sondage->id   = $id;
			$this->request->data = $this->Sondage->read();
		} //$id != null
	}


	/**
	 * Suppression d'un sondage en admin
	 **/
	function admin_delete($id)
	{
		$this->Sondage->delete($id);
		$this->Session->setFlash("Le Sondages a bien été supprimé", "notif");
		$this->redirect($this->referer());
	}
}
?>