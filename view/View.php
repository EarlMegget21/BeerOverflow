<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/BeerOverflow/css/styles.css">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<header>
    <div id="head">
        <div id="logo">
            <img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/logo.png" alt="Logo" height="42" width="42">
            <p>BeerOverflow</p>
        </div>
        <form id="chercher" method="get" action="../e-commerce/index.php">
            <input type="hidden" name="action" value="searched"/>
            <input type="hidden" name="controller" value="biere"/>
            <input type="hidden" value="0" name="montantMin" id="montantMin_id"/>
            <input type="hidden" value="100" name="montantMax" id="montantMax_id"/>
            <input id="search_input" type="text" name="marque" placeholder="Chercher une Bière">
            <input id="search_button" type="image" alt="Submit" src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/loupe.png" height="15" width="15">
        </form>
        <div id="connexion">
            <div>
                <?php
                if(isset($loginDeco)) {
                    if (!is_null($loginDeco)) {
                        echo "<p>A bientôt " . $loginDeco . " !</p>";
                    }
                }else if(isset($_SESSION['login'])){
                    echo "<p>Bonjour ".$_SESSION['login']." !</p>";
                }
                echo "</div><div>";
                if(Session::is_admin()){
                    echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=readAll&controller=client">Clients</a> ';
                }
                if(isset($_SESSION['login'])){
                    echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=read&controller=client&login='.$_SESSION['login'].'">Mon Profil</a> ';
                    echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=deconnect&controller=client">Deconnexion</a>';
                }else{
                    echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?controller=client&action=connect">Connexion</a> ';
                    echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=create&controller=client">S\'inscrire</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <nav>
        <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/">Accueil</a>
        <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=main&controller=biere">Bieres</a>
        <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=readAll&controller=brasserie">Brasseries</a>
        <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=readAll&controller=categorie">Categories</a>
        <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php">A Propos</a>
        <a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php">FAQ</a>
        <?php
        if(isset($_SESSION['login'])){
            echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=showBasket&controller=client">Panier</a> ';
            echo '<a href="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=getMyCommands&controller=commande">Mes Commandes</a> ';
        }
        ?>
    </nav>
</header>
<div id="content">
    <?php
    $filepath = File::build_path(array("view", static::$object, "$view.php"));
    require $filepath;
    ?>
</div>
<footer>
    <div>
        <div>
            <h4>Questions?</h4>
            <a href="">Aide</a>
            <a href="">Suivre ma commande</a>
            <a href="">Livraison</a>
            <a href="">FAQ</a>
        </div>
        <div>
            <h4>Quoi trouver?</h4>
            <a href="">Bières</a>
            <a href="">Brasseries</a>
            <a href="">Autres</a>
        </div>
        <div>
            <h4>Plus...</h4>
            <a href="">A propos</a>
            <a href="">Nos engagements</a>
            <a href="">Charte légale</a>
        </div>
        <div>
            <h4>Nous rejoindre</h4>
            <a href="">Newsletter</a>
            <a href="">Carrière</a>
            <a href="">Investir</a>
            <a href="">Nous contacter</a>
        </div>
    </div>
    <div id="CB">
        <img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/visa.png" alt="Visa" height="12" width="22">
        <img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/mastercard.jpeg" alt="MasterCard" height="22" width="32">
        <img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/maestro.png" alt="Maestro" height="39" width="32">
        <img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/american-express.png" alt="American-express" height="24" width="32">
        <img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/paypal.jpg" alt="Paypal" height="23" width="32">
    </div>
    <div>
        <div id="foot">
            <p>Suivez nous :</p>
            <a href="https://www.facebook.com/"><img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/facebook.ico" alt="Facebook" height="22" width="22"></a>
            <a href="https://www.twitter.com/"><img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/twitter.ico" alt="Twitter" height="22" width="22"></a>
            <a href="https://www.instagram.com/"><img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/instagram.png" alt="Instagram" height="22" width="22"></a>
            <a href="https://www.linkedin.com/"><img src="http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/linkedin.png" alt="LinkedIn" height="22" width="22"></a>
        </div>
        <div id="lastfoot">
            <p>©2018 BeerOverflow</p>
            <p>Tout droit réservé</p>
        </div>
    </div>
</footer>
</body>
</html>

