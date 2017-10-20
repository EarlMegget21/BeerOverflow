<?php


/**
 *
 */
class ModelBiere
{
    /**
     *
     */
    public function __construct()
    {
    }

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
     * @var \ModelMarque
     */
    private $marque;

    /**
     * @var \ModelCategorie[]
     */
    private $categories;


}
