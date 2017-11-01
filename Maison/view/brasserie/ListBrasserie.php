<?php
    foreach ($tab_v as $v) // Display of the cars stored in $tab_v
    echo "Brasserie <a href=http://localhost/projetbiere/index.php?action=read&controller=Brasserie&id="
        .rawurlencode($v->get("id"))
        .">"
        .htmlspecialchars($v->get("nom"))
        ."</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Brasserie&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Brasserie</a> <br>";
//rawurlencode() permet d'eviter URL injection, htmlspecialchars permet d'éviter SQL injection
?>
<a href="http://localhost/projetbiere/index.php?action=create&controller=Brasserie">Créer Brasserie</a>
