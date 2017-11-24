<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->CateBiere
require_once File::build_path(array('model','ModelCateBiere.php')); // chargement du modèle

class ControllerCateBiere {
    
    protected static $object='biere';
            
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
    
    /*public static function create() {
        $pagetitle='Create';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }*/
    
    public static function created() {
        $id=$_GET['idBiere']; //on stock le GET pour aller plus vite
        $data=array(
            'idBiere'=>$id,
            'idCategorie'=>$_GET['idCategorie']);
        if(!ModelCateBiere::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_c = ModelCateBiere::select(array('idBiere'=>$id)); //on selectionne toutes les caté de cette bière dans un tableau
            if(!$tv = ModelBiere::select(array('id'=>$id))){ //on selectionne la biere dans un tableau
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('view','View.php'));
            } else {
                $v=$tv[0]; //on récupere la biere grace au tableau
                $pagetitle='DetailBiere';
                $view='DetailBiere';
                require File::build_path(array('view','View.php'));
            }
        }
    }
    
    /*public static function update() {
        $pagetitle='Update';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }*/
    
    /*public static function updated() {
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
    }*/
    
    public static function delete() { //lors de la suppression d'une categorie associée à une biere, on reaffiche les details de la biere
        $id=$_GET['idBiere']; //on stock le GET pour aller plus vite
        ModelCateBiere::delete(array('idBiere'=>$id,'idCategorie'=>$_GET['idCategorie'])); //on supprime la categorie assossiée à la bière
        $tab_c = ModelCateBiere::select(array('idBiere'=>$id)); //on selectionne toutes les caté de cette bière dans un tableau
        if(!$tv = ModelBiere::select(array('id'=>$id))){ //on selectionne la biere dans un tableau
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v=$tv[0]; //on récupere la biere grace au tableau
            $pagetitle='DetailBiere';
            $view='DetailBiere';
            require File::build_path(array('view','View.php'));
        }
    }
}
