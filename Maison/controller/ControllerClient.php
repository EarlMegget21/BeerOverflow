<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Client
require_once File::build_path(array('model','ModelClient.php')); // chargement du modèle

class ControllerClient {
    
    protected static $object='Client';
            
    public static function readAll() {
        $tab_v = ModelClient::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListClient';
        $view='ListClient';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        $id=$_GET['id'];
        if(!$v = ModelClient::select($id)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $pagetitle='DetailClient';
            $view='DetailClient';
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
            'nom'=>$_GET['nom'],
            'prenom'=>$_GET['prenom']);
        if(!ModelClient::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelClient::selectAll();
            $pagetitle='ListClient';
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
            'nom'=>$_GET['nom'],
            'prenom'=>$_GET['prenom']);
        if(!ModelClient::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v = ModelClient::select($_GET["id"]);
            $pagetitle='DetailClient';
            $view='Updated';
            require File::build_path(array('view','View.php'));
        }
    }
    
    public static function delete() {
        ModelClient::delete(array('id'=>$_GET['id']));
        $tab_v = ModelClient::selectAll();
        $pagetitle='ListClient';
        $view='Deleted';
        require File::build_path(array('view','View.php'));
    }
}
