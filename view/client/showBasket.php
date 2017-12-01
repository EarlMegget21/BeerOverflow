<?php

ControllerClient::initPanier();
$_SESSION['Basket']=array(
    "NomProd" => array("Marque", "Qte", "Prix"),
    "Dildo" => array("Durex", 3, 69)
);

function addBasket($NomProd,$Marque,$Qte,$PrixBase){
    ControllerClient::initPanier();
    if (isset($_SESSION['Basket'][$NomProd])){
        $_SESSION['Basket'][$NomProd][1]+=$Qte;
        $_SESSION['Basket'][$NomProd][2]+=$Qte*$PrixBase;
    }else{
        $_SESSION['Basket'][$NomProd]=array($Marque,$Qte,$PrixBase*$Qte);
    }
}

addBasket("Dildo","Durex",3,69);
addBasket("Mouton","Bouftou",1,1000);

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