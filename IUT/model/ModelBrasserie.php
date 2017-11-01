<?php


/**
 *
 */
class ModelBrasserie extends Model
{

    private $id;
    private $nom;
    private $idAdresse;
    
    
    protected static $object='brasserie';
    protected static $primary='id';

    // a constructor
    public function __construct($i = NULL, $n = NULL, $a = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($a)) {
            $this->id = $i;
            $this->nom = $n;
            $this->adresse = $a;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
