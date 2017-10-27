<?php


/**
 *
 */
class ModelMoment extends Model
{
    
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $biere;
    /**
     * @var int
     */
    private $qte;
    /**
     * @var int
     */
    private $commande;


    protected static $object='achat';
    protected static $primary='id';

}
