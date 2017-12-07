<?php
foreach ($tab_v as $v) { // Display of the beers stored in $tab_v
    echo "- <a href=http://localhost/projetbiere/index.php?action=read&controller=biere&id="
        . rawurlencode($v->get("id"))
        . ">"
        . htmlspecialchars($v->get("marque"))
        . " "
        . htmlspecialchars($v->get("nom"))
        . "</a> 
        <form type='GET' action='index.php' id='addbasket'>
            <input type=\"hidden\" name=\"action\" value=\"addBasket\"/>
            <input type=\"hidden\" name=\"controller\" value=\"Client\"/>    
            <input type='hidden' name='nom' value='" . $v->get("nom") . "'>
            <input type='hidden' name='marque' value='" . $v->get("marque") . "'> 
            <input type='hidden' name='montant' value='" . $v->get("montant") . "'>
            <input type='hidden' name='id' value='" . $v->get("id") . "'>
            <input type='submit' value='Ajouter au panier'>      
        </form> ";
    if (Session::is_admin()) {
        echo "<a href=http://localhost/projetbiere/index.php?action=delete&controller=biere&id="
            . rawurlencode($v->get("id"))
            . ">Supprimer Bière</a>";
    }
    echo "<br>";
}
if (Session::is_admin()) {
    echo "<a href='http://localhost/projetbiere/index.php?action=create&controller=Biere'>Créer Bière</a>";
}
?>