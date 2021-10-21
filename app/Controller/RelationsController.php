<?php
class RelationsController extends AppController
{
	function contact()
	{
		if ($this->request->is('post') && isset($this->request->data['Relation'])) {
			$d = $this->request->data['Relation'];
			$this->Relation->set($d);
			//Validation de la mise en relation
			if ($this->Relation->validates()) {
				$listEmail = $this->Relation->data['Relation'];
				foreach ($listEmail as $k => $v) {
					if ($v != "") {
						$link = array(
							'/users/signup?token=invitation'
						);
						//Envoi du mail
						$mail = new CakeEmail();
						$mail->from('noreply@amfinexchange.com')->to($v)->subject('Amfinexchange.com | L\'un de vos contact souhaite vous inviter')->emailFormat('html')->template('invite')->viewVars(array(
							'link' => $link
						))->send();
					} //$v != ""
				} //$listEmail as $k => $v
				$this->Session->setFlash("Vos contact ont été averti par email. Merci !", "notif");
			} //$this->Relation->validates()
			else {
				$this->Session->setFlash("Il y'a une erreur dans les emails proposées.", "notif", array(
					'type' => 'error'
				));
			}
		} //$this->request->is('post') && isset($this->request->data['Relation'])
	}
}