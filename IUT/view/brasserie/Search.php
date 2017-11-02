<form method="get" action="index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <fieldset>
        <legend>Formulaire:</legend>
        <p>
            <input type="hidden" name="action" value="searched"/>
            <input type="hidden" name="controller" value="brasserie"/>

            <label for="nom_id">Nom</label> :
            <input type="text" placeholder="ex:Les 3 Brasseurs" name="nom" id="nom_id"/>

            <label for="adresse_id">Adresse</label> :
            <input type="text" value="Montpellier" name="adresse" id="adresse_id"/>

        </p>
        <p>
            <input type="submit" value="Submit" />
        </p>
    </fieldset>
</form>