<?php
    foreach ($tab_v as $v) {
        echo "- <a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=read&controller=Brasserie&id="
            . rawurlencode($v->get("id"))
            . "'>"
            . htmlspecialchars($v->get("nom"))
            . "</a> ";
        if (Session::is_admin()) {
            echo "<a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=delete&controller=Brasserie&id="
                . rawurlencode($v->get("id"))
                . "'>Supprimer Brasserie</a>";
        }
        echo "<br>";
    }
    if (Session::is_admin()) {
        echo "<a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=create&controller=Brasserie'>Créer Brasserie</a>";
    }
?>
