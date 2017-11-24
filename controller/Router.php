<?php

/*require_once File::build_path(array('controller','controllerClient.php'));
require_once File::build_path(array('controller','controllerCommande.php'));
require_once File::build_path(array('controller','controllerAchat.php'));
require_once File::build_path(array('controller','controllerBiere.php'));
require_once File::build_path(array('controller','controllerCategorie.php'));
require_once File::build_path(array('controller','controllerBrasserie.php'));
require_once File::build_path(array('controller','controllerCateBiere.php'));*/

if(array_key_exists("controller", $_GET)){ //arrat_key_exists test si la clé controller existe dans le tableau $_GET
    $controller = $_GET["controller"];    
}else{
    $controller = 'biere';
}

$controller_class = 'controller'.ucfirst($controller); //ucfirst transforme une chaine en capitalisant sa première lettre

if(class_exists($controller_class)){
    if(array_key_exists("action", $_GET)){
        $action = $_GET["action"];
        $actions=get_class_methods($controller_class);
        $valide=false;
        foreach ($actions as $act){
            if($action==$act){
                $valide=true;
                break;
            }
        }
        if($valide){
           //Si aucune action dans l'URL alors readAll
           $controller_class::$action();
        }else{
           $pagetitle='Error!';
           $view='Error';
           require File::build_path(array('view','View.php'));
       }
    }else{
        // Appel de la méthode statique $action du controller specifié
        $controller_class::readAll();//remplacera $action() par readAll() lorsque ?action=readAll dans l'URL
    }
}else{
    $pagetitle='Error!';
    $view='Error';
    require File::build_path(array('view','View.php'));
}