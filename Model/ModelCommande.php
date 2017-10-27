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
     * @var \ModelBiere[]
     */
    private $listBieres;

    /**
     * @var \ModelClient
     */
    private $client;

    /**
     * @var \ModelMoment
     */
    private $moment;

    /**
     * @return float
     */
    public function calculerTotal():float
    {
        // TODO: implement here
        return 0.0;
    }

}
