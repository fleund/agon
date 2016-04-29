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
            <input id="inscription" type="submit" value="inscription" />
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
                <li>ORGANISE TES COMPETITIONS</li>
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
        <div class="champ_recherche">
            <select name="sport" id="sport">
                <option value="Choisir un sport">Choisir un sport</option>
                <?php // Affichage de la liste déroulante des sports
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                    while ($donnees = $reponse->fetch()) {echo '<option value="sport">' . $donnees['nom'] . '</option>';}
                    $reponse->closeCursor();
                ?>
            </select>
            <select name="localisation" id="localisation">
                <option value="region">Choisir une région</option>
                <option value="region">Alsace-Champagne-Ardenne-Lorraine</option>
                <option value="region">Aquitaine-Limousin-Poitou-Charentes</option>
                <option value="region">Auvergne-Rhônes-Alpes</option>
                <option value="region">Bourgogne-Franche-Comté</option>
                <option value="region">Bretagne</option>
                <option value="region">Centre-Val de Loire</option>
                <option value="region">Ile-de-France</option>
                <option value="region">Languedoc-Roussillon-Midi-Pyrénées</option>
                <option value="region">Nord-Pas-de-Calais-Picardie</option>
                <option value="region">Normandie</option>
                <option value="region">PACA</option>
                <option value="region">Pays de la Loire</option> 
            </select><br/>
            <input id="search-btn" type="submit" value="Rechercher" />
        </div>
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
        <?php // Affichage de la liste des compétitions
            try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
            catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
            $reponse = $bdd->query('SELECT * FROM liste_compets ORDER BY ID');
            while ($donnees = $reponse->fetch()) {
                echo '<a href="" >' . $donnees['nom'] . '</a>&nbsp;';
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