<?php
    foreach ($tab_v as $v) { // Display of the cars stored in $tab_v
        echo "Client <a href=http://localhost/projetbiere/index.php?action=read&controller=Client&login="
            . rawurlencode($v->get("login"))
            . ">"
            . htmlspecialchars($v->get("prenom"))
            . " "
            . htmlspecialchars($v->get("nom"))
            . "</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Client&login="
            . rawurlencode($v->get("login"))
            . ">Supprimer Client</a> <br>";
    }
    if (Session::is_admin()) {
        echo "<a href='http://localhost/projetbiere/index.php?action=create&controller=Client'>Créer Client</a>";
    }
?>
