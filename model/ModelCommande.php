<?php


/**
 *
 */
class ModelCommande extends Model
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var boolean
     */
    private $livraison;

    /**
     * @var int
     */
    private $login;

    /**
     * @var String
     */
    private $date;
    
    
    protected static $object='commande';
    protected static $primary='id';

    public function __construct($id=NULL, $livraison=false, $login=NULL, $date=NULL)
    {
        if (!is_null($id) && !is_null($login) && !is_null($date)) {
            $this->id = $id;
            $this->livraison = $livraison;
            $this->login = $login;
            $this->date = $date;
        }
    }

    // getter
    public function get($attribut){
        return $this->$attribut;
    }

    /**
     * @return float
     */
    public function calculerTotal()    {
        // TODO: implement here
        return 0.0;
    }

    public function getMyCommands($id){
        $sql = "SELECT * FROM Commande WHERE idClient = :idClient";
        try{
            $data = array(
              "idClient" => $id,
            );
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
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
