<?php


/**
 *
 */
class ModelAdresse extends Model
{

    /**
     * @var int
     */
    private $id;
    
    /**
     * @var int
     */
    private $numero;

    /**
     * @var String
     */
    private $rue;

    /**
     * @var int
     */
    private $codePostal;

    /**
     * @var String
     */
    private $ville;

    /**
     * @var String
     */
    private $pays;


    protected static $object='adresse';
    protected static $primary='id';
    

}
