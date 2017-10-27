<?php
require_once File::build_path(array('Model','ModelVoiture.php')); // chargement du modèle
class ControllerVoiture {
    
    protected static $object='Voiture';
    
    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListVoiture';
        $view='ListVoiture';
        require File::build_path(array('View','View.php'));
    }
    public static function read() {
        $immat=$_GET['immatriculation'];
        if(!$v = ModelVoiture::select($immat)){
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('View','View.php'));
        } else {
            $pagetitle='DetailVoiture';
            $view='DetailVoiture';
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
            'immatriculation'=>$_GET['immatriculation'],
            'marque'=>$_GET['marque'],
            'couleur'=>$_GET['couleur']);
        if(!ModelVoiture::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('View','View.php'));
        } else {
            $tab_v = ModelVoiture::selectAll();
            $pagetitle='ListVoiture';
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
           'immatriculation'=>$_GET['immatriculation'],
            'marque'=>$_GET['marque'],
            'couleur'=>$_GET['couleur']);
        if(!ModelVoiture::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('View','View.php'));
        } else {
            $v = ModelVoiture::select($_GET["immatriculation"]);
            $pagetitle='DetailVoiture';
            $view='Updated';
            require File::build_path(array('View','View.php'));
        }
    }
    public static function delete() {
        ModelVoiture::delete($_GET['immatriculation']);
        $tab_v = ModelVoiture::selectAll();
        $pagetitle='ListVoiture';
        $view='Deleted';
        require File::build_path(array('View','View.php'));
    }
}




//$rep=Model::$pdo->query('SELECT * FROM Voiture');
//$tab_obj=$rep->fetchAll(PDO::FETCH_OBJ); //créer tableau d'objets avec attributs d'objets=attributs de table
//$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture'); //permet de créer une classe dans le même principe qu'au dessus mais on peut la renommer et définir des méthodes etc
//$tab_voit=$rep->fetchAll(PDO::FETCH_CLASS, 'ModelVoiture'); //si on met la ligne du dessus, on appel fetchAll sans paramêtres
//foreach (ModelVoiture::selectAll() as $key => $value) {
////    echo $value->marque.$value->immatriculation.$value->couleur;
//    echo $value->display();
//}
//echo Voiture::select('21XYZ34')->display();
//$lambo=new ModelVoiture('Lambo', 'jaune', 'XXXXX2');
//$lambo->save();
//echo ModelVoiture::select('XXXXX2')->display();