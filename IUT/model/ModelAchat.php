<?php


/**
 *
 */
class ModelAchat extends Model
{

    private $idBiere;
    private $idCommande;
    private $quantite;

    protected static $object='achat';

    public function __construct($idBiere=NULL, $idCommande=NULL, $qte=NULL)
    {
        if (!is_null($idBiere) && !is_null($idCommande) && !is_null($qte)) {
            $this->idBiere = $idBiere;
            $this->idCommande = $idCommande;
            $this->quantite = $qte;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }


    public static function selectCo($commande) {
    $table_name= static::$object;
    $class_name= ucfirst($table_name);
    //$key_name=static::$primary;
    // In the query, put tags :xxx instead of variables $xxx
    $sql = "SELECT * from $class_name WHERE idCommande=:idCommande";
    try{
        // Prepare the SQL statement
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "idCommande" => $commande,
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
