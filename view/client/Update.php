<form method="post" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Formulaire</legend>
    <p>
        <input type='hidden' name='action' value='<?php if($_GET['action']=="update"){echo "updated";}else{echo "created";}?>'> <!-- ajoute un input caché qui défini la variable GET action -->
        <input type='hidden' name='controller' value='Client'>

        <?php
            if($_GET['action']=="update"){
                echo "<input type=\"text\" value=\"".$_GET['login']."\" name=\"login\" id=\"login_id\" readonly/>";
                $tv=ModelClient::select(array('login'=>$_GET['login'])); $v=$tv[0];
            }else{
                echo "<input type=\"text\" placeholder=\"Ex:OutlawSpiritus\" name=\"login\" id=\"login_id\" required/>";

            }
        ?>

        <label for="email_id">Email</label>
        <input type="email" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("email")."\"";}else{echo "placeholder=\"ex:mail@gmail.com\"";} ?> name="email" id="email_id" required/>

        <label for="mdp_id">Mot de passe</label>
        <input type="password" placeholder="Ex:azerty" name="mdp" id="mdp_id" required/>

        <label for="mdp2_id">Confirmez mot de passe</label>
        <input type="password" placeholder="Ex:azerty" name="mdp2" id="mdp2_id" required/>

        <label for="nom_id">Nom</label>
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("nom")."\"";}else{echo "placeholder=\"ex:Smith\"";} ?> name="nom" id="nom_id" required/>

        <label for="prenom_id">Prenom</label>
        <input type="text" <?php if($_GET['action']=="update"){echo "value=\"".$v->get("prenom")."\"";}else{echo "placeholder=\"ex:Will\"";} ?> name="prenom" id="prenom_id" required/>


    </p>
      <p>
      <input type="submit" value="Creer Client" />
    </p>
  </fieldset> 
</form>