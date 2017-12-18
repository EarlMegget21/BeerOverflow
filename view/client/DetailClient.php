<?php
    echo "Client "
        .htmlspecialchars($v->get("prenom"))
        ." "
        .htmlspecialchars($v->get("nom"));
    if(Session::is_user($_GET['login'])||Session::is_admin()) {
        echo " <a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=update&controller=Client&login="
            . rawurlencode($_GET['login'])
            . "'>Modifier Profil</a> <a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=delete&controller=Client&login="
            . rawurlencode($_GET['login'])
            . "'>Supprimer Compte</a> <br>";
    }
?>
