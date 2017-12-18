<?php
if($tabCommande){
    foreach ($tabCommande as $c) {
        echo "<p>Commande numéro "
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
        echo "</p>";
        echo "<a href=http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=read&controller=Commande&id="
            . rawurlencode($c->get("id"))
            . "> Detail Commande</a><br>";
    }
}else{
	echo "<p>Aucune Commande</p>";
}
?>

