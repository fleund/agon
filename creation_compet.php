<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Creation compet</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="creation_compet.css">
    </head>
    <body>
        <div id="conteneur">
            <form action="creation_compet.php" method="post" enctype="multipart/form-data">
			
				<p class="titre">Creer votre competition !</p>
				
                <p>Nom de la compétition :</br><input type="text" name="nom" id="nom_competition" /> </p>
                
                <p>Sport principal : </br><select name="sport_compet" id="sport_compet">
                    <option>Choisir un sport </option>
                    <?php
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                    while ($donnees = $reponse->fetch()) 
                    {
                        echo '<option';
                        if (isset($_POST['sport'])) 
                        {
                            if ($donnees['nom']==$_POST['sport']) 
                            {
                                echo ' selected="selected"';
                            }
                        }
                        echo '>' . $donnees['nom'] . '</option>';
                    }
                    $reponse->closeCursor();
                    ?> 
                    </select>
                </p>
                <p>Date de la compétition :</br><input type="date" name="date"  id="date"/> </p>
                
                <p>Lieu de la compétition : </br><input type="text" name="lieu"  id="lieu" /> </p>
                
                <p>Groupe organisateur :</br><input type="text" name="groupe" id="organisateur"/> </p>
                
                <p>Nombre de places total :</br><input type="number" name="nombre" id="place_total"/> </p>
                
                <input type="submit" class = "agrandir_bouton"/>
            </form>
                
                
        </div>
    </body>
</html>

<?php
    if(isset($_POST['nom']))    
    {
        $nom_compet=$_POST['nom'];
    }
    else    
    {
        $nom_compet="";
    }
            
    if(isset($_POST['sport_compet']))    
    {
        $sport_compet=$_POST['sport_compet'];
    }
     else 
    {
        $sport_compet="";
    }

    if(isset($_POST['date']))
    {
        $date_compet = $_POST['date'];
    }
            
    if(isset($_POST['lieu']))
    {
        $lieu_compet = $_POST['lieu']; 
    }
            
    if(isset($_POST['groupe']))
    {
        $groupe_compet = $_POST['groupe']; 
    }
            
    if(isset($_POST['nombre']))
    {
        $nombre_places = $_POST['nombre'];
    }
            


try
             {
                 $bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
             }
             catch(Exception $e)
             {
                 die('Erreur : ' .$e ->getMessage());
             }

             $reponse = $bdd->prepare('SELECT nom FROM compets WHERE nom = :nom_compet');
             $reponse->execute(array(
                 'nom_compet' => $nom_compet
                     ));

             
             $requete = $bdd->prepare('INSERT INTO compets(nom, sport, date, lieu, groupe, places_restantes)
                     VALUES (:nom_compet, :sport_compet, :date_compet, :lieu_compet, :groupe_compet, :nombre_places)');
             $requete->execute(array(
                 'nom_compet' => $nom_compet,
                 'sport_compet' => $sport_compet,
                 'date_compet' => $date_compet,
                 'lieu_compet' => $lieu_compet,
                 'groupe_compet' => $groupe_compet,
                 'nombre_places' => $nombre_places
                 ));
             
             ?>
