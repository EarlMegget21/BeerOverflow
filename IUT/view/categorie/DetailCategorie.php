<?php
    echo "Categorie "
        .htmlspecialchars($v->get("id"))
        ." de nom ".htmlspecialchars($v->get("nom"))
        ." de specifications? ".htmlspecialchars($v->get("specifications"))
        ." <a href=http://localhost/projetbiere/index.php?action=update&controller=Categorie&id="
        .rawurlencode($_GET['id'])
        .">Modifier Categorie</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Categorie&id="
        .rawurlencode($_GET['id'])
        .">Supprimer Categorie</a> <br>";
?>