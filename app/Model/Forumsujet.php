<?php
class Forumsujet extends AppModel
{
    var $displayField = "sujet";
    public $hasMany = array('Forum' => array('className' => 'Forum', 'foreignKey' => 'forumsujet_id'));
    public $belongsTo = array('Forumcat' => array('className' => 'Forumcat', 'foreignKey' => 'forumcat_id'), 'User' => array('className' => 'User', 'foreignKey' => 'user_id'));
    public $validate = array('message' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Catégorie invalide')), 'sujet' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Catégorie invalide')));
}