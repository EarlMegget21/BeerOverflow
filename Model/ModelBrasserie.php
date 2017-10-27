<?php


/**
 *
 */
class ModelBrasserie extends Model
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
     * @var \ModelAdresse
     */
    private $adresse;

    /**
     * @var \ModelMarque[]
     */
    private $listMarques;


}
