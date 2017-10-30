<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Commande
require_once File::build_path(array('model','ModelCommande.php')); // chargement du modèle

class ControllerCommande {
    
    protected static $object='Commande';
            
    public static function readAll() {
        $tab_v = ModelCommande::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListCommande';
        $view='ListCommande';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        $id=$_GET['id'];
        $tab_a = ModelAchat::selectCo($id);
        if(!$v = ModelCommande::select($id)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
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
        $data=array(
            'id'=>$_GET['id'],
            'livraison'=>$_GET['livraison'],
            'date'=>$_GET['date'],
            'idClient'=>$_GET['idClient']);
        if(isset($_GET['livraison'])){
            //livraison is checked and value = 1
            $data['livraison'] = 1;
        }else{
            //livraison is nog checked and value=0
            $data['livraison'] = 0;
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
            'livraison'=>$_GET['livraison'],
            'date'=>$_GET['date'],
            'idClient'=>$_GET['idClient']);
        if(!ModelCommande::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v = ModelCommande::select($_GET["id"]);
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
}
