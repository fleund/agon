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
        
        <?php
        //var_dump($_POST);
        echo '<a href="index.php"> Retourner à l\'index </a> ';
        
        if(isset($_POST['submit'])){
            
            $champ=array('nom_topic', 'description_topic', 'sport', 'prenom_auteur', 'nom_auteur', 'message');
            include('champs_vides.php');
            if(!isset($vide)){
                for($i=0; $i<=count($champ)-1; $i++) 
                        {$pre_array[$champ[$i]] = $contenu[$champ[$i]];}
                $req = $bdd->prepare('INSERT INTO topic(nom_topic, description_topic, sport, prenom_auteur, nom_auteur, message) VALUES (:nom_topic, :description_topic, :sport, :prenom_auteur, :nom_auteur, :message)');
                var_dump($req);
                $req->execute($pre_array);
                $reponse = $bdd->query('SELECT MAX(id_topic) AS id FROM topic');
                $donnees = $reponse->fetch();
                header('Location : topic.php?id=' . $donnees['id']);
                $requete = $bdd->query('SELECT * FROM topic');
                $result = $requete->fetchAll();
                var_dump($result);
                
            }
            else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            }
        
        ?>
        <div>
            <form method="post">
                <label for="nom_topic">Nom</label>
                <input type="text" name="nom_topic"/>
                <br/><label for="description_topic">Description</label>
                <input type="text" name='description_topic'>
                <br/><label for="prenom_auteur">Prenom de l'auteur</label>
                <input type="text" name='prenom_auteur'>
                <br/><label for='nom_auteur'>Nom de l'auteur</label>
                <input type='text' name='nom_auteur'>
                <br/><label for='sport'>Sport concerné </label>
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
                <br/><label for='message'>Message</label>
                <input type='text' name='message'>
                <br/><input type="submit" value="Créer le topic" name="submit" />
            </form>
        </div>
    </body>
</html>
