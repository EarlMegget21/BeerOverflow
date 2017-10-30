<?php


/**
 *
 */
class ModelCateBiere extends Model
{

    /**
     * @var int
     */
    private $idBiere;

    /**
     * @var int
     */
    private $idCategorie;


    protected static $object='catebiere';
    //protected static $primary='id';

    /**
     * ModelCateBiere constructor.
     * @param int $idBiere
     * @param int $idCategorie
     */
    public function __construct($idBiere=NULL, $idCategorie=NULL)
    {
        if (!is_null($idBiere) && !is_null($idCategorie)) {
            $this->idBiere = $idBiere;
            $this->idCategorie = $idCategorie;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }


    public static function selectCa($categorie) {
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        //$key_name=static::$primary;
        // In the query, put tags :xxx instead of variables $xxx
        $sql = "SELECT * from $class_name WHERE idCategorie=:idCategorie";
        try{
            // Prepare the SQL statement
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "idCategorie" => $categorie,
                //nomdutag => valeur, ...
            );
            // Execute the SQL prepared statement after replacing tags
            // with the values given in $values
            $req_prep->execute($values);

            // Retrieve results as previously
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.$class_name);
            $tab = $req_prep->fetchAll();
            // Careful: you should handle the special case of no results
            if (empty($tab))
                return false;
            return $tab;
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            die(); //supprimer equilvalent à System.exit(1); en java
        }
    }


    public static function selectBi($biere) {
        $table_name= static::$object;
        $class_name= ucfirst($table_name);
        //$key_name=static::$primary;
        // In the query, put tags :xxx instead of variables $xxx
        $sql = "SELECT * from $class_name WHERE idBiere=:idBiere";
        try{
            // Prepare the SQL statement
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "idBiere" => $biere,
                //nomdutag => valeur, ...
            );
            // Execute the SQL prepared statement after replacing tags
            // with the values given in $values
            $req_prep->execute($values);

            // Retrieve results as previously
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.$class_name);
            $tab = $req_prep->fetchAll();
            // Careful: you should handle the special case of no results
            if (empty($tab))
                return false;
            return $tab;
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            die(); //supprimer equilvalent à System.exit(1); en java
        }
    }
}
