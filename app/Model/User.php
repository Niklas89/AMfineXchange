<?php
class User extends AppModel
{
  function __construct($id = false, $table = null, $ds = null)
  {
    parent::__construct($id, $table, $ds);
    $this->virtualFields['full_name'] = sprintf('CONCAT(%s.firstname, " ", %s.lastname)', $this->alias, $this->alias);
  }
  public $displayField = 'full_name';
  public $hasMany = array('Activity' => array('className' => 'Activity'), 'Forum' => array('className' => 'Forum'), 'Participation' => array('className' => 'Participation'), 'Alertinfo' => array('className' => 'Alertinfo'), 'Relation' => array('className' => 'Relation'), 'Forum' => array('className' => 'Forum'), 'Page' => array('className' => 'Page'), 'Comment' => array('className' => 'Comment'));
  public $hasOne = array('Infonew' => array('className' => 'Infonew'));
  //     'Message' => array(
  //       'className'    => 'Message'
  //    ),
  public $order = "User.id desc";
  public $validate = array('firstname' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Prénom invalide')), 'lastname' => array(array('rule' => array('minLength', 1), 'required' => 'true', 'allowEmpty' => false, 'message' => 'Nom invalide')), 'societe' => array(array('rule' => array('minLength', 1), 'on' => 'create', 'required' => 'true', 'allowEmpty' => false, 'message' => 'Société/Organisme invalide')), 'email' => array(array('rule' => 'email', 'required' => 'true', 'allowEmpty' => false, 'message' => 'Votre email n\'est pas valide'), array('rule' => 'isUnique', 'on' => 'create', 'message' => 'Votre email est déjà pris')), 'password' => array(array('rule' => 'notEmpty', 'allowEmpty' => false, 'message' => 'Votre password n\'est pas valide')));
}
?>