<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Brasserie
require_once File::build_path(array('model','ModelBrasserie.php')); // chargement du modèle
require_once File::build_path(array('controller','ControllerBiere.php'));

class ControllerBrasserie {

    protected static $object='brasserie';

    public static function readAll() {
        $tab_v = ModelBrasserie::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListBrasserie';
        $view='ListBrasserie';
        require File::build_path(array('view','View.php'));
    }

    public static function read() {
        $id=$_GET['id'];
        if(!$tv = ModelBrasserie::select(array('id'=>$id))){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v=$tv[0];
            $pagetitle='DetailBrasserie';
            $view='DetailBrasserie';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function create() {
        if(Session::is_admin()){
            $pagetitle='Create';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerBiere::accueil();
        }
    }

    public static function created() {
        if(Session::is_admin()){
            $data=array(
                //'id'=>$_GET['id'],
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
        }else{
            ControllerBiere::accueil();
        }
    }

    public static function update() {
        if(Session::is_admin()){
            $pagetitle='Update';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerBiere::accueil();
        }
    }

    public static function updated() {
        if(Session::is_admin()){
            $data=array(
                'id'=>$_GET['id'],
                'nom'=>$_GET['nom'],
                'adresse'=>$_GET['adresse']);
            if(!ModelBrasserie::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('view','View.php'));
            } else {
                $tv = ModelBrasserie::select(array('id'=>$_GET['id']));
                $v=$tv[0];
                $pagetitle='DetailBrasserie';
                $view='Updated';
                require File::build_path(array('view','View.php'));
            }
        }else{
            ControllerBiere::accueil();
        }
    }

    public static function delete() {
        if(Session::is_admin()){
            ModelBrasserie::delete(array('id'=>$_GET['id']));
            $tab_v = ModelBrasserie::selectAll();
            $pagetitle='ListBrasserie';
            $view='Deleted';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerBiere::accueil();
        }
    }
}
