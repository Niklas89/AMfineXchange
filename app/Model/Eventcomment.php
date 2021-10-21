<?php
class Eventcomment extends AppModel
{
    public $belongsTo = array('Page' => array('className' => 'Event', 'foreignKey' => 'event_id'), 'User' => array('className' => 'User', 'foreignKey' => 'user_id'));
    public $order = "Eventcomment.id DESC";
    public $validate = array('content' => array('rule' => 'notEmpty', 'message' => 'Message obligatoire'));
}