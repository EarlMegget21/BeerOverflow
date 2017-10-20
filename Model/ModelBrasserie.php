<?php


/**
 *
 */
class ModelBrasserie
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
     * @var \ModelMarque[]
     */
    private $listMarques;

    /**
     * @var \ModelAdresse
     */
    private $adresse;

}
