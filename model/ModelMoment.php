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
    private $jour;

    /**
     * @var int
     */
    private $mois;

    /**
     * @var int
     */
    private $annee;

    /**
     * @var int
     */
    private $heure;

    /**
     * @var int
     */
    private $minute;


    protected static $object='moment';
    protected static $primary='id';

}
