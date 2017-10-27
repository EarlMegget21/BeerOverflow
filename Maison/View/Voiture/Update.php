<form method="get" action="../TD2/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>My form:</legend>
    <p>
      <input type='hidden' name='action' value="<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>"> <!-- ajoute un input caché qui défini la variable GET action -->
        
      <label for="immat_id">License Number</label> : <!-- for permet de renvoyer vers la zone test ayant l'id indiqué en cliquant sur le label -->
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$_GET['immatriculation']."\"";}else{echo "placeholder=\"ex:12345\"";}?> name="immatriculation" id="immat_id" <?php if($_GET['action']=="update"){echo "readonly";} ?> required/>

      <label for="marque_id">Make</label> :
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelVoiture::select($_GET['immatriculation'])->getMarque()."\"";}else{echo "placeholder=\"ex:BMW\"";} ?> name="marque" id="marque_id" required/>

      <label for="color_id">Color</label> :
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".ModelVoiture::select($_GET['immatriculation'])->getCouleur()."\"";}else{echo "placeholder=\"ex:noir\"";} ?> name="couleur" id="couleur_id" required/>

    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>