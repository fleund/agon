<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <title>Création d'une compétition</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <?php
            if(isset($_POST['submit'])) {
                $champ=array('nom', 'sport', 'lieu', 'departement', 'places', 'jour', 'mois', 'annee');
                include('champs_vides.php');
                if (!isset($vide)) {
                    $pre_array=array('groupe'=>'groupe', 'date'=>$contenu['annee'] . '-' . $contenu['mois'] . '-' . $contenu['jour']); // En attendant qu'on ait des vrais groupes créés
                    for ($i=0; $i<=4; $i++) {$pre_array[$champ[$i]]=$contenu[$champ[$i]];}
                    $req = $bdd->prepare('INSERT INTO liste_compets(nom, sport, date, lieu, departement, groupe, places_total, inscrits) VALUES(:nom, :sport, :date, :lieu, :departement, :groupe, :places_total, 0)');
                    $req->execute($pre_array);
                    $reponse = $bdd->query('SELECT MAX(id) AS id FROM liste_compets');
                    $donnees = $reponse->fetch();
                    header('Location: événement.php?id=' . $donnees['id']);
                }
                else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            }
        ?>
        <form action="creation_compet.php" method="post" class="champ_recherche">
            <p>Nom de la compétition : <input type="text" name="nom" class="l300" <?php if (isset($contenu['nom'])) {echo ' value="' . $contenu['nom'] . '" ';} ?>></p>
            <p>Sport principal : <?php include('liste_sports.php') ?></p>
            <p>Date : <?php include('entrer_date.php') ?></p>
            <p>Lieu : <textarea name="lieu" maxlength="100" rows="3" placeholder="Exemple : Club de Football de Versailles, Gymnase Saint-Germain Paris 6è..." class="l300"><?php if (isset($contenu['lieu'])) {echo $contenu['lieu'];} ?></textarea></p>
            <p>Département : <?php include('liste_departements.php') ?></p>
            <p>Nombre de places total : <input type="number" name="places" maxlength="6" <?php if (isset($contenu['places'])) {echo ' value="' . $contenu['places'] . '" ';} ?>></p>
            <input id="search-btn" type="submit" value="Créer la compétition" name="submit"> 
        </form>
    </body>
</html>
