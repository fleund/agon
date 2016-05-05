<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Résultats de la recherche</title>
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <form method="post" action="search.php" class="champ_recherche">
            <select name="critere1" class="critere">
                <option value="">Choisir un sport</option>
                <?php // Affichage de la liste déroulante des sports
                    $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                    while ($donnees = $reponse->fetch()) {
                        echo '<option';
                        if (isset($_POST['critere1'])) {
                            if ($donnees['nom']==$_POST['critere1']) {echo ' selected="selected"';}
                        }
                        echo '>' . $donnees['nom'] . '</option>';
                    }
                ?>
            </select>
            <select name="critere2" class="critere">
                <option value="">Choisir un département</option>
                <?php // Affichage de la liste déroulante des départements
                    $reponse = $bdd->query('SELECT * FROM departement ORDER BY numero');
                    while ($donnees = $reponse->fetch()) {
                        echo '<option value="' . $donnees['nom'] . '"';
                        if (isset($_POST['critere2'])) {
                            if ($donnees['nom']==$_POST['critere2']) {echo ' selected="selected"';}
                        }
                        echo '>' . $donnees['numero'] . ' - ' . $donnees['nom'] . '</option>';
                    }
                ?>
            </select><br/>
            <input id="search-btn" type="submit" value="Rechercher" name="submit"/>           
        </form>

        <?php // Recherche et affichage des résultats
            if (isset($_POST['critere1'])) {
                echo '<table><caption>Résultats de la recherche</caption>
                    <tr>
                        <th>Nom du groupe</th>
                        <th>Sport pratiqué</th>
                        <th>Département</th>
                        <th>Nombre de membres</th>
                    </tr>';
                $reponse = $bdd->prepare('SELECT * FROM groupe WHERE sport LIKE :tmp1 AND departement LIKE :tmp2 ORDER BY nom');
                $reponse->execute(array(
                    'tmp1' => '%' . $_POST['critere1'] . '%',
                    'tmp2' => '%' . $_POST['critere2'] . '%'
                ));
                while ($donnees = $reponse->fetch()) {
                    $verif=True;
                    echo '<tr>'
                        . '<td><a href="">' . $donnees['nom'] . '</a></td>'
                        . '<td>' . $donnees['sport'] . '</td>'
                        . '<td>' . $donnees['departement'] . '</td>'
                        . '<td>' . $donnees['participants'] . '</td>'
                    . '</tr>';
                }
                echo '</table>';
                if (!isset($verif)) {echo "Pas de résultat !";}
            }
        ?>
    </body>
</html>
