<?php

class ModelMarque extends Model
{

    private $id;
    private $nom;
    private $edition;
    private $brasseur;
	
	public function __construct($id = NULL, $n = NULL, $ed = NULL, $br = NULL, $liste = NULL) {
        if (!is_null($id) && !is_null($n) && !is_null($ed) && !is_null($br) && !is_null($liste)) {
            $this->id = $id;
            $this->nom = $n;
            $this->edition = $ed;
			$this->brasseur = $br;
			$this->listBieres = $liste;
        }
    }


    protected static $object='marque';
    protected static $primary='id';

}
