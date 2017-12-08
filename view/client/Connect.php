<form method="get" id="signin" action="../projetbiere/index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
  <h3>Connexion:</h3>
    <input type='hidden' name='action' value='connected'>
    <input type='hidden' name='controller' value='client'>
      
    <label for="login_id">Login</label>
    <input type="text" name="login" id="login_id" required/>

    <label for="mdp_id">Mot de passe</label>
    <input type="password" name="mdp" id="mdp_id" required/>

    <input class="submit" type="submit" value="Se Connecter" />
</form>