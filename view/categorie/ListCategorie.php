<?php
    foreach ($tab_v as $v) // Display of the cars stored in $tab_v
    echo "Categorie <a href=http://localhost/projetbiere/index.php?action=read&controller=Categorie&id="
        .rawurlencode($v->get("id"))
        .">"
        .htmlspecialchars($v->get("id"))
        ."</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Categorie&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Categorie</a> <br>";
//rawurlencode() permet d'eviter URL injection, htmlspecialchars permet d'éviter SQL injection
?>
<a href="http://localhost/projetbiere/index.php?action=create&controller=Categorie">Créer Categorie</a>
