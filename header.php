<div id="header">
    <div class="element"><img class="Logo" src="Logo.png" alt="Logo Agon"></div>
    <div class="element">
        <?php
            if (isset($_POST['connexion'])) {
                $champ=array('email', 'mdp');
                include('champs_vides.php');
                if (!isset($vide)) {
                    $reponse = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND mdp = :mdp');
                    $reponse->execute(array(
                        'email' => $_POST['email'],
                        'mdp' => $_POST['mdp']
                    ));
                    $donnees = $reponse->fetch();
                    if (!empty($donnees)) {
                        $_SESSION['prenom']=$donnees['prenom'];
                        $_SESSION['nom']=$donnees['nom'];
                        $_SESSION['id']=$donnees['id'];
                    }
                    else {echo '<strong class="erreur">L\'adresse e-mail ou le mot de passe est invalide.</strong>';}
                }
                else {echo '<strong class="erreur">Veuillez renseigner une adresse e-mail et un mot de passe.</strong>';}
            }
            if (empty($_SESSION)) {
                echo '<form method="post" action="Accueil.php">
                <input name="email" type="email" placeholder="Adresse e-mail"';
                if (isset($_POST['email'])) {echo ' value="' . $_POST['email'] . '"';}
                echo '><input name="mdp" type="password" placeholder="Mot de passe">
                <input type="submit" name="connexion" value="Se connecter" class="bouton_accueil">
                </form><div><a href="formulaire_inscription.php" class="bouton_accueil">S\'inscrire</a></div>';
            }
            else {
                echo '<div><a href="creation_groupe.php" class="bouton_accueil">Créer un groupe</a></div>
                <div><a href="Edition page d\'accueil.php" class="bouton_accueil">Édition de la page d\'accueil</a></div>';
                echo '<div><a href="Profil.php?id=' . $_SESSION['id'] . '" class="bouton_accueil">' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</a></div>';
                echo '<form method="post" action="Accueil.php"><input type="submit" name="deconnexion" value="Déconnexion" class="bouton_accueil"></form>';
            }
        ?>
    </div>
    <div class="element"></div>
    <div class="element">
        <div id="onglets_accueil">
            <div><a href="Accueil.php">Accueil</a></div>
                <div><a href="Index des forums.php">Forum</a></div>
                <div><a href="resultats_recherche.php?avancee=false&amp;groupe=oui">Groupes</a></div>
                <?php if (!empty($_SESSION)) {echo '<div><a href="">Mon espace</a></div>';} ?>
        </div>   
    </div>
    <div class="element"></div>
</div>
