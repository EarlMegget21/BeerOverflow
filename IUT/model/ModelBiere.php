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

    /**
     * ModelBiere constructor.
     * @param int $id
     * @param String $nom
     * @param String $marque
     * @param int $idBrasserie
     * @param float $taux
     * @param String $composition
     * @param float $montant
     */
    public function __construct($id=NULL, $nom=NULL, $marque=NULL, $idBrasserie=NULL, $taux=NULL, $composition=NULL, $montant=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($marque) && !is_null($idBrasserie) && !is_null($taux) && !is_null($composition) && !is_null($montant)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->marque = $marque;
            $this->idBrasserie = $idBrasserie;
            $this->taux = $taux;
            $this->composition = $composition;
            $this->montant = $montant;
        }
    }


    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
