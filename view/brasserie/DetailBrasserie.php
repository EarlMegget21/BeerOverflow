<?php
    echo "Brasserie "
        .htmlspecialchars($v->get("nom"))
        ." située en "
        .htmlspecialchars($v->get("adresse"));
        if(Session::is_admin()) {
            echo "<a href='http://localhost/projetbiere/index.php?action=update&controller=Brasserie&id="
                . rawurlencode($_GET['id'])
                . "'>Modifier Brasserie</a> <a href='http://localhost/projetbiere/index.php?action=delete&controller=Brasserie&id="
                . rawurlencode($_GET['id'])
                . "'>Supprimer Brasserie</a> <br>";
        }
?>