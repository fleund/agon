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
                echo '<div class="champ_connexion"><form method="post" action="Accueil.php">
                <input name="email" type="email" placeholder="Adresse e-mail"';
                if (isset($_POST['email'])) {echo ' value="' . $_POST['email'] . '"';}
                echo '><input name="mdp" type="password" placeholder="Mot de passe"></div>
                <div class="bouton_header"><input type="submit" name="connexion" value="Se connecter" class="bouton_accueil">
                </form></br><form method="POST" action="formulaire_inscription.php"><input id="inscription" type="submit" value="Inscription" /></form></div>';
            }
            else {
                echo '<div><a href="Profil.php?id=' . $_SESSION['id'] . '" class="pseudo_header">' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</a></div>';
				echo '<div><form method="POST" action="creation_groupe.php"><input id="creation_groupe" type="submit" value="Créer groupe"/></form></div>
                <div><form method="POST" action="Edition page d\'accueil.php"><input id="edition_acceuil" type="submit" value="Editer accueil"/></form></div>';
                echo '<form method="post" action="Accueil.php"><input type="submit" name="deconnexion" value="Déconnexion" id="deconnexion"></form>';
            }
        ?>
    </div>
    <div class="element"></div>
    <div class="element">
        <div id="onglets_accueil">
            <div><a href="Accueil.php">Accueil</a></div>
                <div><a href="index_forum.php">Forum</a></div>
                <div><a href="resultats_recherche.php?avancee=false&amp;groupe=oui">Groupes</a></div>
                <div><a href="faq.php">F.A.Q</a></div>
                <?php if (!empty($_SESSION)) {echo '<div><a href="">Mon espace</a></div>';} ?>
        </div>   
    </div>
    <div class="element"></div>
</div>
