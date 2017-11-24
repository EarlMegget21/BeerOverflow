<?php
require_once File::build_path(array('model','Model.php')); // chargement du modèle

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
    private $nom;

    /**
     * @var String
     */
    private $marque;

    /**
     * @var int
     */
    private $idBrasserie;

    /**
     * @var float
     */
    private $taux;

    /**
     * @var String
     */
    private $composition;

    /**
     * @var float
     */
    private $montant;


    protected static $object='biere';
    protected static $primary='id';

    public function __construct($id=NULL, $nom=NULL, $marque=NULL, $idBrasserie=NULL, $taux=NULL, $composition=NULL, $montant=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($marque) && !is_null($idBrasserie) && !is_null($taux) && !is_null($composition) && !is_null($montant)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->marque = $marque;
            $this->idBrasserie = $idBrasserie;
            $this->taux = $taux;
            $this->composition = $composition;
            $this->montant = $montant;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    public static function search($data){
        $table_name= "biere";
        $class_name= "Biere";
        $sql = "SELECT * FROM biere bi ";
        if(isset($data["nomBrasserie"])) {
            $sql = $sql . "JOIN Brasserie br ON br.id = bi.idBrasserie WHERE br.nom=:nomBrasserie AND ";
        } else{
            $sql = $sql . "WHERE ";
        }
        if(isset($data["marque"])){
            $sql=$sql."bi.marque=:marque AND ";
        }
        if(isset($data["nom"])){
            $sql=$sql."bi.nom=:nom AND ";
        }
        if(isset($data["composition"])){
            $sql = $sql . "bi.composition LIKE CONCAT('%',:composition,'%') AND "; //permet de vérifier si la chaîne rentrée est comprise dans la chaîne totale de la bdd (% = nimporte quelle chaîne de char)
        }
        if(isset($data["taux"])) {
            $sql = $sql . "bi.taux < :taux AND ";
        }
        $sql = $sql."bi.montant > :montantMin AND montant < :montantMax";
        //echo $sql;    //DEBUG
        try {
            // Prepare the SQL statement
            $req_prep = Model::$pdo->prepare($sql);

            // Execute the SQL prepared statement after replacing tags
            $req_prep->execute($data); //on associe le tableau à la requete pour éviter l'injection

            // Retrieve results as previously
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelBiere');
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
