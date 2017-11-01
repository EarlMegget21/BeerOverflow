<?php


/**
 *
 */
class ModelBiere extends Model
{

    private $id;
    private $nom;
    private $idMarque;
    private $idBrasserie;
    private $taux;
    private $montant;


    protected static $object='biere';
    protected static $primary='id';

    public function __construct($id=NULL, $nom=NULL, $idMarque=NULL, $idBrasserie=NULL, $taux=NULL, $montant=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($idMarque) && !is_null($idBrasserie) && !is_null($taux) && !is_null($montant)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->idMarque = $idMarque;
            $this->idBrasserie = $idBrasserie;
            $this->taux = $taux;
            $this->montant = $montant;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
