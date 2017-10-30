<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->CateBiere
require_once File::build_path(array('model','ModelCateBiere.php')); // chargement du modèle

class ControllerCateBiere {
    
    protected static $object='Biere';
            
    public static function readAll() {
        $tab_v = ModelCateBiere::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListCateBiere';
        $view='ListCateBiere';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        $idBiere=$_GET['idBiere'];
        if(!$v = ModelCateBiere::select($idBiere)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $pagetitle='DetailCateBiere';
            $view='DetailCateBiere';
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
            'idBiere'=>$_GET['idBiere'],
            'idCategorie'=>$_GET['idCategorie']);
        if(!ModelCateBiere::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelCateBiere::selectAll();
            $pagetitle='ListCateBiere';
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
            'idBiere'=>$_GET['idBiere'],
            'idCategorie'=>$_GET['idCategorie']);
        if(!ModelCateBiere::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v = ModelCateBiere::select($_GET["idBiere"]);
            $pagetitle='DetailCateBiere';
            $view='Updated';
            require File::build_path(array('view','View.php'));
        }
    }
    
    public static function delete() {
        $id=$_GET['idBiere'];
        ModelCateBiere::delete(array('idBiere'=>$id,'idCategorie'=>$_GET['idCategorie']));
        $tab_c = ModelCateBiere::selectBi($id);
        if(!$v = ModelBiere::select($id)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $pagetitle='DetailBiere';
            $view='DetailBiere';
            require File::build_path(array('view','View.php'));
        }
    }
}
