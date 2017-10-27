<?php


/**
 *
 */
class ModelBiere extends Model
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var String
     */
    private $modele;

    /**
     * @var float
     */
    private $montant;

    /**
     * @var float
     */
    private $tauxAlcool;

    /**
     * @var String
     */
    private $composition;


    /**
     * @var \ModelCategorie[]
     */
    private $categories;

    /**
     * @var \ModelMarque
     */
    private $marque;



}
