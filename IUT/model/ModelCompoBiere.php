<?php

class ModelCompoBiere extends Model
{
    private $idBiere;
    private $idIngredient;
    private $quantité; //ou "taux" je sais pas genre 20% de houblon...

    protected static $object = 'compoBiere';

    public function __construct($idB = NULL, $idI = NULL, $q = NULL)
    {
        if (!is_null($idB) && !is_null($idI) && !is_null($q)) {
            $this->idBiere = $idB;
            $this->idIngredient = $idI;
            $this->quantité = $q;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }
}