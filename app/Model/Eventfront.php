<?php
class Eventfront extends AppModel
{
    public $belongsTo = array('Event1' => array('className' => 'Event', 'foreignKey' => 'event1_id'), 'Event2' => array('className' => 'Event', 'foreignKey' => 'event2_id'), 'Event3' => array('className' => 'Event', 'foreignKey' => 'event3_id'));
}
?>