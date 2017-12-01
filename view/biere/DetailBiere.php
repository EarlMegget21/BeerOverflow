<?php
    echo "Bière "
        .htmlspecialchars($v->get("marque"))
        ." "
        .htmlspecialchars($v->get("nom"))
        .", idBrasserie "
        .htmlspecialchars($v->get("idBrasserie"))
        .", taux "
        .htmlspecialchars($v->get("taux"))
        ."%, composition :"
        .htmlspecialchars($v->get("composition"))
        .", montant "
        .htmlspecialchars($v->get("montant"))."€";
    if(Session::is_admin()) {
        echo "<a href=http://localhost/projetbiere/index.php?action=update&controller=biere&id="
            . rawurlencode($v->get("id"))
            . ">Modifier Bière</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=biere&id="
            . rawurlencode($v->get("id"))
            . ">Supprimer Bière</a> <br> Categories : <br>";
    }
if(Session::is_admin()) {
    echo
        "<form method = \"get\" action = \"../ProjetBiere/index.php\" >"
            ."<input type = 'hidden' name = \'action\' value = \"created\" />"
            ."<input type = 'hidden' name = \'controller\' value = \'catebiere\' />"
            ."<input type = 'hidden' name = 'idBiere' value = '<?php echo $v->get(\"id\"); ?>' >"
            ."<input type = \"text\" placeholder = \"ID de la Catégorie\" name = 'idCategorie' id = \"idCategorie_id\" required />"
            ."<input type = \"submit\" value = \"Ajouter Categorie\" />"
        ."</form >";
    }

    if($tab_c) { //si le tableau existe(il y a des catégories pour cette bière, alors on parcours le tableau en affichant chaque catégorie et un lien pour la supprimer
        foreach ($tab_c as $c) {
            echo $c->get("idCategorie")
                ."<a href=http://localhost/projetbiere/index.php?action=delete&controller=catebiere&idCategorie="
                .$c->get("idCategorie")
                ."&idBiere="
                .htmlspecialchars($v->get("id"))
                .">Supprimer Categorie</a> <br>";
        }
    }
?>