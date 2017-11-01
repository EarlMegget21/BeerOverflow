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
        if (!is_null($id) && !is_null($idClient) && !is_null($date) && !is_null($livraison)) {
            $this->id = $id;
            $this->livraison = $livraison;
            $this->idClient = $idClient;
            $this->date = $date;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    public function calculerTotal()
    {

    }
}
