<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire</legend>
    <p>
      <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
      <input type='hidden' name='controller' value='Commande'>
        
      <label for="id_id">ID</label> : <!-- for permet de renvoyer vers la zone test ayant l'id indiqué en cliquant sur le label -->
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$_GET['id']."\"";}else{echo "placeholder=\"ex:1\"";}?> name="id" id="id_id" <?php if($_GET['action']=="update"){echo "readonly";} ?> required/>

      <label for="livraison_id">livraison</label> :
      <input type="checkbox" <?php if($_GET['action']=="update"){echo "value=\"". ModelCommande::select($_GET['login'])->get("livraison")."\"";} ?> name="livraison" id="livraison_id" required/>

      <label for="idClient_id">ID du client</label> :
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"". ModelCommande::select($_GET['id'])->get("idClient")."\"";}else{echo "placeholder=\"ex:5\"";} ?> name="idClient" id="idClient_id" required/>

      <label for="date_id">Date</label> :
      <input type="text" <?php if($_GET['action']=="update"){echo "value=\"". ModelCommande::select($_GET['id'])->get("date")."\"";}else{echo "placeholder=\"ex:10/04/1995\"";} ?> name="date" id="date_id" required/>

    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>