<?php
class Page extends AppModel
{
    var $order = "Page.id DESC";
    public $hasMany = array('Comment' => array('className' => 'Comment'));
    public $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'));
    //Vérifie l'extension
    function check_file_type($check)
    {
        $check['miniature'] = end(explode("/", $check['miniature']));
        $ext                = "";
        if (!empty($check)) {
            $value = $check['miniature'];
            $ext   = explode(".", $value);
            $ext   = $ext[1];
        } //!empty($check)
        if (($ext == "jpg" || $ext == "jpeg" || $ext == "png") || empty($ext))
            return true;
        return false;
    }
    public $validate = array('name' => array('rule' => 'notEmpty', 'message' => 'Titre obligatoire'), 'miniature' => array('rule' => array('check_file_type'), 'message' => 'Fichiers compatible : jpg | jpeg | png.', 'required' => false, 'allowEmpty' => true));

    //Routage par slug
    public function afterFind($data)
    {
        foreach ($data as $k => $d) {
            if (isset($d['Page']['id']) && isset($d['Page']['slug'])) {
                $d['Page']['link'] = array(
                    'controller' => 'pages',
                    'action' => 'show',
                    'id' => $d['Page']['id'],
                    'slug' => $d['Page']['slug']
                );
            } //isset($d['Page']['id']) && isset($d['Page']['slug'])
            $countcomment = 0;
            $data[$k]     = $d;
        } //$data as $k => $d
        return $data;
    }

    //Création du slug si vide en admin
    public function beforeSave()
    {
        if (empty($this->data['Page']['slug']) && isset($this->data['Page']['slug']) && isset($this->data['Page']['name'])) {
            $this->data['Page']['slug'] = strtolower(Inflector::slug($this->data['Page']['name'], '-'));
        } //empty($this->data['Page']['slug']) && isset($this->data['Page']['slug']) && isset($this->data['Page']['name'])
        return true;
    }
}
?>