<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Commande
require_once File::build_path(array('model','ModelCommande.php')); // chargement du modèle
require_once File::build_path(array('model', 'ModelAchat.php'));
require_once File::build_path(array('model', 'ModelBiere.php'));

class ControllerCommande {
    
    protected static $object='commande';
            
    public static function readAll() {
        $tab_v = ModelCommande::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListCommande';
        $view='ListCommande';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        $id=$_GET['id'];
        $tab_a = ModelAchat::getMyPurchases($id);   //Récupère un tableau avec le nom, la marque et la quantité de chaque produit de la commande
        if(!$tv = ModelCommande::select(array('id'=>$id))){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $c=$tv[0];
            $pagetitle='DetailCommande';
            $view='DetailCommande';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function create() {
        $pagetitle='Create';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }

    public static function created() {

        $data=array( //pas besoin de récupérer l'id pour la création car il s'incrémente tout seul sur mySQL
            'livraison'=>0,
            'date'=>$_GET['date'],
            'idClient'=>$_GET['idClient']);
        if(isset($_GET['livraison'])){
            //dans mySQL les booleans sont 0 ou 1 alors on lui affecte 1 si la checkbox et coché 0 sinon
            $data['livraison'] = 1;
        }
        if(!ModelCommande::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelCommande::selectAll();
            $pagetitle='ListCommande';
            $view='Created';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function update() {
        $pagetitle='Update';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }

    public static function updated() {
        $data=array(
            'id'=>$_GET['id'],
            'livraison'=>0,
            'date'=>$_GET['date'],
            'idClient'=>$_GET['idClient']);
        if(isset($_GET['livraison'])){
            //dans mySQL les booleans sont 0 ou 1 alors on lui affecte 1 si la checkbox et coché 0 sinon
            $data['livraison'] = 1;
        }
        if(!ModelCommande::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $id=$_GET['id'];
            $tab_a = ModelAchat::select(array('idCommande'=>$id)); //on selectionne touts les achats de cette commande
            $tv = ModelCommande::select(array('id'=>$id));
            $v=$tv[0];
            $pagetitle='DetailCommande';
            $view='Updated';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function delete() {
        ModelCommande::delete(array('id'=>$_GET['id']));
        $tab_v = ModelCommande::selectAll();
        $pagetitle='ListCommande';
        $view='Deleted';
        require File::build_path(array('view','View.php'));
    }

    public static function seeMyCommands(){
        $tab_c = ModelCommande::getMyCommands($_SESSION['id']);
        if(is_empty($tab_c)){
            $pagetitle = 'Error !';
            $view = "Error";
        } else {
            //$tab_a = ModelAchat::getMyPurchase($_SESSION['id']);
            $pagetitle = 'Mes commandes';
            $view = 'ListCommande';
        }
        require_once File::build_path(array('view', 'View.php'));
    }
}
