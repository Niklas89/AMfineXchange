<?php
class Relation extends AppModel
{
	public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'), 'Contact' => array('className' => 'User', 'foreignKey' => 'contact_id'));
	public $validate = array('email' => array(array('rule' => 'email', 'required' => 'true', 'allowEmpty' => false, 'message' => 'Votre email n\'est pas valide')), 'email2' => array(array('rule' => 'email', 'required' => '', 'allowEmpty' => true, 'message' => 'Votre email n\'est pas valide')), 'email3' => array(array('rule' => 'email', 'required' => '', 'allowEmpty' => true, 'message' => 'Votre email n\'est pas valide')), 'email4' => array(array('rule' => 'email', 'required' => '', 'allowEmpty' => true, 'message' => 'Votre email n\'est pas valide')), 'email5' => array(array('rule' => 'email', 'required' => '', 'allowEmpty' => true, 'message' => 'Votre email n\'est pas valide')));
}
?>