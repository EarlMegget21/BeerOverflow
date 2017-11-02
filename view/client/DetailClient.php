<?php
    echo "Client "
        .htmlspecialchars($v->get("prenom"))
        ." "
        .htmlspecialchars($v->get("nom"))
        ." <a href=http://localhost/projetbiere/index.php?action=update&controller=Client&id="
        .rawurlencode($_GET['id'])
        .">Modifier Client</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Client&id="
        .rawurlencode($_GET['id'])
        .">Supprimer Client</a> <br>";
?>