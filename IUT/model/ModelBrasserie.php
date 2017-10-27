<?php


/**
 *
 */
class ModelBrasserie extends Model
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
     * @var \ModelAdresse
     */
    private $adresse;

    /**
     * @var \ModelMarque[]
     */
    private $listMarques;
    
    
    protected static $object='brasserie';
    protected static $primary='id';

    // a constructor
    public function __construct($i = NULL, $n = NULL, $a = NULL, $m=NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($a) && !is_null($m)) {
            $this->id = $i;
            $this->nom = $n;
            $this->adresse = $a;
            $this->listMarques = $m;
        }
    }


}
