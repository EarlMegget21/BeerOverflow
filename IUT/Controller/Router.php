<?php

//Le router est un peu le main qui exécute les fonctions des controllers(utilisent le php en écriture et effectuent des traitements) qui eux jouent avec la BD via Model
//et avec la page à afficher via View(utilise du php uniquement en lecture)
require_once File::build_path(array('Controller','ControllerVoiture.php'));
require_once File::build_path(array('Controller','ControllerUtilisateur.php'));
// On recupère l'action passée dans l'URL

if(array_key_exists("controller", $_GET)){ //arrat_key_exists test si la clé controller existe dans le tableau $_GET
    $controller = $_GET["controller"];    
}else{
    $controller = 'voiture';
}

$controller_class = 'Controller'.ucfirst($controller); //ucfirst transforme une chaine en capitalisant sa première lettre

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
           require File::build_path(array('View','View.php'));
       }
    }else{
        // Appel de la méthode statique $action du controller specifié
        $controller_class::readAll();//remplacera $action() par readAll() lorsque ?action=readAll dans l'URL
    }
}else{
    $pagetitle='Error!';
    $view='Error';
    require File::build_path(array('View','View.php'));
}