<?php


/**
 *
 */
class ModelAdresse extends Model
{

    private $id;
    private $numero;
    private $rue;
    private $codePostal;
    private $ville;
    private $pays;

    protected static $object='adresse';
    protected static $primary='id';

    public function __construct($id=NULL, $numero=NULL, $rue=NULL, $codePostal=NULL, $ville=NULL, $pays=NULL)
    {
        if(!is_null($id) && !is_null($numero) && !is_null($rue) && !is_null($codePostal) && !is_null($ville) && !is_null($pays)) {
            $this->id = $id;
            $this->numero = $numero;
            $this->rue = $rue;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
            $this->pays = $pays;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }

}
