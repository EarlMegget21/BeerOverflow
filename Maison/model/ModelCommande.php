<?php


/**
 *
 */
class ModelCommande extends Model
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var boolean
     */
    private $livraison;

    /**
     * @var \ModelClient
     */
    private $client;

    /**
     * @var \ModelMoment
     */
    private $moment;
    
    
    protected static $object='commande';
    protected static $primary='id';

    /**
     * @return float
     */
    public function calculerTotal()    {
        // TODO: implement here
        return 0.0;
    }

}
