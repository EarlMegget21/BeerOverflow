<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/styles.css">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <nav>
                <a href="http://localhost/projetbiere/">Accueil</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=client">Clients</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=commande">Commandes</a>
                <a href="http://localhost/projetbiere/index.php?action=main&controller=biere">Bieres</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=brasserie">Brasseries</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=categorie">Categories</a>
                <?php if(isset($_SESSION['id'])){
                    echo '<a href="http://localhost/projetbiere/index.php?action=deconnect&controller=utilisateur">Deconnexion</a>';
                }else{
                    echo '<a href="http://localhost/projetbiere/view/Connect.php">Connexion</a>';
                }?>
            </nav>
        </header>
<?php
// Si static::$object='Voiture' et $view='ListVoiture',
// alors $filepath="/chemin_du_site/View/Voiture/ListBiere.php"
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>
        <footer>
            <p style="border: 1px solid black;text-align:right;padding-right:1em;">Copyright</p>
        </footer>
    </body>
</html>

