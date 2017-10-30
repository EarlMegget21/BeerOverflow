<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire:</legend>
    <p>
        <input type='hidden' name='action' value="<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>"> <!-- ajoute un input caché qui défini la variable GET action -->

        <label for="id_id">Id</label> : <!-- for permet de renvoyer vers la zone test ayant l'id indiqué en cliquant sur le label -->
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$_GET['id']."\"";}else{echo "placeholder=\"ex:1\"";}?> name="id" id="id_id" <?php if($_GET['action']=="update"){echo "readonly";} ?> required/>

        <label for="marque_id">Marque</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBiere::select($_GET['id'])->get("nom")."\"";}else{echo "placeholder=\"ex:Chouffe\"";} ?> name="marque" id="marque_id" required/>

        <label for="nom_id">Nom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBiere::select($_GET['id'])->get("nom")."\"";}else{echo "placeholder=\"ex:Soleil\"";} ?> name="nom" id="nom_id" required/>

        <label for="idBrasserie_id">ID de la Brasserie</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBiere::select($_GET['id'])->get("idBrasserie")."\"";}else{echo "placeholder=\"ex:5\"";} ?> name="idBrasserie" id="idBrasserie_id" required/>

        <label for="taux_id">Taux</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBiere::select($_GET['id'])->get("taux")."\"";}else{echo "placeholder=\"ex:7.5\"";} ?> name="taux" id="taux_id" required/>

        <label for="composition_id">Composition</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBiere::select($_GET['id'])->get("composition")."\"";}else{echo "placeholder=\"ex:houblon, malt\"";} ?> name="composition" id="composition_id" required/>

        <label for="montant_id">Montant</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBiere::select($_GET['id'])->get("montant")."\"";}else{echo "placeholder=\"ex:34.90\"";} ?> name="montant" id="montant_id" required/>

    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>