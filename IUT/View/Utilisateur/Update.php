<form method="get" action="../TD2/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>My form:</legend>
    <p>
      <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
      <input type='hidden' name='controller' value='utilisateur'>
        
      <label for="login_id">Login</label> : <!-- for permet de renvoyer vers la zone test ayant l'id indiqué en cliquant sur le label -->
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$_GET['login']."\"";}else{echo "placeholder=\"ex:FreshPrince\"";}?> name="login" id="login_id" <?php if($_GET['action']=="update"){echo "readonly";} ?> required/>

      <label for="nom_id">Nom</label> :
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"". ModelUtilisateur::select($_GET['login'])->getNom()."\"";}else{echo "placeholder=\"ex:Smith\"";} ?> name="nom" id="nom_id" required/>

      <label for="prenom_id">Prenom</label> :
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"". ModelUtilisateur::select($_GET['login'])->getPrenom()."\"";}else{echo "placeholder=\"ex:Will\"";} ?> name="prenom" id="prenom_id" required/>

    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>