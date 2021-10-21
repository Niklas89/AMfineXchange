<?php
class Message extends AppModel
{
    public $belongsTo = array('Sender' => array('className' => 'User', 'foreignKey' => 'sender_id'), 'Receiver' => array('className' => 'User', 'foreignKey' => 'receiver_id'));
    public $hasMany = array('Message' => array('className' => 'Message', 'foreignKey' => 'answerto_id'));
    public $validate = array('message' => array(array('rule' => array('minLength', 2), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Le message est vide')));
}