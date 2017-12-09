<?php
echo "<div id='detailbiere'>
        <div>
        <img src='/projetbiere/img/biere/".htmlspecialchars($v->get("image"))."' alt='photo".$v->get("nom")."' height='300' width='240'>
        <div>
            <form type='GET' action='index.php' id='addbasket'>
                <input type='hidden' name='action' value='addBasket'/>
                <input type='hidden' name='controller' value='Client'/>    
                <input type='hidden' name='nom' value='" . $v->get("nom") . "'>
                <input type='hidden' name='marque' value='" . $v->get("marque") . "'> 
                <input type='hidden' name='montant' value='" . $v->get("montant") . "'>
                <input type='hidden' name='id' value='" . $v->get("id") . "'>
                <select name = 'volume'>
                    <option value='25'>25cl</option>
                    <option value='33'>33cl</option>
                    <option value='75'>75cl</option>
                </select>
                <input type='number' name='quantite' value='0' min='0'>
                <input type='submit' value='Ajouter au panier'>      
            </form> ";
if(Session::is_admin()) {
    echo "<a href=http://localhost/projetbiere/index.php?action=update&controller=biere&id=".rawurlencode($v->get("id")).">Modifier Bière</a>
          <a href=http://localhost/projetbiere/index.php?action=delete&controller=biere&id=".rawurlencode($v->get("id")).">Supprimer Bière</a>
        </div>";
}

echo "</div><div><p>"
    .htmlspecialchars($v->get("marque"))
    ." "
    .htmlspecialchars($v->get("nom"))
    ."</p> <p>Brasserie: "
    .htmlspecialchars($v->get("idBrasserie"))
    ."</p> </p>Taux d'alcool: "
    .htmlspecialchars($v->get("taux"))
    ."%</p> <p>Composition :"
    .htmlspecialchars($v->get("composition"))
    ."</p> <p>Prix TTC: "
    .htmlspecialchars($v->get("montant"))."€</p></div>";

if($tab_c) { //si le tableau existe(il y a des catégories pour cette bière, alors on parcours le tableau en affichant chaque catégorie et un lien pour la supprimer
    echo "<div><h4>Catégories</h4><ul>";
    foreach ($tab_c as $c) {    //Permet d'afficher le numéro et le nom de chaque catégorie
        echo "<li>";
        foreach($tab_idCate as $idCate){
            if($idCate->get('id') == $c->get("idCategorie")){
                echo $idCate->get('nom');
            }
        }
        if(Session::is_admin()) {
            echo "<a href='http://localhost/projetbiere/index.php?action=delete&controller=catebiere&idCategorie="
                . $c->get("idCategorie")
                . "&idBiere="
                . htmlspecialchars($v->get("id"))
                . "'> Supprimer Categorie</a>";
        }
        echo "</li>";
    }
    echo "<ul></div>";
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
            ."<option value=\"" . $cate->get('id') . "\">" . $cate->get('nom') . "</option>";
            $premier = TRUE;
        }else if(!$trouve && $premier) {
            echo "<option value=\"" . $cate->get('id') . "\">" . $cate->get('nom') . "</option>";
        }else {
            $trouve = FALSE;
        }
    }
    if($premier){
        echo
            "</select>"
            ."<input type = 'submit' value = 'Ajouter Categorie' />";
    }
    echo "</form >";
}
echo "</form ></div>";

?>