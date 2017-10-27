<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Utilisateur
require_once File::build_path(array('Model','ModelUtilisateur.php')); // chargement du modèle

class ControllerUtilisateur {
    
    protected static $object='Utilisateur';
            
    public static function readAll() {
        $tab_v = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListUtilisateur';
        $view='ListUtilisateur';
        require File::build_path(array('View','View.php'));
    }
    
    public static function read() {
        $login=$_GET['login'];
        if(!$v = ModelUtilisateur::select($login)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('View','View.php'));
        } else {
            $pagetitle='DetailUtilisateur';
            $view='DetailUtilisateur';
            require File::build_path(array('View','View.php'));
        }   
    }
    
    public static function create() {
        $pagetitle='Create';
        $view='Update';
        require File::build_path(array('View','View.php'));
    }
    
    public static function created() {
        $data=array(
            'login'=>$_GET['login'],
            'nom'=>$_GET['nom'],
            'prenom'=>$_GET['prenom']);
        if(!ModelUtilisateur::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('View','View.php'));
        } else {
            $tab_v = ModelUtilisateur::selectAll();
            $pagetitle='ListUtilisateur';
            $view='Created';
            require File::build_path(array('View','View.php'));
        }
    }
    
    public static function update() {
        $pagetitle='Update';
        $view='Update';
        require File::build_path(array('View','View.php'));
    }
    
    public static function updated() {
        $data=array(
            'login'=>$_GET['login'],
            'nom'=>$_GET['nom'],
            'prenom'=>$_GET['prenom']);
        if(!ModelUtilisateur::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('View','View.php'));
        } else {
            $v = ModelUtilisateur::select($_GET["login"]);
            $pagetitle='DetailUtilisateur';
            $view='Updated';
            require File::build_path(array('View','View.php'));
        }
    }
    
    public static function delete() {
        ModelUtilisateur::delete($_GET['login']);
        $tab_v = ModelUtilisateur::selectAll();
        $pagetitle='ListUtilisateur';
        $view='Deleted';
        require File::build_path(array('View','View.php'));
    }
}
