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
                    <input id="search_button" type="submit" value="Chercher">
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
        		<p>Liens</p>
        	</div>
        	<div>
	            <div id="foot">
	                <img src="/ProjetBiere/img/facebook.ico" alt="Facebook" height="22" width="22">
	                <img src="/ProjetBiere/img/twitter.ico" alt="Twitter" height="22" width="22">
	                <img src="/ProjetBiere/img/instagram.png" alt="Instagram" height="22" width="22">
	                <img src="/ProjetBiere/img/linkedin.png" alt="LinkedIn" height="22" width="22">
	            </div>
	            <div id="lastfoot">
	                <p>©2018 BeerOverflow</p>
	                <p>Tout droit réservé</p>
	            </div>
	        </div>
        </footer>
    </body>
</html>

