<?php
if($deco != NULL){
    echo "<h1>A Bientôt sur BeerOverFlow !</h1>";
} else if(isset($_SESSION['login'])) {
    echo "<h1> Bienvenue sur BeerOverFlow " . htmlspecialchars($_SESSION['login']) . " !</h1>";
} else{
   echo "<h1> Bienvenue sur BeerOverFlow!</h1>";
}
?>