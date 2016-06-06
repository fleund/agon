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
            if (isset($_POST['detruire'])) {
                $req = $bdd->prepare('DELETE FROM appartenance WHERE id_g = :id_g');
                $req->execute(array('id_g' => $_GET['id']));
                $req = $bdd->prepare('DELETE FROM groupe WHERE id = :id');
                $req->execute(array('id' => $_GET['id']));
            }
            if (isset($_POST['quitter'])) {
                $req = $bdd->prepare('DELETE FROM appartenance WHERE id_g = :id_g AND id_i = :id_i');
                $req->execute(array(
                    'id_g' => $_GET['id'],
                    'id_i' => $_SESSION['id']
                ));
            }
            if (isset($_POST['inscrire'])) {
                $req = $bdd->prepare('INSERT INTO appartenance(id_g, id_i) VALUES (:id_g, :id_i)');
                $req->execute(array(
                    'id_g' => $_GET['id'],
                    'id_i' => $_SESSION['id']
                ));
            }
            $req = $bdd->prepare('SELECT * FROM groupe WHERE id = :id');
            $req->execute(array('id' => $_GET['id']));
            $donnees = $req->fetch(); // On récupère toutes les infos du groupe
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
        <?php
            if (!empty($_SESSION)) {
                $reponse = $bdd->prepare('SELECT * FROM appartenance WHERE id_g = :id_g AND id_i = :id_i');
                $reponse->execute(array(
                    'id_g' => $_GET['id'],
                    'id_i' => $_SESSION['id']
                    ));
                $donnees2 = $reponse->fetch();
                if (!empty($donnees2)) { // Si l'utilisateur est membre du groupe
                    if ($donnees['id_leader']==$_SESSION['id']) { // Si l'utilisateur est leader du groupe
                        echo '</br><strong>Vous êtes actuellement leader de ce groupe.</strong>';
                        echo '<button type="button" class="agrandir_bouton"><a href="edition_groupe.php?id=' . $_GET['id'] . '">Modifier les informations</a></button>';
                        echo '<form method="post" action="groupe.php?id=' . $_GET['id'] . '"><input type="submit" class="agrandir_bouton" value="Détruire ce groupe" name="detruire"></form>';
                    }
                    else {
                        echo '</br><strong>Vous êtes actuellement membre de ce groupe.</strong>';
                        echo '<form method="post" action="groupe.php?id=' . $_GET['id'] . '"><input type="submit" class="agrandir_bouton" value="Quitter ce groupe" name="quitter"></form>';
                    }
                }
                elseif ($donnees['statut']=='Public') { // Si l'utilisateur n'est pas membre du groupe, mais il s'agit d'un groupe public
                    echo '<form method="post" action="groupe.php?id=' . $_GET['id'] . '"><input type="submit" class="agrandir_bouton" value="S\'inscrire à ce groupe" name="inscrire"></form>';
                }
            }
        ?>
    </body>
</html>
