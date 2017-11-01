<?php
    echo "Commande "
        .htmlspecialchars($v->get("id"))
        ." du client ".htmlspecialchars($v->get("idClient"))
        .", livraison ";
    if(htmlspecialchars($v->get("livraison"))==1){
        echo "Oui";
    }else{
        echo "Non";
    }
    echo ", le ".htmlspecialchars($v->get("date"))
        ." <a href=http://localhost/projetbiere/index.php?action=update&controller=Commande&id="
        .rawurlencode($v->get("id"))
        .">Modifier Commande</a> <a href=http://localhost/projetbiere/index.php?action=delete&controller=Commande&id="
        .rawurlencode($v->get("id"))
        .">Supprimer Commande</a> <br> Contenu: <br>";
?>
    <form method="get" action="../ProjetBiere/index.php">
        <input type='hidden' name='action' value="created"/>
        <input type='hidden' name='controller' value='achat'/>
        <input type='hidden' name='idCommande' value='<?php echo $v->get("id"); ?>'>
        <input type="text" placeholder="ID de la Bière" name='idBiere' id="idBiere_id" required/>
        <input type="text" placeholder="Quantité" name='quantite' id="quantite_id" required/>
        <input type="submit" value="Ajouter Achat" />
    </form>
<?php
    if($tab_a) {
        foreach ($tab_a as $a) {
            echo "Bière " . $a->get("idBiere") . " en quantité " . $a->get("quantite")
            ."<a href=http://localhost/projetbiere/index.php?action=delete&controller=achat&idBiere="
            .$a->get("idBiere")
            ."&idCommande="
            .htmlspecialchars($v->get("id"))
            .">Supprimer Biere</a> <br>";
        }
    }
?>