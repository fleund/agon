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
        <link rel="stylesheet" href="Accueil.css"/>
    </head>
    <body>
        
        <?php 
                include ('bdd.php');
				include('header.php');
                
                $req = $bdd->prepare('SELECT * FROM groupe WHERE id = :id '); // Table de la liste des sports en en-tÃªte
                    $req->execute(array('id' => $_GET['id'] ));
                    $donnees = $req->fetch();
            
            ?>
                <div class = "titremarge" >
                    <h1>Groupe : <?php echo $donnees['nom']; ?></h1>
                </div>   
        
                <div class = "marge" >
                    <img src="poque.png" alt="Profil" title="Pseudo"/>
                </div>
                <div class = "bordure" >
		
                    <h2>Informations</h2>
                    <ul>
                        <li>Statut :<?php echo $donnees['statut']; ?></li> </br>
                        <li>Description :<?php echo $donnees['description']; ?></li> </br>
                        <li>Nombre maximum de membres :<?php echo $donnees['membres_max']; ?></li></br>
                        <li>Sport :<?php echo $donnees['sport']; ?></li> </br
                        <li>Département :<?php echo $donnees['departement']; ?></li> </br>
                </div>
            
            
            <div class="bouton">
                <input type="submit" value="Modifier les informations" class ="agrandir_bouton">
            </div>

	</body>
</html>