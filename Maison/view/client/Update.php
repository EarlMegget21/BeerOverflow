<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire</legend>
    <p>
        <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
        <input type='hidden' name='controller' value='Client'>

        <?php if($_GET['action']=="update"){echo "<input type=\"hidden\" value=\"".$_GET['id']."\" name=\"id\" id=\"id_id\" readonly/>";} ?>

        <?php if($_GET['action']=="update"){$tv=ModelClient::select(array('id'=>$_GET['id'])); $v=$tv[0];} ?>

        <label for="nom_id">Nom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("nom")."\"";}else{echo "placeholder=\"ex:Smith\"";} ?> name="nom" id="nom_id" required/>

        <label for="prenom_id">Prenom</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("prenom")."\"";}else{echo "placeholder=\"ex:Will\"";} ?> name="prenom" id="prenom_id" required/>


    </p>
      <p>
      <input type="submit" value="Submit" />
    </p>
  </fieldset> 
</form>