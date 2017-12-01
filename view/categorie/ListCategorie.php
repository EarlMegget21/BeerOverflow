<?php
    foreach ($tab_v as $v) { // Display of the cars stored in $tab_v
        echo "Categorie <a href=http://localhost/projetbiere/index.php?action=read&controller=Categorie&id="
            . rawurlencode($v->get("id"))
            . ">"
            . htmlspecialchars($v->get("id"))
            . "</a>";
        if (Session::is_admin()) {
            echo "<a href=http://localhost/projetbiere/index.php?action=delete&controller=Categorie&id="
                . rawurlencode($v->get("id"))
                . ">Supprimer Categorie</a> <br>";
        }
    }
    if (Session::is_admin()) {
        echo "<a href='http://localhost/projetbiere/index.php?action=create&controller=Categorie'>Créer Categorie</a>";
    }
?>

