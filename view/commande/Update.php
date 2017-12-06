<form method="get" action="../ProjetBiere/index.php">
    <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <h3>Formulaire</h3>
    <input type='hidden' name='action' value='<?php if ($_GET['action'] == "update") {
        echo "updated";
    } else {
        echo "created";
    } ?>'> <!-- ajoute un input caché qui défini la variable GET action -->
    <input type='hidden' name='controller' value='Commande'>

    <?php if ($_GET['action'] == "update") {
        echo "<input type=\"hidden\" value=\"" . $_GET['id'] . "\" name=\"id\" id=\"id_id\" readonly/>";
    } ?>

    <?php if ($_GET['action'] == "update") {
        $tv = ModelCommande::select(array('id' => $_GET['id']));
        $v = $tv[0];
    } ?>

    <label for="livraison_id">livraison</label> :
    <input type="checkbox" <?php if ($_GET['action'] == "update") {
        echo "value=\"" . $v->get("livraison") . "\"";
    } ?> name="livraison" id="livraison_id"/>

    <label for="login_id">ID du client</label> :
    <input type="text" <?php if ($_GET['action'] == "update") {
        echo "value=\"" . $v->get("login") . "\"";
    } else {
        echo "placeholder=\"ex:5\"";
    } ?> name="login" id="login_id" required/>

    <label for="date_id">Date</label> :
    <input type="text" <?php if ($_GET['action'] == "update") {
        echo "value=\"" . $v->get("date") . "\"";
    } else {
        echo "placeholder=\"ex:10/04/1995\"";
    } ?> name="date" id="date_id" required/>

    <input type="submit" class="submit" value="Submit"/>
</form>