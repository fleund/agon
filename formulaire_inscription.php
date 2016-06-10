<!DOCTYPE html>

<?php
  include('bdd.php');
  if (isset($_SESSION['id'])) {header('Location: Accueil.php');}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Accueil.css">
        <title>Inscription</title>
    </head>

    <body>
        <div id="content">
          <?php
            include('header.php');
            $champ=array('nom', 'prenom', 'email', 'mdp', 'confirmation', 'sport');
            $label=array('Nom', 'Prénom', 'Adresse e-mail', 'Mot de passe', 'Confirmer le mot de passe');
            $type=array('text', 'text', 'text', 'password', 'password');
            if (isset($_POST['submit'])) {
              include('champs_vides.php');
              if (!isset($vide)) {
                if ($contenu['mdp']==$contenu['confirmation']) {
                  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $req = $bdd->prepare('INSERT INTO inscrit(nom, prenom, date_naissance, sexe, departement, email, mdp, sport, date_inscription, num_tel) VALUES(:nom, :prenom, :date_naissance, :sexe, :departement, :email, :mdp, :sport, :date_inscription, 0)'); // On inscrit le membre
                    $req->execute(array(
                    'nom' => $contenu['nom'],
                    'prenom' => $contenu['prenom'],
                    'date_naissance' => '1900-01-01', // Date par défaut
                    'sexe' => '',
                    'departement' => '',
                    'email' => $contenu['email'],
                    'mdp' => md5($contenu['mdp']),
                    'sport' => $contenu['sport'],
                    'date_inscription' => date('Y-m-d')
                    ));
                    $_SESSION['nom']=$contenu['nom'];
                    $_SESSION['prenom']=$contenu['prenom'];
                    $req = $bdd->prepare('UPDATE liste_sports SET nb_membres=nb_membres+1 WHERE nom=:nom'); // On incrémente le nombre de gens qui pratiquent ce sport
                    $req->execute(array('nom' => $_POST['sport']));
                    $reponse = $bdd->query('SELECT MAX(id) AS id FROM inscrit');
                    $donnees = $reponse->fetch();
                    $_SESSION['id']=$donnees['id'];
                    header('Location: Profil.php?id=' . $_SESSION['id']);;
                  }
                  else {echo '<strong class="erreur">Veuillez saisir une adresse mail valide.</strong></br>';}
                }
                else {echo '<strong class="erreur">Les deux mots de passe doivent être identiques.</strong></br>';}
              }
              else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            }
            echo '<legend class="titre_creer_compte">Créer un compte</legend>
            <div id="conteneur_groupe">
            <form method="post"><div class="champ_inscription">'; // Affichage du formulaire d'inscription
            for($i=0; $i<=4; $i++) {
              echo '<label for = "' . $champ[$i] . '">' . $label[$i] . ' : </label></br>
              &nbsp;&nbsp;&nbsp;<input type="' . $type[$i] . '" name="' . $champ[$i] . '" id="' . $champ[$i] . '"';
              if (isset($contenu[$champ[$i]])) {echo 'value="' . $contenu[$champ[$i]] . '" ';}
              echo 'maxlength ="50"></br></br>';
            }
            echo 'Sport pratiqué :</br>';
            include('liste_sports.php');
            echo '</br></br><input type="submit" value="Valider" name="submit" class="agrandir_bouton">
            </form></div>
            </div>';
          ?>
        </div>
    </body>
</html>
