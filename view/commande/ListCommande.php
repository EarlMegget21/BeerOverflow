<?php
    foreach ($tabCommande as $c) {
        echo "Commande numéro "
            . htmlspecialchars($c->get("id"))
            . " Date: "
            . htmlspecialchars($c->get("date"))
            . " "
            . "Livré: ";
        if (($c->get("livraison")) == 0) {
            echo "Non";
        } else {
            echo "Oui";
        }
        echo "<a href=http://localhost/projetbiere/index.php?action=read&controller=Commande&id="
            . rawurlencode($c->get("id"))
            . "> Detail Commande</a><br>";
    }
?>

