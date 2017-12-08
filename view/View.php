<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/projetbiere/css/styles.css">
        <style>
body {
    width: 900px;
    margin: auto;
    line-height: 150%;
    font-family: "Comic Sans MS", "Arial", "sans-serif";
    font-size: 12px;
    color: #7c4600;
    display: flex;
    flex-direction: column;
    height: 100%;
}

html {
    height: 100%;
}

#content {
    flex-grow: 1;
}

a {
    text-decoration: none;
    color: #7c4600;
}

a:hover {
    font-weight: 500;
    color: #ffc986;
}

nav a:hover {
    background-color: #7c4600;
    color: white;
}

nav {
    display: flex;
    font-weight: bold;
}

nav > a {
    border-right: 1px solid #7c4600;
    flex-grow: 1;
    text-align: center;
}

nav > a:last-child {
    border-right: 0px;
}

h1 {
    text-align: center;
}

footer {
    background-color: #ffc986;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    margin-top: 10px;
}

footer > div:last-child {
    justify-content: space-between;
    padding: 0 5px 0 5px;
    border-top: 1px solid white;
}

#foot {
    display: flex;
    align-items: center;
}

#foot img {
    margin: 5px;
}

#foot img:hover {
    margin: 4px;
    width: 24px;
    height: 24px;
}

#foot a:hover {
    border: 0px;
}

footer > div {
    display: flex;
}

footer > div > div > a {
    font-size: 10px;
    display: flex;
}

footer > div:first-child > div {
    display: flex;
    flex-direction: column;
}

footer > div:first-child {
    margin: 20px;
    justify-content: space-around;
}

footer a {
    border-top: 1px solid #ffc986;
    border-bottom: 1px solid #ffc986;
}

footer a:hover {
    border-top: 1px solid #7c4600;
    border-bottom: 1px solid #7c4600;
    color: #7c4600;
}

#CB {
    justify-content: flex-start;
    align-items: center;
}

#CB img:first-child {
    background-color: white;
    padding: 5px;
}

#CB img {
    margin: 10px;
}

#lastfoot > p {
    margin: 5px;
}

#lastfoot > p:first-child {
    font-size: 10px;
}

@font-face {
    font-family: "FontLogo";
    src: url('/ProjetBiere/font/FontLogo.otf');
}

#head {
    padding: 20px;
    display: flex;
}

#connexion a:hover {
    color: #ffc986;
}

#connexion p {
    color: #ffc986;
}

#connexion {
    display: flex;
    align-items: center;
    justify-content: center;
}

#connexion div:last-child {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
}

#logo > img {

    margin-left: 10px;
    margin-right: 10px;
}

#logo{
	display: flex;
}

#logo p {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    margin-right: 10px;
    font-family: "FontLogo";
    font-size: 40px;
}

#chercher {
    margin: auto;
    border: 1px solid #7c4600;
}

#search_input {
    border: 0px;
    width: 170px;
    height: 18px;
}

#search_button {
    border: 0px;
    background-color: white;
    padding: 5px;
    margin-left: 1px;
    border-radius: 5px;
}

#search_button:hover {
    background: linear-gradient(white 20%, #BBBBBB, white 70%);
}

input {
    border-radius: 4px;
    text-align: center;
}

header form {
    background: linear-gradient(white 20%, #BBBBBB, white 70%);
}

header {
    margin-bottom: 10px;
}

form {
    border-radius: 4px;
    display: flex;
    align-items: center;
}

#content form {
    flex-direction: column;
    justify-content: space-around;
}

#content input {
    height: 30px;
    width: 230px;
    font-size: 20px;
    border: 1px solid #7c4600;
}

#content input:focus {
    border: 1px solid #ffc986;
    outline: 0px;
}

#signup {
    height: 700px;
}

#signin {
    height: 350px;
}

h3 {
    font-size: 30px;
    font-weight: bold;
}

label {
    font-size: 20px;
    margin-top: 20px;
}

#content .submit {
    margin: 30px;
    width: 250px;
    height: 40px;
    background-color: #7c4600;
    color: #ffc986;
}

#content .submit:hover {
    background-color: #ffc986;
    color: #7c4600;
}

#accueil {
    background-image: url('/ProjetBiere/img/wallpaper.jpg');
    background-repeat: round;
    height: 600px;
    color: #7c4600;
    display: flex;
    flex-direction: column;
    font-size: 20px;
}

#accueil > div {
    flex-grow: 1;
}

#acc1 > h1 {
    background-color: white;
    padding: 35px;
    text-align: center;
    margin: 10px;
    font-size: 100px;
    font-family: "FontLogo";
}

#acc1 > p {
    background-color: white;
    padding: 20px;
    text-align: center;
    margin: 10px;
}

#accueil > div > a {
    background-color: white;
    padding: 10px;
}

#accueil > div > a:hover {
    background-color: #7c4600;
    color: white;
}

#acc2 {
    display: flex;
    align-items: center;
    justify-content: center;
}

#acc1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
}

#addbasket{
    display: ruby;
}
fieldset div {
    display: flex;
    flex-direction: column;
    align-items: center;
}

fieldset div:last-child {
    margin-top: 20px;
    margin-bottom: 20px;
}
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

