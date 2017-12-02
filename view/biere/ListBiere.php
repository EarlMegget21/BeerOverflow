<?php
    foreach ($tab_v as $v){ // Display of the beers stored in $tab_v
        echo "- <a href=http://localhost/projetbiere/index.php?action=read&controller=biere&id="
            .rawurlencode($v->get("id"))
            .">"
            .htmlspecialchars($v->get("marque"))
            ." "
            .htmlspecialchars($v->get("nom"))
            ."</a> ";
        if(Session::is_admin()){
            echo "<a href=http://localhost/projetbiere/index.php?action=delete&controller=biere&id="
                .rawurlencode($v->get("id"))
                .">Supprimer Bière</a>";
        }
        echo "<br>";
    }
    if(Session::is_admin()){
            echo "<a href='http://localhost/projetbiere/index.php?action=create&controller=Biere'>Créer Bière</a>";
    }
?>