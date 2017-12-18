<?php
require_once File::build_path(array('model','ModelClient.php')); // chargement du modèle
require_once File::build_path(array('lib','Security.php'));
require_once File::build_path(array('controller', 'ControllerBiere.php'));

class ControllerClient
{

    protected static $object = 'client';

    public static function readAll(){
        if(Session::is_admin()){
            $tab_v = ModelClient::selectAll();     //appel au modèle pour gerer la BD
            //"redirige" vers la vue (pas require_once car on peut appeler plusieur fois dans le code pour 'copier' le html à la manière d'un include en C
            $pagetitle = 'ListClient';
            $view = 'ListClient';
            require File::build_path(array('view', 'View.php'));
        } else {
            ControllerBiere::accueil();
        }
    }
    
    public static function read() {
        if(Session::is_user($_GET['login'])||Session::is_admin()){
            $login=$_GET['login'];
            if(!$tv = ModelClient::select(array('login'=>$login))){
                $pagetitle='Error!';
                $view='Error';
                require File::build_path(array('view','View.php'));
            } else {
                $v = $tv[0];
                $pagetitle = 'DetailClient';
                $view = 'DetailClient';
                require File::build_path(array('view', 'View.php'));
            }
        } else {
            ControllerBiere::accueil();
        }
    }

    public static function create() {
        $pagetitle='Create';
        $view='Update';
        require File::build_path(array('view','View.php'));
    }

    public static function created() {
        $data=array(
            'login'=>$_POST['login'],
            'nonce'=>Security::generateRandomHex(),
            'nom'=>$_POST['nom'],
            'prenom'=>$_POST['prenom'],
            'isAdmin'=>0);
        if($_POST['mdp']==$_POST['mdp2']){
            $mdp= Security::getSeed().$_POST['mdp'];
            $data['mdp']= Security::chiffrer($mdp);
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email']=$_POST['email'];
        }
        $mail="Valider email: http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=validate&controller=client&login=".$_POST['login']."&nonce=".$data['nonce'];
        mail($_POST['email'], 'ProjetBiere', $mail);
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
            ControllerBiere::accueil();
        }
    }

    public static function updated() {
        if(Session::is_user($_POST['login'])||Session::is_admin()){
            $data=array(
                'login'=>$_POST['login'],
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom']);
            if($_POST['mdp']==$_POST['mdp2']){
                $mdp= Security::getSeed().$_POST['mdp'];
                $data['mdp']= Security::chiffrer($mdp);
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email'] = $_POST['email'];
            }
            if (Session::is_admin() && isset($_POST['isAdmin'])) {
                $data['isAdmin'] = 1;
            }else{
                $data['isAdmin'] = 0;
            }
            if (!ModelClient::update($data)) { //NULL est interprété comme non vrai aussi donc soit on return true en cas de succès soit on teste si $car1->save() === false (le === check si c'est bien un boolean et si c'est false donc si c'est NULL ça ne sera pas un boolean)
                $pagetitle = 'Error!';
                $view = 'Error';
                require File::build_path(array('View', 'View.php'));
            } else {
                $tv = ModelClient::select(array('login'=>$_POST['login']));
                $v=$tv[0];
                $pagetitle='DetailClient';
                $view='Updated';
                require File::build_path(array('view','View.php'));
            }
        } else {
            ControllerBiere::accueil();
        }
    }

    public static function delete() {
        if(Session::is_user($_GET['login'])||Session::is_admin()){
            ModelClient::delete(array('login'=>$_GET['login']));
            session_unset();
            session_destroy();
            $tab_v = ModelClient::selectAll();
            $pagetitle = 'ListClient';
            $view = 'Deleted';
            require File::build_path(array('view', 'View.php'));
        } else {
            ControllerBiere::accueil();
        }
    }

    public static function connect(){
        $pagetitle = 'Connexion';
        $view = 'Connect';
        require File::build_path(array('view', 'View.php'));
    }

    public static function connected() {
        if(isset($_GET['login'])&&isset($_GET['mdp'])){
            $mdp1=Security::getSeed().$_GET['mdp'];
            $mdp= Security::chiffrer($mdp1);
            if(ModelClient::checkPassword($_GET['login'], $mdp)&&ModelClient::isValide($_GET['login'])){
                $_SESSION['login']=$_GET['login'];
                $tv = ModelClient::select(array('login'=>$_GET['login']));
                $v=$tv[0];
                if($v->isAdmin()){
                    $_SESSION['admin']=true;
                }
                ControllerBiere::accueil();
            }else{
                ControllerBiere::accueil();
            }
        }else{
            ControllerBiere::accueil();
        }
    }

    public static function deconnect(){
        $loginDeco = $_SESSION['login'];
        session_unset();
        session_destroy();
        ControllerBiere::accueil($loginDeco);
    }
    
    public static function validate(){
        if(isset($_GET['login'])){
			$login=$_GET['login'];
            $tv = ModelClient::select(array('login'=>$login));
            if(isset($_GET['nonce'])&&$tv[0]->get("nonce")==$_GET["nonce"]){
                ModelClient::validate($login);
            }
            ControllerClient::connect();
        }else{
			ControllerBiere::accueil();
		}
    }

    public static function initPanier(){
        if (!isset($_SESSION['Basket'])) {//en caché => 	idBiere 	idCommande 	quantite
            $_SESSION['Basket'] = array(
                "NomProd" => array("Marque", "Qte", "Prix", "idBiere"),
            );
        }
    }

    public static function showBasket(){
        if(isset($_SESSION['login'])) {
            $pagetitle = 'showBasket';
            $view = 'showBasket';
            ControllerClient::initPanier();
            require File::build_path(array('view', 'View.php'));
        }else{
            $pagetitle = 'Erreur';
            $view = 'Error';
            require File::build_path(array('view', 'View.php'));
        }
    }

    public static function addBasket(){
        ControllerClient::initPanier();
        $NomProd=$_GET['nom'];
        $Marque=$_GET['marque'];
        $Qte=$_GET['quantite'];
        $PrixBase=$_GET['montant'];
        $idBiere=$_GET['id'];
        $volume=$_GET['volume'];
        if($volume == 33){
            $Prix = $PrixBase * 1.2;
        }elseif($volume == 75){
            $Prix = $PrixBase * 1.5;
        }else{
            $Prix = $PrixBase;
        }
        if (isset($_SESSION['Basket'][$NomProd])) {
            $_SESSION['Basket'][$NomProd][1] += $Qte;
            $_SESSION['Basket'][$NomProd][2] += $Qte * $Prix;
        } else {
            $_SESSION['Basket'][$NomProd] = array($Marque, $Qte, $Prix * $Qte, $idBiere);
        }
        ControllerBiere::readAll(1);

    }

    public static function decrease(){
        $id=$_GET['nom'];
        if ($_SESSION['Basket'][$id][1]==1){
            unset($_SESSION['Basket'][$id]);
        }else{
            $prixunit=$_SESSION['Basket'][$id][2]/$_SESSION['Basket'][$id][1];
            $_SESSION['Basket'][$id][1]-=1;
            $_SESSION['Basket'][$id][2]-=$prixunit;
        }
        $pagetitle = 'showBasket';
        $view = 'showBasket';
        ControllerClient::initPanier();
        require File::build_path(array('view', 'View.php'));
    }
}
