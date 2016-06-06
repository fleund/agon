<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Evenement</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css"/>
    </head>
    <body>
        
        <?php 
                session_start();
                include ('bdd.php');
                
                $req = $bdd->prepare('SELECT * FROM liste_compets WHERE id = :id '); 
                    $req->execute(array('id' => $_GET['id'] ));
                    $donnees = $req->fetch();
                $requ = $bdd->prepare('SELECT * FROM groupe WHERE id = :id '); 
                    $requ->execute(array('id' => $_GET['id'] ));
                    $donnees2 = $requ->fetch();    
            
            ?>
                <div class = "titremarge" >
                    <h1>Evenement : <?php echo $donnees['nom']; ?></h1>
                </div>   
        
                <div class = "marge" >
                    <img src=<?php echo $donnees2['image']?> alt="Profil" title="Pseudo"<?php echo $donnees['nom']?>/>
                </div>
                <div class = "bordure" >
		
                    <h2>Informations</h2>
                    <ul>
                        <li>Date de l'evenement :  <?php echo $donnees['date']; ?></li> </br>
                        <li>Lieu de l'evenement :  <?php echo $donnees['lieu']; ?></li> </br>
                        <li>Departement :  <?php echo $donnees['departement']; ?></li></br>
                        <li>Groupe organisateur :  <?php echo $donnees['groupe']; ?></li> </br
                        <li>Nombre de place :  <?php echo $donnees['places_total']; ?></li> </br>
                        <li>Nombre d'inscrit a l'evenement :  <?php echo $donnees['inscrits']; ?></li> </br>
                </div>
            
            
            <div class="bouton">
                <input type="submit" value="Modifier les informations" class ="agrandir_bouton">
            </div>
