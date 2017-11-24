<form method="get" action="index.php"> <!-- action determine le fichier dans lequel on est redirigé avec les variables rentrées après Submit -->
    <fieldset>
        <legend>Formulaire:</legend>
        <p>
            <input type="hidden" name="action" value="searched"/>

            <label for="marque_id">Marque</label> :
            <input type="text" placeholder="ex:Chouffe" name="marque" id="marque_id"/>

            <label for="nom_id">Nom</label> :
            <input type="text" placeholder="ex:Soleil" name="nom" id="nom_id"/>

            <label for="nomBrasserie_id">Nom Brasserie</label> :
            <input type="text" placeholder="ex: Vanuxeem" name="nomBrasserie" id="nomBrasserie_id"/>

            <label for="taux_id">Taux</label> :
            <input type="text" placeholder="ex:7.5" name="taux" id="taux_id"/>

            <label for="composition_id">Composition</label> :
            <input type="text" placeholder="ex:houblon" name="composition" id="composition_id"/>

            <label for="montant_id">Prix Min</label> :
            <input type="number" value="0" name="montantMin" id="montant_id"/>

            <label for="montant_id">Prix Max</label> :
            <input type="number" value="100" name="montantMax" id="montant_id"/>

        </p>
        <p>
            <input type="submit" value="Submit" />
        </p>
    </fieldset>
</form>