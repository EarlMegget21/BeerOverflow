<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Brasserie
require_once File::build_path(array('model','ModelBrasserie.php')); // chargement du modèle

class ControllerBrasserie {
    
    protected static $object='Brasserie';
            
    public static function readAll() {
        $tab_v = ModelBrasserie::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListBrasserie';
        $view='ListBrasserie';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        $id=$_GET['id'];
        if(!$v = ModelBrasserie::select($id)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $pagetitle='DetailBrasserie';
            $view='DetailBrasserie';
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
            'adresse'=>$_GET['adresse']);
        if(!ModelBrasserie::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelBrasserie::selectAll();
            $pagetitle='ListBrasserie';
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
            'adresse'=>$_GET['adresse']);
        if(!ModelBrasserie::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v = ModelBrasserie::select($_GET["id"]);
            $pagetitle='DetailBrasserie';
            $view='Updated';
            require File::build_path(array('view','View.php'));
        }
    }
    
    public static function delete() {
        ModelBrasserie::delete(array('id'=>$_GET['id']));
        $tab_v = ModelBrasserie::selectAll();
        $pagetitle='ListBrasserie';
        $view='Deleted';
        require File::build_path(array('view','View.php'));
    }
}