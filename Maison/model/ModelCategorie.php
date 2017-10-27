<?php


/**
 *
 */
class ModelCategorie extends Model
{

    /**
     * @var int
     */
    private $id;
    
    /**
     * @var String
     */
    private $nom;

    /**
     * @var String
     */
    private $specifications;

    /**
     * @var \ModelBiere[]
     */
    private $listBieres;
    
    
    protected static $object='categorie';
    protected static $primary='id';

}
