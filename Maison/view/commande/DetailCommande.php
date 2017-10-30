<?php
    echo "Commande "
        .htmlspecialchars($v->get("id"))
        ." <a href=http://localhost/projetbiere/index.php?action=update&controller=Commande&id="
        .rawurlencode($v->get("id"))
        .">Modifier Commande</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Commande&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Commande</a> <br>"
        ." du client ".htmlspecialchars($v->get("idClient"))
        ." livraison? ".htmlspecialchars($v->get("livraison"))
        ." le ".htmlspecialchars($v->get("date"))
        ."\n Contenu:";
    if($tab_a) {
        foreach ($tab_a as $a) {
            echo "Bière " . $a->get("idBiere") . " en quantité " . $a->get("quantite")
            ."<a href=http://localhost/projetbiere/index.php?action=delete&controller=achat&idBiere="
            .$a->get("idBiere")
            ."&idCommande="
            .htmlspecialchars($v->get("id"))
            .">Supprimer Biere</a> <br>";
        }
    }
?>