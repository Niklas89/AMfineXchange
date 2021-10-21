<?php
class Forumcat extends AppModel
{
    var $displayField = "categorie";
    public $hasMany = array('Forumsujet' => array('className' => 'Forumsujet', 'foreignKey' => 'forumcat_id'));
    public $validate = array('categorie' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Catégorie invalide')));
}