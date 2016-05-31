<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Groupe</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Style.css"/>
    </head>
    <body>
        
        <?php 
                include ('bdd.php');
                
                $req = $bdd->prepare('SELECT * FROM groupe WHERE id = :id '); // Table de la liste des sports en en-tÃªte
                    $req->execute(array('id' => $_GET['id'] ));
                    $donnees = $req->fetch();
            
            ?>
                <div class = "titremarge" >
                    <h1>Groupe : <?php echo $donnees['nom_groupe']; ?></h1>
                </div>   
        
                <div class = "marge" >
                    <img src="poque.png" alt="Profil" title="Pseudo"/>
                </div>
                <div class = "bordure" >
		
                    <h2>Informations</h2>
                    <ul>
                        <li>Statut :</li> </br>
                        <li>Description :<?php echo $donnees['descriptif_groupe']; ?></li> </br>
                        <li>Nombre maximum de membres :<?php echo $donnees['nombre_max_de_participants']; ?></li></br>
                        <li>Sport :<?php echo $donnees['sport']; ?></li> </br
                        <li>Département :<?php echo $donnees['departement']; ?></li> </br>
                </div>
            
            
            <div class="bouton">
                <input type="submit" value="Modifier les informations" class ="agrandir_bouton">
            </div>

