<?php


/**
 *
 */
class ModelAdministrateur extends ModelClient
{

    private $login;
    private $motDePasse;

    protected static $object='administrateur';

    public function __construct($login=NULL, $mdp=NULL)
    {
        if (!is_null($login) && !is_null($mdp)) {
            $this->login = $login;
            $this->motDePasse = $mdp;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }
   

}
