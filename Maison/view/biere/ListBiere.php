<?php
    foreach ($tab_v as $v) // Display of the cars stored in $tab_v
    echo "Bière <a href=http://localhost/projetbiere/index.php?action=read&controller=biere&id="
        .rawurlencode($v->get("id"))
        .">"
        .htmlspecialchars($v->get("id"))
        ."</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=biere&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Bière</a> <br>";
//rawurlencode() permet d'eviter URL injection, htmlspecialchars permet d'éviter SQL injection
?>
<a href="http://localhost/projetbiere/index.php?action=create&controller=Biere">Créer Bière</a>