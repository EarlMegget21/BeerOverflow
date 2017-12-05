<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
        <h3>Formulaire:</h3>
            <input type='hidden' name='controller' value="biere"> <!-- ajoute un input caché qui défini la variable GET action -->

            <input type='hidden' name='action' value="<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>"> <!-- ajoute un input caché qui défini la variable GET action -->

            <?php if($_GET['action']=="update"){echo "<input type='hidden' value=\"".$_GET['id']."\" name=\"id\" id=\"id_id\" readonly/>";} ?> <!-- met un attribut caché avec l'id dans le cas où c'est un update car l'id n'apparaît pas est n'est pas modifiable manuellement -->

            <?php if($_GET['action']=="update"){$tv=ModelBiere::select(array('id'=>$_GET['id'])); $v=$tv[0];} ?> <!-- On créer l'objet pour pouvoir récupérer ses attributs lors d'un update, pour que les champs soient pré-remplis -->

            <label for="marque_id">Marque</label> :
            <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("marque")."\"";}else{echo "placeholder=\"ex:Chouffe\"";} ?> name="marque" id="marque_id" required/>

            <label for="nom_id">Nom</label> :
            <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("nom")."\"";}else{echo "placeholder=\"ex:Soleil\"";} ?> name="nom" id="nom_id" required/>

            <label for="idBrasserie_id">ID de la Brasserie</label> :
            <select name = "idBrasserie">
                <?php
                foreach($tab_id as $t) {
                    if ($_GET['action'] == "update") {
                        if ($t->get('id') == $v->get('idBrasserie')) {
                            echo "<option selected='selected' value=\"" . $t->get('id') . "\">" . $t->get('id') . " (" . $t->get('nom') . ")</option>";
                        } else {
                            echo "<option value=\"" . $t->get('id') . "\">" . $t->get('id') . " (" . $t->get('nom') . ")</option>";
                        }
                    } else{
                        echo "<option value=\"" . $t->get('id') . "\">" . $t->get('id') . " (" . $t->get('nom') . ")</option>";
                    }
                }
                ?>
            </select>
            <label for="taux_id">Taux</label> :
            <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("taux")."\"";}else{echo "placeholder=\"ex:7.5\"";} ?> name="taux" id="taux_id" required/>

            <label for="composition_id">Composition</label> :
            <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("composition")."\"";}else{echo "placeholder=\"ex:houblon, malt\"";} ?> name="composition" id="composition_id" required/>

            <label for="montant_id">Montant</label> :
            <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("montant")."\"";}else{echo "placeholder=\"ex:34.90\"";} ?> name="montant" id="montant_id" required/>
            
            <input type="submit" class="submit" value="Submit" />
</form>