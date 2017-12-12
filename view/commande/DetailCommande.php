<?php
echo "Numéro Commande: "
    .htmlspecialchars($c->get("id"))
    ."<br> "
    ."Date: "
    .htmlspecialchars($c->get("date"))
    ."<br>"
    ."Livré: ";
if(($c->get("livraison")) == 0){
    echo "Non";
}else{
    echo "Oui";
}
echo "<br> Contenu: <br>";
foreach ($tab_a as $a) {
        echo "- " . $a["marque"] . " " . $a["nom"] .",  Quantité: " . $a["quantite"] . "<br>";
}

?>