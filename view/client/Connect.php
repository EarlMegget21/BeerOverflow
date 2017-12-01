<form method="get" action="../ProjetBiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <fieldset>
    <legend>Connexion:</legend>
    <p>
      <input type='hidden' name='action' value='connected'>
      <input type='hidden' name='controller' value='client'>
        
      <label for="login_id">Login</label>
      <input type="text" name="login" id="login_id" required/>

      <label for="mdp_id">Mot de passe</label>
      <input type="password" name="mdp" id="mdp_id" required/>
    </p>
    <p>
      <input type="submit" value="Se Connecter" />
    </p>
  </fieldset> 
</form>