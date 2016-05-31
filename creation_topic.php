<?php
    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Creation topic</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form method="post">
                <label for="nom_topic">Nom</label>
                <input type="text" name="nom_topic"/>
                <br/><label for="description_topic">Description</label>
                <input type="text" name='description_topic'>
                <br/><label for='sport'>Sport concern� </label>
                <select name="sport" class="critere">
                    <option value="">Choisir un sport</option>
                    <?php
                        $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                        while ($donnees = $reponse->fetch()) {
                            echo '<option';
                            if (isset($_POST['sport'])) {
                                if ($donnees['nom']==$_POST['sport']) {echo ' selected="selected"';}
                            }
                            echo '>' . $donnees['nom'] . '</option>';
                        }
                    ?>
                </select>
                <br/><input type="submit" />
            </form>
        </div>
        <?php
        if(isset($_POST['submit'])){
            $champ=array('nom_topic', 'description_topic', 'sport');
            include('champs_vides.php');
            if(!isset($vide)){
                for($i=0; $i<=count($champ)-1; $i++) 
                        {$pre_array[$champ[$i]] = $contenu[$champ[$i]];}
                $req = $bdd->prepare('INSERT INTO topic(nom_topic, description topic, sport) VALUES (:nom_topic, :description_topic, :sport)');
                $req->execute($pre_array);
                $reponse = $bdd->query('SELECT MAX(id) AS id FROM topic');
                $donnees = $reponse->fetch();
                header('Location : topic.php?id=' . $donnees['id']);
            }
            else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqu�s.</strong></br>';}
            }
        
        ?>
    </body>
</html>
