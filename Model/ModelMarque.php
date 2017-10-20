<?php


/**
 *
 */
class ModelMarque
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
    private $nom;

    /**
     * @var String
     */
    private $edition;

    /**
     * @var \ModelBrasserie
     */
    private $brasseur;

    /**
     * @var \ModelBiere[]
     */
    private $listBieres;


}
