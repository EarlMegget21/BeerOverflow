<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" type="text/css" href="/ProjetBiere/css/styles.css"> -->
        <style>

        </style>
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <div id="head">
                <div id="logo">
                    <img src="/ProjetBiere/img/logo.png" alt="Facebook" height="42" width="42">
                    <p>BeerOverflow</p>
                </div>
                <form id="chercher" method="get" action="../ProjetBiere/index.php">
                    <input type="hidden" name="action" value="searched"/>
                    <input type="hidden" name="controller" value="biere"/>
                    <input id="search_input" type="text" placeholder="Chercher sur BeerOverflow">
                    <input id="search_button" type="image" value="Chercher" src="/ProjetBiere/img/loupe.png" height="15px" width="15px">
                </form>
                <div id="connexion">
                	<div>
                    <?php
                    	if(isset($_SESSION['login'])){
                    		echo "<p>Bienvenue ".$_SESSION['login']."!</p>";
                    	}
                    	echo "</div><div>";
                        if(Session::is_admin()){
                            echo '<a href="http://localhost/projetbiere/index.php?action=readAll&controller=client">Clients</a> ';
                        }
                        if(isset($_SESSION['login'])){
                            echo '<a href="http://localhost/projetbiere/index.php?action=read&controller=client&login='.$_SESSION['login'].'">Mon Profil</a> ';
                            echo '<a href="http://localhost/projetbiere/index.php?action=deconnect&controller=client">Deconnexion</a>';
                        }else{
                            echo '<a href="http://localhost/projetbiere/index.php?controller=client&action=connect">Connexion</a> ';
                            echo '<a href="http://localhost/projetbiere/index.php?action=create&controller=client">S\'inscrire</a>';
                        }
                    ?>
                	</div>
                </div>
            </div>
            <nav>
                <a href="http://localhost/projetbiere/">Accueil</a>
                <a href="http://localhost/projetbiere/index.php?action=main&controller=biere">Bieres</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=brasserie">Brasseries</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=categorie">Categories</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=categorie">A Propos</a>
                <a href="http://localhost/projetbiere/index.php?action=readAll&controller=categorie">FAQ</a>
                <?php
                    if(isset($_SESSION['login'])){
                        echo '<a href="http://localhost/projetbiere/index.php?action=showBasket&controller=client">Panier</a> ';
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
        			<a href="http://">Aide</a>
        			<a href="http://">Suivre ma commande</a>
        			<a href="http://">Livraison</a>
        			<a href="http://">FAQ</a>
        		</div>
        		<div>
        			<h4>Quoi trouver?</h4>
        			<a href="http://">Bières</a>
        			<a href="http://">Brasseries</a>
        			<a href="http://">Autres</a>
        		</div>
        		<div>
        			<h4>Plus...</h4>
        			<a href="http://">A propos</a>
        			<a href="http://">Nos engagements</a>
        			<a href="http://">Charte légale</a>
        		</div>
        		<div>
        			<h4>Nous rejoindre</h4>
        			<a href="http://">Newsletter</a>
        			<a href="http://">Carrière</a>
        			<a href="http://">Investir</a>
        			<a href="http://">Nous contacter</a>
        		</div>
        	</div>
        	<div id="CB">
        		<img src="/ProjetBiere/img/visa.png" alt="Visa" height="12" width="22">
	            <img src="/ProjetBiere/img/mastercard.jpeg" alt="MasterCard" height="22" width="32">
	            <img src="/ProjetBiere/img/maestro.png" alt="Maestro" height="39" width="32">
	            <img src="/ProjetBiere/img/american-express.png" alt="American-express" height="24" width="32">
	            <img src="/ProjetBiere/img/paypal.jpg" alt="Paypal" height="23" width="32">
        	</div>
        	<div>
	            <div id="foot">
	            	<p>Suivez nous :</p>
	                <a href="https://www.facebook.com/"><img src="/ProjetBiere/img/facebook.ico" alt="Facebook" height="22" width="22"></a>
	                <a href="https://www.twitter.com/"><img src="/ProjetBiere/img/twitter.ico" alt="Twitter" height="22" width="22"></a>
	                <a href="https://www.instagram.com/"><img src="/ProjetBiere/img/instagram.png" alt="Instagram" height="22" width="22"></a>
	                <a href="https://www.linkedin.com/"><img src="/ProjetBiere/img/linkedin.png" alt="LinkedIn" height="22" width="22"></a>
	            </div>
	            <div id="lastfoot">
	                <p>©2018 BeerOverflow</p>
	                <p>Tout droit réservé</p>
	            </div>
	        </div>
        </footer>
    </body>
</html>

