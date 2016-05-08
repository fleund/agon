<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <title>Création d'un groupe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <ul>
            <a href="index.html">Accueil</a>
            <a href="forum.html">Forum</a>
            <a href="groupe.html">Groupe</a>
            <a href="mon_espace.html">Mon espace</a>
            <a href="deconnexion.html">Deconnexion</a>
        </ul></br>
        
        <form action="creation_groupe.php" method="post" class="champ_recherche">
            <p>Nom du groupe : <input type="text" name="nom" class="l300"></p>
            <p>Description (facultatif) :</br><textarea name="description" rows="8" maxlength="1000" class="l300" placeholder="Décrivez votre groupe ici..."></textarea></p>
            <p>Sport principal : <?php include('liste_sports.php') ?></p>
            <p>Statut : </br>
                <select name='statut'>
                    <option>Public</option>
                    <option>Privé</option>
                </select>
            </p>
            <p>Département : <?php include('liste_departements.php') ?></p>
            <p>Image du groupe : <input type="text" name="image"></br><a href='http://www.hostingpics.net/' target="_blank">Lien vers un uploader de photos</a></p>
            <p>Nombre maximum de membres : <input type="number" min="5" max="200" value="100" name="membres_max" maxlength="3"></p>
            <input id="search-btn" type="submit" value="Créer la compétition" name="submit"> 
        </form>
        <?php
            if(isset($_POST['nom'])) {
                $req = $bdd->prepare('INSERT INTO groupe(nom, description, sport, statut, departement, image, membres, membres_max) VALUES(:nom, :description, :sport, :statut, :departement, :image, 1, :membres_max)');
                $req->execute(array(
                    'nom' => $_POST['nom'],
                    'description' => $_POST['description'],
                    'sport' => $_POST['sport'],
                    'statut' => $_POST['statut'],
                    'departement' => $_POST['departement'],
                    'image' => $_POST['image'],
                    'membres_max' => $_POST['membres_max']
                ));
                echo 'Le groupe a été créé.';
            }
        ?>
    </body>
</html>
