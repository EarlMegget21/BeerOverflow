<?php
require_once File::build_path(array('Model','Model.php'));

class ModelVoiture extends Model{

    private $marque;
    private $couleur;
    private $immatriculation;
    protected static $object='voiture';
    protected static $primary='immatriculation';

    // getters
    public function getMarque() {
        return $this->marque;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getImm() {
        return $this->immatriculation;
    }

    // setters
    public function setMarque($marque2) {
        $this->marque = $marque2;
    }

    public function setCouleur($couleur2) {
        $this->couleur = $couleur2;
    }

    public function setImm($imm2) {
        if (strlen($imm2) <= 8) {
            $this->immatriculation = $imm2;
        }
    }

    // a constructor
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }
    
}
?>

