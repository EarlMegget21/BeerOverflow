<?php

<<<<<<< Updated upstream:Maison/model/ModelAdresse.php

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
=======
abstract class ModelClient extends Model
{

    private $nom;
    private $prenom;
    private $id;
    private $listCommandes;
    private $adresse;
	
	
>>>>>>> Stashed changes:Model/ModelClient.php


    protected static $object='adresse';
    protected static $primary='id';
    

}
