<?php
class Contact extends AppModel
{
	public $validate = array('nom' => array('rule' => 'notEmpty', 'message' => 'Nom obligatoire'), 'prenom' => array('rule' => 'notEmpty', 'message' => 'Prenom obligatoire'), 'email' => array(array('rule' => 'email', 'required' => 'true', 'allowEmpty' => false, 'message' => 'Votre email n\'est pas valide')), 'message' => array('rule' => 'notEmpty', 'message' => 'Message requis'));
}
?>