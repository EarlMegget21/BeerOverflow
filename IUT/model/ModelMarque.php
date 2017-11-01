<?php

class ModelMarque extends Model
{

    private $id;
    private $nom;
    private $edition;
    private $idBrasserie;

    protected static $object = 'marque';
    protected static $primary = 'id';
	
	public function __construct($id = NULL, $n = NULL, $ed = NULL, $br = NULL)
    {
        if (!is_null($id) && !is_null($n) && !is_null($ed) && !is_null($br)) {
            $this->id = $id;
            $this->nom = $n;
            $this->edition = $ed;
            $this->idBrasserie = $br;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }
}
