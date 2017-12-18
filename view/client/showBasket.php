<?php

//initialise le panier si pas dejà fait
//ajoute au panier
//sauvegarde un ajout dans le panier
if (isset($_SESSION['Basket'])) {
    if (count($_SESSION['Basket']) != 1) {
        echo "<table>";
        foreach ($_SESSION['Basket'] as $key => $item) {
            echo "<tr><td>$key</td>";
            foreach ($item as $value) {
                echo "<td>$value</td>";
            }
            if ($key!="NomProd"){
                echo "<td>
                <form type='GET' action='index.php' >
                    <input type=\"hidden\" name=\"action\" value=\"decrease\"/>
                    <input type=\"hidden\" name=\"controller\" value=\"Client\"/>    
                    <input type='hidden' name='nom' value='$key'>
                    <input type='submit' value='-1'> 
                </form>
                </td>
            </tr>";
            }
        }
        echo "</table>";
        echo "<a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=vob&controller=Achat'>Valider la commande</a>";
    }else{
        echo "<p>Panier vide !</p>";
    }
}



?>

