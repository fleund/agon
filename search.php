<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Recherche Groupe</title>
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <form method="post" action="search.php" class="champ_recherche">
            <select name="critere1" id="critere1">
                <option>Choisir un sport</option>
                <?php // Affichage de la liste déroulante des sports
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                    while ($donnees = $reponse->fetch()) {
                        echo '<option';
                        if (isset($_POST['critere1'])) {
                            if ($donnees['nom']==$_POST['critere1']) {echo ' selected="selected"';}
                        }
                        echo '>' . $donnees['nom'] . '</option>';
                    }
                    $reponse->closeCursor();
                ?>
            </select>
            <select name="critere2" id="critere2">
                <option>Choisir un département</option>
                <?php // Affichage de la liste déroulante des départements
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->query('SELECT * FROM departement ORDER BY numero');
                    while ($donnees = $reponse->fetch()) {
                        echo '<option';
                        if (isset($_POST['critere2'])) {
                            if ($donnees['nom']==$_POST['critere2']) {echo ' selected="selected"';}
                        }
                        echo '>' . $donnees['nom'] . '</option>';
                    }
                    $reponse->closeCursor();
                ?>
            </select><br/>
            <input id="search-btn" type="submit" value="Rechercher" name="submit"/>           
        </form>

        <?php
            if (isset($_POST['critere1'])) {
                if (($_POST['critere1']=='Choisir un sport') AND ($_POST['critere2']=='Choisir un département')) {
                    echo "Veuillez renseigner un sport et/ou un département.";
                }
                else if (($_POST['critere1']!='Choisir un sport') AND ($_POST['critere2']=='Choisir un département')) {
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->prepare('SELECT id,nom_groupe FROM groupe WHERE sport = :tmp ORDER BY nom_groupe');
                    $reponse->execute(array('tmp' => $_POST['critere1']));
                    while ($donnees = $reponse->fetch()) {
                        $verif=True;
                        echo"<a href='search.php?id=" . $donnees['id'] . "'>" . $donnees['nom_groupe'] . "</a></br>";
                    }
                    if (!isset($verif)) {echo "Pas de résultat !";}
                }
                else if (($_POST['critere1']=='Choisir un sport') AND ($_POST['critere2']!='Choisir un département')) {
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->prepare('SELECT id,nom_groupe FROM groupe WHERE departement = :tmp ORDER BY nom_groupe');
                    $reponse->execute(array('tmp' => $_POST['critere2']));
                    while ($donnees = $reponse->fetch()) {
                        $verif=True;
                        echo"<a href='search.php?id=" . $donnees['id'] . "'>" . $donnees['nom_groupe'] . "</a></br>";
                    }
                    if (!isset($verif)) {echo "Pas de résultat !";}
                }
                else {
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->prepare('SELECT id,nom_groupe FROM groupe WHERE sport = :tmp1 AND departement = :tmp2 ORDER BY nom_groupe');
                    $reponse->execute(array(
                        'tmp1' => $_POST['critere1'],
                        'tmp2' => $_POST['critere2']
                        ));
                    while ($donnees = $reponse->fetch()) {
                        $verif=True;
                        echo"<a href='search.php?id=" . $donnees['id'] . "'>" . $donnees['nom_groupe'] . "</a></br>";
                    }
                    if (!isset($verif)) {echo "Pas de résultat !";}                    
                }
            }
        ?>
    </body>
</html>
