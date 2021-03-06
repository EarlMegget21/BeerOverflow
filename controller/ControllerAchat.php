<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Achat
require_once File::build_path(array('model', 'ModelAchat.php')); // chargement du modèle

class ControllerAchat
{

    protected static $object = 'achat';

    public static function readAll()
    {
        $tab_v = ModelAchat::selectAll();     //appel au modèle pour gerer la BD
        //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle = 'ListAchat';
        $view = 'ListAchat';
        require File::build_path(array('view', 'View.php'));
    }

    public static function read()
    {
        $idBiere = $_GET['idBiere'];
        if (!$v = ModelAchat::select($idBiere)) {
            $pagetitle = 'Error!';
            $view = 'Error';
            require File::build_path(array('view', 'View.php'));
        } else {
            $pagetitle = 'DetailAchat';
            $view = 'DetailAchat';
            require File::build_path(array('view', 'View.php'));
        }
    }

    public static function created()
    {
        $id = $_GET['idCommande']; //on stock le GET pour aller plus vite
        $data = array(
            'idBiere' => $_GET['idBiere'],
            'idCommande' => $id,
            'quantite' => $_GET['quantite']);
        if (!ModelAchat::save($data)) { //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle = 'Error!';
            $view = 'Error';
            require File::build_path(array('view', 'View.php'));
        } else {
            $tab_a = ModelAchat::select(array('idCommande' => $id)); //on selectionne touts les achats de cette commande
            if (!$tv = ModelCommande::select(array('id' => $id))) {
                $pagetitle = 'Error!';
                $view = 'Error';
                require File::build_path(array('view', 'View.php'));
            } else {
                $v = $tv[0];
                $pagetitle = 'DetailCommande';
                $view = 'DetailCommande';
                require File::build_path(array('view', 'View.php'));
            }
        }
    }


    public static function vob()//validation of basket
    {
        ModelAchat::buy();
        $pagetitle = 'Payement Terminé';
        $view = 'Complete';
        require File::build_path(array('view', 'View.php'));
    }

    public static function delete()
    {
        $id = $_GET['idCommande'];
        ModelAchat::delete(array('idCommande' => $id, 'idBiere' => $_GET['idBiere']));
        $tab_a = ModelAchat::select(array('idCommande' => $id)); //on selectionne touts les achats de cette commande
        if (!$tv = ModelCommande::select(array('id' => $id))) {
            $pagetitle = 'Error!';
            $view = 'Error';
            require File::build_path(array('view', 'View.php'));
        } else {
            $v = $tv[0];
            $pagetitle = 'DetailCommande';
            $view = 'DetailCommande';
            require File::build_path(array('view', 'View.php'));
        }
    }
}
