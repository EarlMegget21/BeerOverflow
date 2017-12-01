<?php

//initialise le panier si pas dejà fait
//ajoute au panier
//sauvegarde un ajout dans le panier
ControllerClient::addBasket("Dildo","Durex",3,69);
ControllerClient::addBasket("Mouton","Bouftou",1,1000);

if (isset($_SESSION['Basket'])){
    echo print_r($_SESSION['Basket']);
    echo "<table>";
    foreach ($_SESSION['Basket'] as $key => $item){
        echo "<tr><td>$key</td>";
        foreach ($item as $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>