<?php


/**
 *
 */
abstract class ModelClient extends Model
{

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

    
    protected static $object='client';
    protected static $primary='id';

}
