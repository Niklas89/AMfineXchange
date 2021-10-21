<?php
class Sondageparticipation extends AppModel
{
    public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'), 'Sondage' => array('className' => 'Sondage', 'foreignKey' => 'sondage_id'));
}
?>