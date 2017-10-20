<?php


/**
 *
 */
class ModelCommande
{
    /**
     *
     */
    public function __construct()
    {
    }

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
     * @var \ModelBiere[]
     */
    private $listBieres;

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
