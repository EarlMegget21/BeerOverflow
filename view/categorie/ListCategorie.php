<?php
    foreach ($tab_v as $v) { // Display of the cars stored in $tab_v
        echo "- <a href=\"http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=read&controller=Categorie&id="
            . rawurlencode($v->get("id"))
            . "\">"
            . htmlspecialchars($v->get("nom"))
            . "</a> ";
        if (Session::is_admin()) {
            echo "<a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=delete&controller=Categorie&id="
                . rawurlencode($v->get("id"))
                . "'>Supprimer Categorie</a>";
        }
        echo "<br>";
    }
    if (Session::is_admin()) {
        echo "<a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=create&controller=Categorie'>Créer Categorie</a>";
    }
?>

