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
                
                include ('bdd.php');
                
                $req = $bdd->prepare('SELECT * FROM liste_compets WHERE id = :id '); 
                    $req->execute(array('id' => $_GET['id'] ));
                    $donnees = $req->fetch();
                  
            
            ?>
                <div class = "titremarge" >
                    <h1>Evenement : <?php echo $donnees['nom']; ?></h1>
                </div>   
        
                <form method="POST" action="">
                <div class = "bordure" >
		
                    <h2>Informations</h2>
                    <ul>
                        <label>Date de l'evenement : </label> <br/>
                        <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['date']; ?> "><br/><br/>
                        <label>Sport : </label> <br/>
                        <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['sport']; ?>"><br/><br/> 
                        <label>Departement :</label> <br/>
                        <input  name="nom"  class="l300" placeholder= "" value=" <?php echo $donnees['departement']; ?>"><br/><br/>
                        <label>Lieu de l'evenement : </label> <br/>
                        <textarea name="description" rows="3" maxlength="100" > <?php echo $donnees['lieu']; ?></textarea><br/><br/>
                        <label>Groupe organisateur : </label> <br/>
                        <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['groupe']; ?>"><br/><br/>
                        <label>Nombre de place : </label> <br/>
                        <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['places_total']; ?>"><br/><br/>
                        <label>Nombre d'inscrit a l'evenement : </label> <br/>
                        <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['inscrits']; ?>"><br/><br/>
                        
                </div>
            
            
            <div class="bouton">
                <input type="submit" value="Modifier les informations" class ="agrandir_bouton">
            </div>
            </form>
        </body>
</html>

