<?php

//initialise le panier si pas dejà fait
//ajoute au panier
//sauvegarde un ajout dans le panier
if (isset($_SESSION['Basket'])) {
    if (sizeof($_SESSION['Basket']) != 1) {
        echo "<table>";
        foreach ($_SESSION['Basket'] as $key => $item) {
            echo "<tr><td>$key</td>";
            foreach ($item as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo <<<END
<a href="http://localhost/projetbiere/index.php?action=vob&controller=Achat">Valider la commande</a>
END;
    } else {
        echo "Panier vide !";
    }
}


?>

