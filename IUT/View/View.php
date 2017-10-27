<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <nav>
                <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/PHP/TD2/index.php">Accueil</a>
                <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/PHP/TD2/index.php?action=readAll&controller=utilisateur">Utilisateurs</a>
                <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/PHP/TD2/index.php?action=readAll&controller=voyage">Voyages</a>
            </nav>
        </header>
<?php
// Si static::$object='Voiture' et $view='ListVoiture',
// alors $filepath="/chemin_du_site/View/Voiture/ListVoiture.php"
$filepath = File::build_path(array("View", static::$object, "$view.php"));
require $filepath;
?>
        <footer>
            <p style="border: 1px solid black;text-align:right;padding-right:1em;">Copyright</p>
        </footer>
    </body>
</html>

