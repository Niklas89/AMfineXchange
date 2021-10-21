<?php
class Media extends AppModel
{
	public $useTable = "medias";
	public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'));
	public $validate = array('name' => array('rule' => 'notEmpty', 'message' => 'Nom du media obligatoire'), 'file' => array('rule' => '/^.*\.(jpg|jpeg|png|gif)/', 'message' => 'Fichiers compatible : jpg | jpeg | png | gif'), 'allowEmpty' => true);
}
?>