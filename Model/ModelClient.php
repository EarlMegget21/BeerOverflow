<?php


/**
 *
 */
abstract class ModelClient
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @var String
     */
    private $nom;

    /**
     * @var String
     */
    private $prenom;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \ModelCommande[]
     */
    private $listCommandes;

    /**
     * @var \ModelAdresse
     */
    private $adresse;

}
