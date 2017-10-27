<?php
require_once File::build_path(array('Model','Model.php'));

class ModelUtilisateur extends Model{

    private $login;
    private $nom;
    private $prenom;
    private $table;
    protected static $object='utilisateur';
    protected static $primary='login';

    // getters
   public function getLogin(){
       return $this->login;
   }
   
   public function getNom(){
       return $this->nom;
   }
   
   public function getPrenom(){
       return $this->prenom;
   }

    // a constructor
    public function __construct($l = NULL, $n = NULL, $p = NULL) {
        if (!is_null($l) && !is_null($n) && !is_null($p)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
        }
    }
    
}
?>