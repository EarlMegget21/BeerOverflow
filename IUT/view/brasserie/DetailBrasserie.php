<?php
    echo "Brasserie "
        .htmlspecialchars($v->get("id"))
        ." de nom ".htmlspecialchars($v->get("nom"))
        ." d'adresse ".htmlspecialchars($v->get("adresse"))
        ." <a href=http://localhost/projetbiere/index.php?action=update&controller=Brasserie&id="
        .rawurlencode($_GET['id'])
        .">Modifier Brasserie</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Brasserie&id="
        .rawurlencode($_GET['id'])
        .">Supprimer Brasserie</a> <br>";
?>