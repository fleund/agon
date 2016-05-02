<!DOCTYPE html>
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
            <input id="connexion" type="submit" value="Connexion" />
            <input id="inscription" type="submit" value="Inscription" />
	    </div>
        <div class="element">
            <div id="onglets_accueil">
                <div><a href="Accueil.php">Accueil</a></div>
                <div><a href="Index des forums.php">Forums</a></div>
                <div><a href="">Groupes</a></div> 
                <div><a href="">Mon espace</a></div>
            </div>   
	    </div>
        <div class="element">
            <ul class="message_important">
                SPORTIFS DE TOUS LES JOURS, VENEZ !
                <li>FORME TON GROUPE</li>
                <li>ENTRAÎNE-TOI</li>
                <li>ORGANISE TES COMPÉTITIONS</li>
            </ul>
        </div>
        <div class="sports_en_tete">
            <?php // Affichage des sports en en-tête
                try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                $reponse = $bdd->query('SELECT * FROM sports_en_tete ORDER BY ID');
                while ($donnees = $reponse->fetch()) {
                    echo '<a href="" >' . $donnees['nom'] . '</a>&nbsp;';
                }
                $reponse->closeCursor();
            ?>
        </div>
        
        <?php include('search.php'); // Page de recherche & résultats de recherche ?> 

    </div>
    <div id='bloc_galerie'>
        <div id="galerie">
            <img src="tn_Jogger1.jpg" alt='image1' class="active"/>
            <img src="tn_Jogger2.jpg" alt='image2'/>
        </div>
        <?php
            try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
            catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
            $reponse = $bdd->query('SELECT * FROM liste_photos ORDER BY ID');
            while ($donnees = $reponse->fetch()) {
                if ($donnees['nom']!='') {
                    echo '<img src="uploads/' . $donnees['nom'] . '"title="' . $donnees['nom'] . '" id="photo' . $donnees['ID'] . '">';
                }
            }
            $reponse->closeCursor();
        ?>
    </div>
    <div class="liste_compets">
        <?php // Affichage de la liste des compétitions, A COMPLETER
            try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
            catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
            $reponse = $bdd->query('SELECT * FROM liste_compets ORDER BY places_restantes');
            while ($donnees = $reponse->fetch()) {
                echo $donnees['nom'] . $donnees['sport'] . $donnees['groupe'] . $donnees['lieu'] . $donnees['date'] . $donnees['places_restantes'] . '</br>';
            }
            $reponse->closeCursor();
        ?>
    </div>
    
    <footer>
        <p>Partage la page sur</p>
        <a href="www.facebook.com"><img src="tn_facebook.png" alt='rien'/></a>
        <a href="www.twitter.com"><img src="tn_twitter.png" alt='rien'/></a>
    </footer>
    
    <script src="jquery.js"></script>
    <script src="func.js"></script>

    </body>
</html>
