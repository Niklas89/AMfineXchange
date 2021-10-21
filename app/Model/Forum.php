<?php
class Forum extends AppModel
{
    public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'), 'Forumsujet' => array('className' => 'Forumsujet', 'foreignKey' => 'forumsujet_id'));
    public $validate = array('sujet' => array('rule' => 'notEmpty', 'message' => 'Sujet obligatoire'), 'content' => array('rule' => 'notEmpty', 'message' => 'Message obligatoire'));
}