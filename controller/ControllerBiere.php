<?php
require_once File::build_path(array('model','ModelBiere.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));

class ControllerBiere {

    protected static $object='biere';

    public static function main(){  //Affiche 2 liens: recherche ou liste de toutes les bières
        $pagetitle='Bieres';
        $view='Main';
        require File::build_path(array('view','View.php'));
    }

    public static function search(){
        $pagetitle='Recherche Bières';
        $view='Search';
        require File::build_path(array('view','View.php'));
    }

    public static function searched(){
        $data = array();
        if(!empty($_GET["marque"])) {   //empty test si la variable a une valeur (donc si l'utilisateur a rentré une valeur dans le form)
            $data["marque"] = $_GET["marque"];
        }
        if(!empty($_GET["nom"])) {
            $data["nom"] = $_GET["nom"];
        }
        if(!empty($_GET["nomBrasserie"])) {
            $data["nomBrasserie"] = $_GET["nomBrasserie"];
        }
        if(!empty($_GET["taux"])) {
            $data["taux"] = $_GET["taux"];
        }
        if(!empty($_GET["composition"])) {
            $data["composition"] = $_GET["composition"];
        }
        $data["montantMin"] = $_GET["montantMin"];
        $data["montantMax"] = $_GET["montantMax"];
        //var_dump($data);    //DEBUG
        if(!ModelBiere::search($data)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelBiere::search($data);
            $pagetitle='Résultat Recherche';
            $view='ListBiere';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function readAll() {
        $tab_v = ModelBiere::selectAll();     //appel au modèle pour gerer la BD
        //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListBiere';
        $view='ListBiere';
        require File::build_path(array('view','View.php'));
    }

    public static function read() { //affiche les détailles de la bière et ses catégories
        $id=$_GET['id']; //on stock le GET pour aller plus vite
        $tab_c = ModelCateBiere::select(array('idBiere'=>$id)); //on selectionne toutes les catégories de cette bière dans un tableau
        if(!$tv = ModelBiere::select(array('id'=>$id))){ //on selectionne la bière en question dans un tableau, si ça renvoie faux on affiche la page not found
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $v=$tv[0]; //on récupère la bière grâce au tableau
            $pagetitle='DetailBiere';
            $view='DetailBiere';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function create() {
        if(Session::is_user($_GET['id'])||Session::is_admin()){
            $pagetitle='Create';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }

    public static function created() {
        if(Session::is_user($_GET['id'])||Session::is_admin()){
            $data=array( //pas besoin de rentrer l'id lors de la création d'une bière, il s'incrémente tout seul sur MySQL lors de la création d'un tuple
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
        }else{
            ControllerClient::readAll();
        }
    }

    public static function update() {
        if(Session::is_user($_GET['id'])||Session::is_admin()){
            $pagetitle='Update';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }

    public static function updated() {
        if(Session::is_user($_GET['id'])||Session::is_admin()){
            $data=array(
                'id'=>$_GET['id'], //lors de la modification d'une bière, on a besoin de l'id pour mettre dans le WHERE
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
                $id=$_GET['id']; //on stock le GET pour aller plus vite
                $tab_c = ModelCateBiere::select(array('idBiere'=>$id)); //on selectionne toutes les caté de cette bière dans un tableau
                $tv = ModelBiere::select(array('id'=>$id)); //on selectionne la biere dans un tableau
                $v=$tv[0]; //on récupère la biere grâce au tableau
                $pagetitle='DetailBiere';
                $view='Updated';
                require File::build_path(array('view','View.php'));
            }
        }else{
            ControllerClient::readAll();
        }
    }

    public static function delete() {
        if(Session::is_user($_GET['id'])||Session::is_admin()){
            ModelBiere::delete(array('id'=>$_GET['id']));
            $tab_v = ModelBiere::selectAll();
            $pagetitle='ListBiere';
            $view='Deleted';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }
    
    public static function error() {
        $pagetitle='Error!';
        $view='Error';
        require File::build_path(array('view','View.php'));
    }
}
