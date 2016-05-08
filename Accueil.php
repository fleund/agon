<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <title>Agon - Accueil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css">
    </head>
    
    <body>
    <div id="conteneur">
        <div class="element">
            <img class="Logo" src="Logo.png" alt="Logo Agon" />
        </div>
        <div class="element">
            <a href="creation_groupe.php" class="bouton">Créer un groupe</a>
            <a href="Edition page d'accueil.php" class="bouton">Édition de la page d'accueil</a>
            <input id="connexion" type="submit" value="Connexion" />
            <input id="inscription" type="submit" value="Inscription" />
	    </div>
		<div class="element">    
        </div>
        <div class="element">
            <div id="onglets_accueil">
                <div><a href="Accueil.php">Accueil</a></div>
                <div><a href="Index des forums.php">Forum</a></div>
                <div><a href="">Groupes</a></div> 
                <div><a href="">Mon espace</a></div>
            </div>   
	    </div>
		<div class="element">    
        </div>
        <div class="element">
                <p class="message_important"> SPORTIFS DE TOUS LES JOURS, VENEZ !</p>
                <li>FORME TON GROUPE</li>
                <li>ENTRAÎNE-TOI</li>
                <li>ORGANISE TES COMPÉTITIONS</li>    
        </div>
        <div class="sports_en_tete">
            <?php // Affichage des sports en en-tête
                $reponse = $bdd->query('SELECT * FROM sports_en_tete ORDER BY ID');
                while ($donnees = $reponse->fetch()) {
                    echo '<a href="resultats_recherche.php?sport=' . $donnees['nom'] . '">' . $donnees['nom'] . '</a>&nbsp;';
                }
            ?>
        </div>
        
        <?php include('search.php'); ?> 

    </div>
    <div id='bloc_galerie'>
        <div id="galerie">
        <img src="tn_Jogger1.jpg" alt="image1" class="active">
        <img src="tn_Jogger2.jpg" alt="image2">
        <?php // Affichage du roulement de photos
            $reponse = $bdd->query('SELECT * FROM liste_photos ORDER BY ID');
            while ($donnees = $reponse->fetch()) {
                if ($donnees['nom']!='') {
                    echo '<img src="uploads/' . $donnees['nom'] . '"title="' . $donnees['nom'] . '" id="photo' . $donnees['ID'] . '">';
                }
            }
        ?>
        </div>
    </div>
    </br></br>
    <table class="liste_compets">
        <caption>Compétitions à venir</caption></br>
        <tr>
            <th>Nom</th>
            <th>Sport</th>
            <th>Groupe organisateur</th>
            <th>Département</th>
            <th>Date</th>
            <th>Inscrits</th>
            <th>Places restantes</th>
        </tr>
        <?php // Affichage du tableau des compétitions
            $reponse = $bdd->query('SELECT nom, sport, groupe, departement, places_total, inscrits, DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee FROM liste_compets ORDER BY inscrits DESC LIMIT 0,10');
            while ($donnees = $reponse->fetch()) {
                $verif=True;
                $places_restantes=$donnees['places_total']-$donnees['inscrits'];
                echo '<tr>'
                    . '<td><a href="">' . $donnees['nom'] . '</a></td>'
                    . '<td>' . $donnees['sport'] . '</td>'
                    . '<td>' . $donnees['groupe'] . '</td>'
                    . '<td>' . $donnees['departement'] . '</td>'
                    . '<td>' . $donnees['jour'] . ' / ' . $donnees['mois'] . ' / ' . $donnees['annee'] . '</td>'
                    . '<td>' . $donnees['inscrits'] . '</td>'
                    . '<td>' . $places_restantes . '</td>'
                . '</tr>';
                }
            if (!isset($verif)) {echo '<tr><td style="border: none;">Pas de compétitions à afficher.</td></tr>';}
        ?>
    </table>
    
    <footer>
        <p>Partage la page sur</p>
        <a href="http://www.facebook.com"><img src="tn_facebook.png"></a>
        <a href="http://www.twitter.com"><img src="tn_twitter.png"></a>
    </footer>
    
    <script src="jquery.js"></script>
    <script src="func.js"></script>

    </body>
</html>
