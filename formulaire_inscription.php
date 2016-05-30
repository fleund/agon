<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="accueil.css">
        <title>Inscription</title>
    </head>

    <body>
        <?php
          $champ=array('nom', 'prenom', 'email', 'mdp', 'confirmation', 'sport');
          $label=array('Nom', 'Prénom', 'Adresse e-mail', 'Mot de passe', 'Confirmer le mot de passe');
          $type=array('text', 'text', 'email', 'password', 'password');
          if (isset($_POST['submit'])) {
            include('champs_vides.php');
            if (!isset($vide)) {
              if ($contenu['mdp']==$contenu['confirmation']) { // On vérifie que le mdp et sa confirmation sont identiques
                $req = $bdd->prepare('INSERT INTO inscrit(nom, prenom, date_naissance, sexe, departement, email, mdp, sport) VALUES(:nom, :prenom, :date_naissance, :sexe, :departement, :email, :mdp, :sport)'); // On inscrit le membre
                $req->execute(array(
                  'nom' => $contenu['nom'],
                  'prenom' => $contenu['prenom'],
                  'date_naissance' => '1900-01-01', // Date par défaut
                  'sexe' => '',
                  'departement' => '',
                  'email' => $contenu['email'],
                  'mdp' => $contenu['mdp'],
                  'sport' => $contenu['sport']
                ));
                $req = $bdd->prepare('UPDATE liste_sports SET nb_membres=nb_membres+1 WHERE nom=:nom'); // On incrémente le nombre de gens qui pratiquent ce sport
                $req->execute(array('nom' => $_POST['sport']));
                $reponse = $bdd->query('SELECT MAX(id) AS id FROM inscrit');
                $donnees = $reponse->fetch();
                header('Location: Profil.php?id=' . $donnees['id']);
              }
              else {echo '<strong class="erreur">Les deux mots de passe doivent être identiques.</strong></br>';}
            }
            else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
          }
          echo '<h1 class="titre">Créer un compte</h1>
          <form method="post" action="formulaire_inscription.php"><div class="conteneur">'; // Affichage du formulaire d'inscription
          for($i=0; $i<=4; $i++) {
            echo '<label for = "' . $champ[$i] . '">' . $label[$i] . ' : </label></br>
            <input type="' . $type[$i] . '" name="' . $champ[$i] . '" id="' . $champ[$i] . '"';
            if (isset($contenu[$champ[$i]])) {echo 'value="' . $contenu[$champ[$i]] . '" ';}
            echo 'maxlength ="50"></br></br>';
          }
          echo 'Sport pratiqué :</br>';
          include('liste_sports.php');
          echo '</br></br><input type="submit" value="Valider" name="submit" class="agrandir_bouton">
          </form></div>';
        ?>
    </body>
</html>
