<?php
class EventfrontsController extends AppController
{
	//Sauvegarde des liens event dans la sidebar
	function admin_savefront($id = null)
	{
		if (!empty($this->request->data)) {
			$this->Eventfront->id = 1;
			$this->Eventfront->saveField('event1_id', $this->request->data['Eventfront']['event_id1']);
			$this->Eventfront->saveField('event2_id', $this->request->data['Eventfront']['event_id2']);
			$this->Eventfront->saveField('event3_id', $this->request->data['Eventfront']['event_id3']);
			$this->Session->setFlash("Les liens ont bien été sauvegardé", "notif");
			$this->redirect($this->referer());
		} //!empty($this->request->data)
		elseif ($id != null) {
			$this->Eventfront->id = $id;
			$this->request->data  = $this->Eventfront->read();
			$this->redirect($this->referer());
		} //$id != null
	}
}
?>