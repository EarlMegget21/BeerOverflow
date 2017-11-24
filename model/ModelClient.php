<?php
require_once File::build_path(array('model','Model.php'));

class ModelClient extends Model
{
    private $id;
    private $mdp;
    private $nom;
    private $prenom;
    private $isAdmin;
    private $email;
    private $nonce;
    protected static $object='client';
    protected static $primary='id';

    public function __construct($id=NULL, $nom=NULL, $prenom=NULL, $mdp=NULL, $isAdmin=NULL, $email=NULL, $nonce=NULL)
    {
        if (!is_null($id) && !is_null($nom) && !is_null($prenom) && !is_null($mdp) && !is_null($isAdmin) && !is_null($email) && !is_null($nonce)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp = $mdp;
            $this->isAdmin = $isAdmin;
            $this->email = $email;
            $this->nonce = $nonce;
        }
    }


    // getter
    public function get($attribut){
        return $this->$attribut;
    }
    
    
    public static function checkPassword($id,$mot_de_passe_chiffre){
        $sql='SELECT * FROM Client WHERE id=\''.$id.'\'';
        try{
            $rep=Model::$pdo->query($sql);
            $tab=$rep->fetchAll(PDO::FETCH_CLASS, 'ModelClient');
            if (empty($tab)|| $tab[0]->get("mdp")!=$mot_de_passe_chiffre){
                return false;
            }else{
                return true;
            } 
        } catch(PDOException $e){
           echo $e->getMessage(); // affiche un message d'erreur
           die(); //supprimer equilvalent à System.exit(1); en java
        }
    }
    
    public static function isValide($id){
        $sql='SELECT count(nonce) FROM Client WHERE id=\''.$id.'\' AND nonce is not null';
        try{
            $rep=Model::$pdo->query($sql);
            $tab=$rep->fetch();
            if (!empty($tab)&&$tab[0]){
                return false;
            }else{
                return true;
            } 
        } catch(PDOException $e){
           echo $e->getMessage(); // affiche un message d'erreur
           die(); //supprimer equilvalent à System.exit(1); en java
        }
    }
    
    public static function validate($id){
        $sql='UPDATE Client SET nonce=NULL WHERE id=:id';
        try{
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "id" => $id
            );
            $req_prep->execute($values);
            return true;
             
        } catch(PDOException $e){
           echo $e->getMessage(); // affiche un message d'erreur
           return false;
        }
    }

}
