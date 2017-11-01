<?php


/**
 *
 */
class ModelAchat extends Model
{
    /**
     * @var int
     */
    private $idBiere;

    /**
     * @var int
     */
    private $idCommande;

    /**
     * @var int
     */
    private $quantite;



    protected static $object='achat';
    //protected static $primary='id';

    /**
     * ModelAchat constructor.
     * @param int $idBiere
     * @param int $idCommande
     * @param int $qte
     */
    public function __construct($idBiere=NULL, $idCommande=NULL, $qte=NULL)
    {
        if (!is_null($idBiere) && !is_null($idCommande) && !is_null($qte)) {
            $this->idBiere = $idBiere;
            $this->idCommande = $idCommande;
            $this->quantite = $qte;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
