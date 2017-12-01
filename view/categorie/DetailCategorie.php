<?php
    echo "Categorie "
        .htmlspecialchars($v->get("nom"))
        .", specifications: ".htmlspecialchars($v->get("specifications"));
         if(Session::is_admin()) {
             echo "<a href = http://localhost/projetbiere/index.php?action=update&controller=Categorie&id="
                 .rawurlencode($_GET['id'])
                 . ">Modifier Categorie</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Categorie&id="
                 . rawurlencode($_GET['id'])
                 . ">Supprimer Categorie</a> <br>";
         }
?>