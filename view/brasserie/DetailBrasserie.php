<?php
    echo "Brasserie "
        .htmlspecialchars($v->get("nom"))
        ." située en "
        .htmlspecialchars($v->get("adresse"));
        if(Session::is_admin()) {
            echo "<a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=update&controller=Brasserie&id="
                . rawurlencode($_GET['id'])
                . "'>Modifier Brasserie</a> <a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=delete&controller=Brasserie&id="
                . rawurlencode($_GET['id'])
                . "'>Supprimer Brasserie</a> <br>";
        }
?>
