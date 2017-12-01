<?php
//Ctrl+H permet de remplacer les mots par un autre Voiture->Client
require_once File::build_path(array('model','ModelClient.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));

class ControllerClient {
    
    protected static $object='client';
            
    public static function readAll() {
        $tab_v = ModelClient::selectAll();     //appel au modèle pour gerer la BD
          //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
        $pagetitle='ListClient';
        $view='ListClient';
        require File::build_path(array('view','View.php'));
    }
    
    public static function read() {
        if(Session::is_user($_GET['login'])||Session::is_admin()){
            $login=$_GET['login'];
            if(!$tv = ModelClient::select(array('login'=>$login))){
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('view','View.php'));
            } else {
                $v=$tv[0];
                $pagetitle='DetailClient';
                $view='DetailClient';
                require File::build_path(array('view','View.php'));
            }
        }else{
            ControllerClient::readAll();
        }
    }

    public static function create() {
        $pagetitle='Create';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }

    public static function created() {
        $data=array(
            'login'=>$_GET['login'],
            'nonce'=>Security::generateRandomHex(),
            'nom'=>$_GET['nom'],
            'prenom'=>$_GET['prenom'],
            'isAdmin'=>0);
        if($_GET['mdp']==$_GET['mdp2']){
            $mdp= Security::getSeed().$_GET['mdp'];
            $data['mdp']= Security::chiffrer($mdp);
        }
        if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email']=$_GET['email'];
        }
        $mail="Valider email: http://webinfo.iutmontp.univ-montp2.fr/~sonettir/ProjetBiere/index.php?action=validate&controller=client&login=".$_GET['login']."&nonce=".$data['nonce'];
        mail($_GET['email'], 'ProjetBiere', $mail);
        if(!ModelClient::save($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
            $pagetitle='Error!';
            $view='Error';
            require File::build_path(array('view','View.php'));
        } else {
            $tab_v = ModelClient::selectAll();
            $pagetitle='ListClient';
            $view='Created';
            require File::build_path(array('view','View.php'));
        }
    }

    public static function update() {
        if(Session::is_user($_GET['login'])||Session::is_admin()){
            $pagetitle='Update';
            $view='Update';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }

    public static function updated() {
        if(Session::is_user($_GET['login'])||Session::is_admin()){
            $data=array(
                'login'=>$_GET['login'],
                'nom'=>$_GET['nom'],
                'prenom'=>$_GET['prenom'],
                'isAdmin'=>0);
            if($_GET['mdp']==$_GET['mdp2']){
                $mdp= Security::getSeed().$_GET['mdp'];
                $data['mdp']= Security::chiffrer($mdp);
            }
            if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email']=$_GET['email'];
            }
            if(Session::is_admin()&&isset($_GET['isAdmin'])){
                $data['isAdmin']=1;
            }
            if(!ModelClient::update($data)){ //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('View','View.php'));
            } else {
                $tv = ModelClient::select(array('login'=>$_GET['login']));
                $v=$tv[0];
                $pagetitle='DetailClient';
                $view='Updated';
                require File::build_path(array('View','View.php'));
            }
        }else{
            ControllerClient::readAll();
        }
    }

    public static function delete() {
        if(Session::is_user($_GET['login'])||Session::is_admin()){
            ModelClient::delete(array('login'=>$_GET['login']));
            $tab_v = ModelClient::selectAll();
            $pagetitle='ListClient';
            $view='Deleted';
            require File::build_path(array('view','View.php'));
        }else{
            ControllerClient::readAll();
        }
    }

    public static function connect() {
        $pagetitle='Connexion';
        $view='Connect';
        require File::build_path(array('View','View.php'));
    }

    public static function connected() {
        $mdp1=Security::getSeed().$_GET['mdp'];
        $mdp= Security::chiffrer($mdp1);
        if(isset($_GET['login'])&&isset($_GET['mdp'])){
            if(ModelClient::checkPassword($_GET['login'], $mdp)&&ModelClient::isVallogine($_GET['login'])){
                $_SESSION['login']=$_GET['login'];
                $tv = ModelClient::select(array('login'=>$_GET['login']));
                $v=$tv[0];
                if($v->isAdmin()){
                    $_SESSION['admin']=true;
                }
                $pagetitle='DetailClient';
                $view='DetailClient';
                require File::build_path(array('View','View.php'));
            }else{
                ControllerClient::readAll();
            }
        }

    }

    public static function deconnect() {
        session_unset();
        session_destroy();
        ControllerClient::readAll();
    }
    
    public static function valloginate() {
        if(isset($_GET['login'])){
            $v = ModelClient::select($_GET["login"]);
            if(isset($_GET['nonce'])&&$v->getNonce()==$_GET["nonce"]){
                ModelClient::valloginate($_GET["login"]);
            }
        }
    }
}
