<?php
require_once File::build_path(array('model','ModelBiere.php')); // chargement du modèle

class ControllerBiere {
    
    protected static $object='Biere';
    
    public static function readAll() {
        $tab_v = ModelBiere::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListBiere';
        $view='ListBiere';
        require File::build_path(array('view','View.php'));
    }
    public static function read() {
        $id=$_GET['id'];
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
    public static function create() {
        $pagetitle='Create';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }
    public static function created() {
        $data=array(
            'id'=>$_GET['id'],
            'nom'=>$_GET['nom'],
            'taux'=>$_GET['taux'],
            'composition'=>$_GET['composition'],
            'montant'=>$_GET['montant'],
            'marque'=>$_GET['marque'],
            'idBrasserie'=>$_GET['idBrasserie']);
        if(!ModelBiere::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelBiere::selectAll();
            $pagetitle='ListBiere';
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
            'taux'=>$_GET['taux'],
            'composition'=>$_GET['taux'],
            'montant'=>$_GET['montant'],
            'marque'=>$_GET['marque'],
            'idBrasserie'=>$_GET['idBrasserie']);
        if(!ModelBiere::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v = ModelBiere::select($_GET["id"]);
            $pagetitle='DetailBiere';
            $view='Updated';
            require File::build_path(array('view','View.php'));
        }
    }
    public static function delete() {
        ModelBiere::delete(array('id'=>$_GET['id']));
        $tab_v = ModelBiere::selectAll();
        $pagetitle='ListBiere';
        $view='Deleted';
        require File::build_path(array('view','View.php'));
    }
}