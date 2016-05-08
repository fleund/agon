<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <title>Création d'une compétition</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <form action="creation_compet.php" method="post" class="champ_recherche">
            <p>Nom de la compétition : <input type="text" name="nom" class="l300"></p>
            <p>Sport principal : <?php include('liste_sports.php') ?></p>
            <p>Date : <?php include('entrer_date.php') ?></p>
            <p>Lieu : <textarea name="lieu" maxlength="100" rows="3" placeholder="Exemple : Club de Football de Versailles, Gymnase Saint-Germain Paris 6è..." class="l300"></textarea></p>
            <p>Département : <?php include('liste_departements.php') ?></p>
            <p>Nombre de places total : <input type="number" name="places" maxlength="6"></p>
            <input id="search-btn" type="submit" value="Créer la compétition" name="submit"> 
        </form>
        <?php
            if(isset($_POST['nom'])) {
                $groupe='groupe'; // En attendant qu'on aie des vrais groupes créés
                $req = $bdd->prepare('INSERT INTO liste_compets(nom, sport, date, lieu, departement, groupe, places_total, inscrits) VALUES(:nom, :sport, :date, :lieu, :departement, :groupe, :places_total, 0)');
                $req->execute(array(
                    'nom' => $_POST['nom'],
                    'sport' => $_POST['sport'],
                    'date' => $date,
                    'lieu' => $_POST['lieu'],
                    'departement' => $_POST['departement'],
                    'groupe' => $groupe,
                    'places_total' => $_POST['places'],
                ));
                echo 'La compétition a été créée.';
            }
        ?>
    </body>
</html>
