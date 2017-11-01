<?php


/**
 *
 */
class ModelAdresse extends Model
{

    private $id;
    private $numero;
    private $rue;
    private $codePostal;
    private $ville;
    private $pays;


    protected static $object='adresse';
    protected static $primary='id';
    

}
