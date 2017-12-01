<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Categorie
require_once File::build_path(array('model','ModelCategorie.php')); // chargement du modèle

class ControllerCategorie {
    
    protected static $object='categorie';
            
    public static function readAll() {
        $tab_v = ModelCategorie::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListCategorie';
        $view='ListCategorie';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        $id=$_GET['id'];
        if(!$tv = ModelCategorie::select(array('id'=>$id))){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v=$tv[0];
            $pagetitle='DetailCategorie';
            $view='DetailCategorie';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function create() {
        if(Session::is_admin()){
            $pagetitle='Create';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }

    public static function created() {
        if(Session::is_admin()){
            $data=array(
                //'id'=>$_GET['id'],
                'nom'=>$_GET['nom'],
                'specifications'=>$_GET['specifications']);
            if(!ModelCategorie::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('view','View.php'));
            } else {
                $tab_v = ModelCategorie::selectAll();
                $pagetitle='ListCategorie';
                $view='Created';
                require File::build_path(array('view','View.php'));
            }
        }else{
            ControllerClient::readAll();
        }
    }

    public static function update() {
        if(Session::is_admin()){
            $pagetitle='Update';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }

    public static function updated() {
        if(Session::is_admin()){
            $data=array(
                'id'=>$_GET['id'],
                'nom'=>$_GET['nom'],
                'specifications'=>$_GET['specifications']);
            if(!ModelCategorie::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('view','View.php'));
            } else {
                $tv = ModelCategorie::select(array('id'=>$_GET["id"]));
                $v=$tv[0];
                $pagetitle='DetailCategorie';
                $view='Updated';
                require File::build_path(array('view','View.php'));
            }
        }else{
            ControllerClient::readAll();
        }
    }

    public static function delete() {
        if(Session::is_admin()){
            ModelCategorie::delete(array('id'=>$_GET['id']));
            $tab_v = ModelCategorie::selectAll();
            $pagetitle='ListCategorie';
            $view='Deleted';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }
}
