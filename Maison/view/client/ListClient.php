<?php
    foreach ($tab_v as $v) // Display of the cars stored in $tab_v
    echo "Client <a href=http://localhost/projetbiere/index.php?action=read&controller=Client&id="
        .rawurlencode($v->get("id"))
        .">"
        .htmlspecialchars($v->get("id"))
        ."</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Client&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Client</a> <br>";
//rawurlencode() permet d'eviter URL injection, htmlspecialchars permet d'éviter SQL injection
?>
<a href="http://localhost/projetbiere/index.php?action=create&controller=Client">Créer Client</a>