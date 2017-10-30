<?php
    echo "Client "
        .htmlspecialchars($v->get("id"))
        ." de nom ".htmlspecialchars($v->get("nom"))
        ." de prenom ".htmlspecialchars($v->get("prenom"))
        ." <a href=http://localhost/projetbiere/index.php?action=update&controller=Client&id="
        .rawurlencode($_GET['id'])
        .">Modifier Client</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Client&id="
        .rawurlencode($_GET['id'])
        .">Supprimer Client</a> <br>";
?>