<?php
require_once File::build_path(array('model','Model.php'));

/**
 *
 */
class ModelClient extends Model
{

    private $id;
    private $nom;
    private $prenom;

    protected static $object='client';
    protected static $primary='id';

    public function __construct($id=NULL, $nom=NULL, $prenom=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($prenom)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

}
