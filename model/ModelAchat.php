<?php


/**
 *
 */
class ModelAchat extends Model
{
    /**
     * @var int
     */
    private $idBiere;

    /**
     * @var int
     */
    private $idCommande;

    /**
     * @var int
     */
    private $quantite;



    protected static $object='achat';
    //protected static $primary='id';

    /**
     * ModelAchat constructor.
     * @param int $idBiere
     * @param int $idCommande
     * @param int $qte
     */
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

    public static function getMyPurchases($id){
        $sql = "SELECT a.quantite, b.marque, b.nom FROM achat a, biere b WHERE a.idBiere = b.id AND a.idCommande = :id";
        try{
            // Prepare the SQL statement
            $req_prep = Model::$pdo->prepare($sql);


            $values = array(
                "id" => $id,
            );

            $req_prep->execute($values); //on associe le tableau à la requete pour éviter l'injection

            // Retrieve results as previously
            $tab = $req_prep->fetchAll(PDO::FETCH_ASSOC);
            // Careful: you should handle the special case of no results
            //var_dump($tab); //DEBUG
            if (empty($tab))
                return false;
            return $tab; //on retourne un tableau car pour les tables à plusieurs clés primaire, si on en met qu'une dans le WHERE, ça peut renvoyer plusieurs tuples
        } catch(PDOException $e){
            echo $e->getMessage(); // affiche un message d'erreur
            die(); //supprimer equilvalent à System.exit(1); en java
        }
    }

}
