<!DOCTYPE html>
 <!--
 To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
 +-->
<html>
    <head>
        <title>Agon - Creation groupe</title>
            <meta charset="windows-1252">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="creer_groupe.css" />
    </head>
    
    <body>
        
        <ul>
            <a href="index.html">Accueil</a>
            <a href="forum.html">Forum</a>
            <a href="groupe.html">Groupe</a>
            <a href="mon_espace.html">Mon espace</a>
            <a href="deconnexion.html">Deconnexion</a>
        </ul></br>
        
        <div id="conteneur2">
            
        <legend>Creer un groupe</legend>
        
        
        
        <form action="creation_groupe.php" method="post" enctype="multipart/form-data">
            
            <div id="Creer_un_groupe">
            
            <div id="bloc_champ">
            
                <p>Nom du groupe : </br><input type="text" name="nom" id="nom_du_groupe" placeholder="Ex : La Passion Du Foot" maxlength ="30"/></p>
            
                <p>Description (facultatif) :</br> <input type="text" name="description" rows="8" cols="45" id="description">Décrivez votre groupe </textarea></p>    
            
                <p>Nombre maximum de membres : <input type="number" min="5" max="200" value="100" step="5" onkeypress="return false" name="nombre_max"  id="max_membres"/></p>
            
                <p>Statut : </br><select name='statut' size="1" id="statut"> <option>prive<option>public</select> </p>
                
                <p>Image du groupe : <input type="text" name="image" />  </p>
                <p><a href='http://www.hostingpics.net/' target="_blank"> Lien vers uploader de photos </a> </p>
                
                <input type="submit" class="agrandir_bouton"/>
            
                <input type="reset" class="agrandir_bouton"/>
            
            </div>
            
                
            </div>
            
        </form>
            
        
        
        </div>
             
             
    
             <?php
             
             
            if(isset($_POST['nom']))    
             {
                 $nom_groupe=$_POST['nom'];
             }
             else    
             {
                 $nom_groupe="";
             }
            
            if(isset($_POST['description']))    
            {
                 $description_groupe=$_POST['description'];
             }
             else 
             {
                 $description_groupe="";
             }
            
            if(isset($_POST['nombre_max']))
            {
            $nombre_max_membres = $_POST['nombre_max'];
            }
            
            if(isset($_POST['statut']))
            {
            $statut = $_POST['statut']; 
            }
            
            if(isset($_POST['image']))
            {
            $image_groupe = $_POST['image']; 
            }
             
                 
                 
            ?>
                 
              <?php   
             try
             {
                 $bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
             }
             catch(Exception $e)
             {
                 die('Erreur : ' .$e ->getMessage());
             }

             $reponse = $bdd->prepare('SELECT nom_groupe FROM groupe WHERE nom_groupe = :nom_groupe');
             $reponse->execute(array(
                 'nom_groupe' => $nom_groupe
                     ));

             
             $requete = $bdd->prepare('INSERT INTO groupe(nom_groupe, description_groupe, nombre_max_membres, statut, image_groupe)
                     VALUES (:nom_groupe, :description_groupe, :nombre_max_membres, :statut, :image_groupe)');
             $requete->execute(array(
                 'nom_groupe' => $nom_groupe,
                 'description_groupe' => $description_groupe,
                 'nombre_max_membres' => $nombre_max_membres,
                 'statut' => $statut,
                 'image_groupe' => $image_groupe
                 ));
                 
             
            
             ?>
        
             
             
             
         
     </body>
 </html>