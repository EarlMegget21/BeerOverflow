<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 01/11/2017
 * Time: 09:33
 */

class ModelIngredient
{
    private $id;
    private $nom;

    protected static $object = 'ingredient';
    protected static $primary = 'id';

    public function __construct($id = NULL, $n = NULL)
    {
        if (!is_null($id) && !is_null($n)) {
            $this->id = $id;
            $this->nom = $n;
        }
    }

    public function get($attribut)
    {
        return $this->$attribut;
    }
}