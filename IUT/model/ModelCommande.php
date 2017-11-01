<?php


class ModelCommande extends Model
{

    private $id;
    private $livraison;
    private $idClient;
    private $date;  
    
    protected static $object='commande';
    protected static $primary='id';

    public function __construct($id=NULL, $livraison=false, $idClient=NULL, $date=NULL)
    {
        if (!is_null($id) && !is_null($idClient) && !is_null($date)) {
            $this->id = $id;
            $this->livraison = $livraison;
            $this->idClient = $idClient;
            $this->idDdate = $date;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    /**
     * @return float
     */
    public function calculerTotal()
    {

    }
}
