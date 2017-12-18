<div id="listbiere">
    <div>
    <?php
        foreach ($tab_v as $v) { // Display of the beers stored in $tab_v
            echo "<div><a href=http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=read&controller=biere&id="
                . rawurlencode($v->get("id"))
                . "><img src='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/biere/".$v->get("image")."' alt='Photo ".$v->get("nom")." ' height='250' width='200'><p>"
                . htmlspecialchars($v->get("marque"))
                . " "
                . htmlspecialchars($v->get("nom"))
                . "</p></a>";
            if (Session::is_admin()) {
                echo "<div><a href=http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=delete&controller=biere&id="
                    . rawurlencode($v->get("id"))
                    . "><img src='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/croix.png' alt='Supprimer Biere ' height='40' width='40'></a></div>";
            }
            echo "</div>";
        }
        if (Session::is_admin()) {
            echo "</div><div><a href='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/index.php?action=create&controller=Biere' id='ajouter'><img src='http://webinfo.iutmontp.univ-montp2.fr/~sonettir/e-commerce/img/plus.png' alt='Creer Biere ' height='40' width='40'></a>";
        }
    ?>
    </div>
</div>
