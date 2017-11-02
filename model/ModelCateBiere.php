<?php


/**
 *
 */
class ModelCateBiere extends Model
{

    /**
     * @var int
     */
    private $idBiere;

    /**
     * @var int
     */
    private $idCategorie;


    protected static $object='catebiere';
    //protected static $primary='id';

    /**
     * ModelCateBiere constructor.
     * @param int $idBiere
     * @param int $idCategorie
     */
    public function __construct($idBiere=NULL, $idCategorie=NULL)
    {
        if (!is_null($idBiere) && !is_null($idCategorie)) {
            $this->idBiere = $idBiere;
            $this->idCategorie = $idCategorie;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }


}
