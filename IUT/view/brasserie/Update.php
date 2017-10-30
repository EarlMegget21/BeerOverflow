<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire</legend>
    <p>
        <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
        <input type='hidden' name='controller' value='Brasserie'>

        <label for="id_id">ID</label> : <!-- for permet de renvoyer vers la zone test ayant l'id indiqué en cliquant sur le label -->
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$_GET['id']."\"";}else{echo "placeholder=\"ex:1\"";}?> name="id" id="id_id" <?php if($_GET['action']=="update"){echo "readonly";} ?> required/>

        <label for="nom_id">Nom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelBrasserie::select($_GET['id'])->get("nom")."\"";}else{echo "placeholder=\"ex:Vanuxeem\"";} ?> name="nom" id="nom_id" required/>

        <label for="adresse_id">Adresse</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"". ModelBrasserie::select($_GET['id'])->get("adresse")."\"";}else{echo "placeholder=\"ex:Belgique\"";} ?> name="adresse" id="adresse_id" required/>

    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>