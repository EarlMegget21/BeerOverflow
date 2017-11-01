<?php

require_once File::build_path(array('Model','Model.php'));

class ModelDate extends Model
{
    
    /**
     * @var int
     */
    private $id;
    private $jour;
    private $mois;
    private $annee;
    private $heure;
    private $minute;
	
	public function __construct($j = NULL, $m = NULL, $a = NULL, $h = NULL, $min = NULL) {
        if (!is_null($j) && !is_null($m) && !is_null($a) && !is_null($h) && !is_null($min)) {
            $this->jour = $j;
            $this->mois = $m;
            $this->annee = $a;
			$this->heure = $h;
			$this->minute = $min;
        }
    }

    protected static $object='moment';
    protected static $primary='id';

}
