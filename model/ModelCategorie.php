<?php


/**
 *
 */
class ModelCategorie extends Model
{

    /**
     * @var int
     */
    private $id;
    
    /**
     * @var String
     */
    private $nom;

    /**
     * @var String
     */
    private $specifications;
    
    
    protected static $object='categorie';
    protected static $primary='id';

    /**
     * ModelCategorie constructor.
     * @param int $id
     * @param String $nom
     * @param String $specifications
     */
    public function __construct($id=NULL, $nom=NULL, $specifications=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($specifications)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->specifications = $specifications;
        }
    }


    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
