<?php
    foreach ($tab_v as $v) // Display of the cars stored in $tab_v
    echo "Commande <a href=http://localhost/projetbiere/index.php?action=read&controller=Commande&id="
        .rawurlencode($v->get("id"))
        .">"
        .htmlspecialchars($v->get("id"))
        ."</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Commande&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Commande</a> <br>";
//rawurlencode() permet d'eviter URL injection, htmlspecialchars permet d'éviter SQL injection
?>
<a href="http://localhost/projetbiere/index.php?action=create&controller=Commande">Créer Commande</a>
