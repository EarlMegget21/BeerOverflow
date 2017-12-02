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
        . ">Supprimer Bière</a>";
}


if($tab_c) { //si le tableau existe(il y a des catégories pour cette bière, alors on parcours le tableau en affichant chaque catégorie et un lien pour la supprimer
    echo "<h3>Catégories</h3>";
    foreach ($tab_c as $c) {    //Permet d'afficher le numéro et le nom de chaque catégorie
        echo "- ".$c->get("idCategorie")." ";
        foreach($tab_idCate as $idCate){
            if($idCate->get('id') == $c->get("idCategorie")){
                echo "(".$idCate->get('nom').")";
            }
        }
        if(Session::is_admin()) {
            echo "<a href=http://localhost/projetbiere/index.php?action=delete&controller=catebiere&idCategorie="
                . $c->get("idCategorie")
                . "&idBiere="
                . htmlspecialchars($v->get("id"))
                . "> Supprimer Categorie</a>";
        }
        echo "<br>";
    }
}

if(Session::is_admin()) {
    echo
        "<form method = 'get' action = '../ProjetBiere/index.php' >"
        ."<input type = 'hidden' name = 'action' value = 'created' />"
        ."<input type = 'hidden' name = 'controller' value = 'catebiere' />"
        ."<input type = 'hidden' name = 'idBiere' value = '".$v->get("id")."' >";
    $trouve = FALSE;    //Permet de savoir si une bière possède la catégorie actuelle (lors du parcours du foreach)
    $premier = FALSE;   //Permet de savoir si on a déjà affiché une ligne
    foreach($tab_idCate as $cate){  //Permet d'afficher seulement les catégories que ne possède pas la bière
        if($tab_c) {    //Si la bière n'a pas de catégorie ($tab_c = false) alors on ne parcours pas le tableau et on affiche toutes les catégories
            foreach ($tab_c as $c) {
                if ($cate->get('id') == $c->get('idCategorie')) {
                    $trouve = TRUE;
                    break;
                }
            }
        }
        if(!$trouve && !$premier){
            echo "<select name = 'idCategorie'>"
            ."<option value=\"" . $cate->get('id') . "\">" . $cate->get('id') . " (" . $cate->get('nom') . ")</option>";
            $premier = TRUE;
        }else if(!$trouve && $premier) {
            echo "<option value=\"" . $cate->get('id') . "\">" . $cate->get('id') . " (" . $cate->get('nom') . ")</option>";
        }else {
            $trouve = FALSE;
        }
    }
    if($premier){
        echo
            "</select>"
            ."<input type = 'submit' value = 'Ajouter Categorie' />";
    }
}
echo "</form >";

?>