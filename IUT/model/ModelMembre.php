<?php

class ModelMembre extends ModelClient
{

    private $login;
    private $motDePasse;
    private $numCB;

    protected static $object='membre';
    protected static $primary = 'login';


	public function __construct($log = NULL, $mdp = NULL, $cb = NULL) {
        if (!is_null($log) && !is_null($mdp) && !is_null($cb)) {
            $this->login = $log;
            $this->motDePasse = $mdp;
            $this->numCB = $cb;
        }
    }

    public function get($attribut){
        return $this->$attribut;
    }
}
