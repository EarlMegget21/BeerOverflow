<?php
echo "<p>Numéro Commande: "
    .htmlspecialchars($c->get("id"))
    ." "
    ."Date: "
    .htmlspecialchars($c->get("date"))
    ." "
    ."Livré: ";
if(($c->get("livraison")) == 0){
    echo "Non";
}else{
    echo "Oui";
}
echo "</p><p> Contenu: <p><ul>";
foreach ($tab_a as $a) {
        echo "<li> " . $a["marque"] . " " . $a["nom"] .",  Quantité: " . $a["quantite"] . "</li>";
}
echo "</ul>";
?>
