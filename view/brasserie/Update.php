<form method="get" action="../e-commerce/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Formulaire</h3>
        <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
        <input type='hidden' name='controller' value='Brasserie'>

        <?php if($_GET['action']=="update"){echo "<input type=\"hidden\" value=\"".$_GET['id']."\" name=\"id\" id=\"id_id\" readonly/>";} ?>

        <?php if($_GET['action']=="update"){$tv=ModelBrasserie::select(array('id'=>$_GET['id'])); $v=$tv[0];} ?>

        <label for="nom_id">Nom *</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("nom")."\"";}else{echo "placeholder=\"ex:Vanuxeem\"";} ?> name="nom" id="nom_id" required/>

        <label for="adresse_id">Pays *</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("adresse")."\"";}else{echo "placeholder=\"ex:Belgique\"";} ?> name="adresse" id="adresse_id" required/>

      <input type="submit" class="submit" value="Submit" />
      <p>Les champs marqués d'une * sont obligatoires</p>
</form>
