<?php
    foreach ($tab_c as $c)
    echo "Commande <a href=http://localhost/projetbiere/index.php?action=read&controller=Commande&id="
        .rawurlencode($c->get("id"))
        .">"
        .htmlspecialchars($c->get("id"))
        ."</a> "
        ."Date: "
        .htmlspecialchars($c->get("date"))
        ." "
        ."Livraison: ";
        if(($c->get("livraison")) == 0){
            echo "Non";
        }else{
            echo "Oui";
        }
        echo "<br>";
?>

