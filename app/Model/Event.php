<?php
class Event extends AppModel
{
	var $displayField = 'baseline';
	public $hasMany = array('Eventcomment' => array('className' => 'Eventcomment'), 'Participation' => array('className' => 'Participation'));
	public $validate = array('theme' => array('rule' => 'notEmpty', 'message' => 'Thème obligatoire'), 'presentation' => array('rule' => 'notEmpty', 'message' => 'Présentation obligatoire'), 'programme' => array('rule' => 'notEmpty', 'message' => 'Programme obligatoire'), 'baseline' => array('rule' => 'notEmpty', 'message' => 'Baseline obligatoire'), 'organisateur' => array('rule' => 'notEmpty', 'message' => 'Organisateur obligatoire'), 'date' => array('rule' => 'notEmpty', 'message' => 'Date invalide'));
}
?>