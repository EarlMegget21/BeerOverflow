<form method="get" action="ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire:</legend>
    <p>
        <input type='hidden' name='action' value="<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>"> <!-- ajoute un input caché qui défini la variable GET action -->

        <?php if($_GET['action']=="update"){echo "<input type='hidden' value=\"".$_GET['id']."\" name=\"id\" id=\"id_id\" readonly/>";} ?> <!-- met un attribut caché avec l'id dans le cas où c'est un update car l'id n'apparaît pas est n'est pas modifiable manuellement -->

        <?php if($_GET['action']=="update"){$tv=ModelBiere::select(array('id'=>$_GET['id'])); $v=$tv[0];} ?> <!-- On créer l'objet pour pouvoir récupérer ses attributs lors d'un update, pour que les champs soient pré-remplis -->

        <label for="marque_id">Marque</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("marque")."\"";}else{echo "placeholder=\"ex:Chouffe\"";} ?> name="marque" id="marque_id" required/>

        <label for="nom_id">Nom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("nom")."\"";}else{echo "placeholder=\"ex:Soleil\"";} ?> name="nom" id="nom_id" required/>

        <label for="idBrasserie_id">ID de la Brasserie</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("idBrasserie")."\"";}else{echo "placeholder=\"ex:5\"";} ?> name="idBrasserie" id="idBrasserie_id" required/>

        <label for="taux_id">Taux</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("taux")."\"";}else{echo "placeholder=\"ex:7.5\"";} ?> name="taux" id="taux_id" required/>

        <label for="composition_id">Composition</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("composition")."\"";}else{echo "placeholder=\"ex:houblon, malt\"";} ?> name="composition" id="composition_id" required/>

        <label for="montant_id">Montant</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("montant")."\"";}else{echo "placeholder=\"ex:34.90\"";} ?> name="montant" id="montant_id" required/>

    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>