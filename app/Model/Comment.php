<?php
class Comment extends AppModel
{
    public $belongsTo = array('Page' => array('className' => 'Page', 'foreignKey' => 'page_id'), 'User' => array('className' => 'User', 'foreignKey' => 'user_id'));
    public $order = "Comment.created desc";
    public $validate = array('content' => array('rule' => 'notEmpty', 'message' => 'Message obligatoire'));
}