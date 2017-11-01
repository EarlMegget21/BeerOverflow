<?php


/**
 *
 */
class ModelCategorie extends Model
{

    private $id;
    private $nom;
    private $description;
    
    protected static $object='categorie';
    protected static $primary='id';

    public function __construct($id=NULL, $nom=NULL, $desc=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($desc)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->description = $desc;
        }
    }


    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
