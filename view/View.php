<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/projetbiere/css/styles.css">
        <style>

        </style>
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <div id="head">
                <div id="logo">
                    <img src="/projetbiere/img/logo.png" alt="Facebook" height="42" width="42">

                </div>
                <div class="logo"><p>BeerOverflow</p></div>
                <form id="chercher" method="get" action="../projetbiere/index.php">
                    <input type="hidden" name="action" value="searched"/>
                    <input type="hidden" name="controller" value="biere"/>
                    <input id="search_input" type="text" placeholder="Chercher sur BeerOverflow">
                    <input id="search_button" type="image" value="Chercher" src="/projetbiere/img/loupe.png" height="15px" width="80px">
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
                <a href="http://localhost/projetbiere/index.php?action=showBasket&controller=client">Panier</a>
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
        		<img src="/projetbiere/img/visa.png" alt="Visa">
	            <img src="/projetbiere/img/mastercard.jpeg" alt="MasterCard">
	            <img src="/projetbiere/img/maestro.png" alt="Maestro" >
	            <img src="/projetbiere/img/american-express.png" alt="American-express" >
	            <img src="/projetbiere/img/paypal.jpg" alt="Paypal">
        	</div>
        	<div>
	            <div id="foot">
	            	<p>Suivez nous :</p>
	                <a href="https://www.facebook.com/"><img src="/projetbiere/img/facebook.ico" alt="Facebook" ></a>
	                <a href="https://www.twitter.com/"><img src="/projetbiere/img/twitter.ico" alt="Twitter" ></a>
	                <a href="https://www.instagram.com/"><img src="/projetbiere/img/instagram.png" alt="Instagram" ></a>
	                <a href="https://www.linkedin.com/"><img src="/projetbiere/img/linkedin.png" alt="LinkedIn" ></a>
	            </div>
	            <div id="lastfoot">
	                <p>©2018 BeerOverflow</p>
	                <p>Tout droit réservé</p>
	            </div>
	        </div>
        </footer>
    </body>
</html>

