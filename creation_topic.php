<?php
    include('bdd.php');
    session_start();
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
        <link rel="stylesheet" href="Accueil.css">
    </head>
    <body>
        
        
        <?php
        include('header.php');
        ?>
        <div id="content"></div>
        <?php
        //var_dump($_POST);
        
        if(isset($_POST['submit']))
            {
            
            $champ=array('nom_topic', 'description_topic', 'sport', 'premier_message');
            include('champs_vides.php');
            if(!isset($vide))
                {
                for($i=0; $i<=count($champ)-1; $i++) 
                        {
                    $pre_array[$champ[$i]] = $contenu[$champ[$i]];
                    
                        }
                $req = $bdd->prepare('INSERT INTO topic(nom_topic, description_topic, sport, prenom_auteur, nom_auteur, premier_message, id_auteur) VALUES (:nom_topic, :description_topic, :sport, :prenom_auteur, :nom_auteur, :premier_message, :id_auteur)');
                $req->execute(array(
                    'nom_topic'=>$_POST['nom_topic'],
                    'description_topic'=>$_POST['description_topic'],
                    'sport'=>$_POST['sport'],
                    'prenom_auteur'=>$_SESSION['prenom'],
                    'nom_auteur'=>$_SESSION['nom'],
                    'premier_message'=>$_POST['premier_message'],
                    'id_auteur'=>$_SESSION['id'],
                ));
                $reponse = $bdd->query('SELECT MAX(id_topic) AS id FROM topic');
                $donnees = $reponse->fetch();
                header('Location : topic.php?id=' . $donnees['id']);
                $requete = $bdd->query('SELECT * FROM topic');
                $result = $requete->fetchAll();
                echo '<h1> Votre message a bien été envoyé </h1>';
                echo '<br/><a href="index.php"> Retour à l\index du forum </a>';
                echo '<p>Ajouter nouveau message : </p>';
        
                }
                else 
                {
                echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';
                } 
               
            }
            
            
        
        ?>
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
                <br/><label for='premier_message'>Message</label>
                <input type='text' name='premier_message'>
                <br/><input type="submit" value="Cr�er le topic" name="submit" />
            </form>
        </div>
        
    </body>
</html>

