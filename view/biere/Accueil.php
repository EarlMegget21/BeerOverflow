<div id="accueil">
    <div id="acc1">
    <?php
        if($deco != NULL){
            echo "<h1>A Bientôt sur BeerOverFlow !</h1>";
        } else if(isset($_SESSION['login'])) {
            echo "<h1> Bienvenue sur BeerOverFlow " . htmlspecialchars($_SESSION['login']) . " !</h1>";
        } else{
           echo "<h1> Bienvenue sur BeerOverFlow !</h1>";
        }
    ?>
    </div>
    <div>
        <a href="http://localhost/projetbiere/index.php?action=readAll&controller=biere">Découvrez nos Bières</a>
    </div>
</div>
