<!DOCTYPE html>

<html>
    <head>
        <title>Groupe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <?php
            include ('bdd.php');
            include('header.php');
            $req = $bdd->prepare('SELECT * FROM groupe WHERE id = :id');
            $req->execute(array('id' => $_GET['id']));
            $donnees = $req->fetch();
        ?>
        <div id="barre_bleue_gauche"></div>
        <div id="barre_bleue_droite"></div>
        <div id="barre_mauve_gauche"></div>
        <div id="barre_mauve_droite"></div>
        <div class="titremarge"><h1>Groupe : <?php echo $donnees['nom']; ?></h1></div>
        <div class="marge"><img src=<?php echo $donnees['image'];?> alt="Profil" title=<?php echo 'image_profil_' . $donnees['nom']; ?>></div>
        <div class="bordure">
            <h2>Informations</h2>
            <ul>
                <li>Statut : <?php echo $donnees['statut']; ?></li></br>
                <li>Description : <?php echo $donnees['description']; ?></li></br>
                <li>Nombre maximum de membres : <?php echo $donnees['membres_max']; ?></li></br>
                <li>Sport : <?php echo $donnees['sport']; ?></li></br>
                <li>Département : <?php echo $donnees['departement']; ?></li></br>
            </ul>
        </div>
        <?php // Si l'utilisateur est le leader du groupe, il peut modifier les informations
            if ($donnees['id_leader']==$_SESSION['id']) {echo '<button type="button" class="agrandir_bouton"><a href="edition_groupe.php?id=' . $_GET['id'] . '">Modifier les informations</a></button>';}
        ?>
    </body>
</html>
