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
     * @var String
     */
    private $adresse;
    
    
    protected static $object='brasserie';
    protected static $primary='id';

    // a constructor
    public function __construct($i = NULL, $n = NULL, $a = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($a)) {
            $this->id = $i;
            $this->nom = $n;
            $this->adresse = $a;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    public static function search($data){
        $table_name= "brasserie";
        $class_name= "Brasserie";
        $sql = "SELECT * FROM brasserie WHERE ";
        if(isset($data["nom"])){
            $sql=$sql."nom LIKE CONCAT('%', :nom, '%') AND ";
        }
        if(isset($data["adresse"])){
            $sql = $sql . "adresse LIKE CONCAT('%',:adresse,'%')"; //permet de vérifier si la chaîne rentrée est comprise dans la chaîne totale de la bdd (% = nimporte quelle chaîne de char)
        }
        $sql=rtrim($sql,"AND "); //on supprime le dernier AND
        //echo $sql;    //DEBUG
        try {
            // Prepare the SQL statement
            $req_prep = Model::$pdo->prepare($sql);

            // Execute the SQL prepared statement after replacing tags
            $req_prep->execute($data); //on associe le tableau à la requete pour éviter l'injection

            // Retrieve results as previously
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelBrasserie');
            $tab = $req_prep->fetchAll();
            if (empty($tab)) {
                return false;
            }
            return $tab; //on retourne un tableau car pour les tables à plusieurs clés primaire, si on en met qu'une dans le WHERE, ça peut renvoyer plusieurs tuples
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            die(); //supprimer equilvalent à System.exit(1); en java
        }


    }

}
