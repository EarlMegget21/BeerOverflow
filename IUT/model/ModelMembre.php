<?php

class ModelMembre extends ModelClient
{

    private $login;
    private $motDePasse;
    private $numCB;

    protected static $object='membre';


	public function __construct($p = NULL, $mdp = NULL, $cb = NULL) {
        if (!is_null($p) && !is_null($mdp) && !is_null($cb)) {
            $this->pseudo = $p;
            $this->motDePasse = $mdp;
            $this->numCB = $cb;
        }
    }
}
