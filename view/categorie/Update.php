<form method="get" action="../e-commerce/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Formulaire</h3>
        <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
        <input type='hidden' name='controller' value='Categorie'>

        <?php if($_GET['action']=="update"){echo "<input type=\"hidden\" value=\"".$_GET['id']."\" name=\"id\" id=\"id_id\" readonly/>";} ?>

        <?php if($_GET['action']=="update"){$tv=ModelCategorie::select(array('id'=>$_GET['id'])); $v=$tv[0];} ?>

        <label for="nom_id">Nom *</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("nom")."\"";}else{echo "placeholder=\"ex:blonde\"";} ?> name="nom" id="nom_id" required/>

        <label for="specifications_id">Caractéristiques *</label> :
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"". $v->get("specifications")."\"";}else{echo "placeholder=\"ex:couleur claire, etc\"";} ?> name="specifications" id="specifications_id" required/>

      <input type="submit" class="submit" value="Submit" />
      <p>Les champs marqués d'une * sont obligatoires</p>
</form>
