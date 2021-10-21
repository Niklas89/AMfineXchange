<?php
class Sondage extends AppModel
{
    public $hasMany = array('Sondageparticipation' => array('className' => 'Sondageparticipation'));
    public $validate = array('name' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Nom invalide')), 'question' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Question invalide')), 'r1' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Réponse 1 invalide')), 'r2' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Réponse 2 invalide')));
}
?>