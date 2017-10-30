<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire</legend>
    <p>
        <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
        <input type='hidden' name='controller' value='Client'>

        <label for="id_id">ID</label> : <!-- for permet de renvoyer vers la zone test ayant l'id indiqué en cliquant sur le label -->
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$_GET['id']."\"";}else{echo "placeholder=\"ex:1\"";}?> name="id" id="id_id" <?php if($_GET['action']=="update"){echo "readonly";} ?> required/>

        <label for="nom_id">Nom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelClient::select($_GET['id'])->get("nom")."\"";}else{echo "placeholder=\"ex:blonde\"";} ?> name="nom" id="nom_id" required/>

        <label for="prenom_id">Prenom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelClient::select($_GET['id'])->get("prenom")."\"";}else{echo "placeholder=\"ex:blonde\"";} ?> name="prenom" id="prenom_id" required/>


    </p>
      <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>