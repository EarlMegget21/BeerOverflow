<?php
    echo "Bière ".htmlspecialchars($v->get("id"))
        ." nom "
        .htmlspecialchars($v->get("nom"))
        ." marque "
        .htmlspecialchars($v->get("marque"))
        ." idBrasserie "
        .htmlspecialchars($v->get("idBrasserie"))
        ." taux "
        .htmlspecialchars($v->get("taux"))
        ." composition "
        .htmlspecialchars($v->get("composition"))
        ." montant "
        .htmlspecialchars($v->get("montant"))
        .") <a href=http://localhost/projetbiere/index.php?action=update&controller=biere&id="
        .rawurlencode($v->get("id"))
        .">Modifier Bière</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=biere&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Bière</a> <br>";
if($tab_c) {
    foreach ($tab_c as $c) {
        echo "Categorie "
            . $c->get("idCategorie")
            . "<br>"."<a href=http://localhost/projetbiere/index.php?action=delete&controller=catebiere&idCategorie="
            .$c->get("idCategorie")
            ."&idBiere="
            .htmlspecialchars($v->get("id"))
            .">Supprimer Categorie</a> <br>";
    }
}
?>