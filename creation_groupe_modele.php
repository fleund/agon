<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
                <form action="creation_groupe_modele.php" method="post">
                    <p>Nom du groupe : <input type="text" name="nom" /></p>
                    <p>Description (facultatif) : <textarea name="description" rows="8" cols="45">Décrivez votre groupe </textarea></p>
                    <p>Nombre maximum de membres : <input type="number" min="5" max="200" value="100" step="5" onkeypress="return false;" name="nombre_max" </p>
                    <p>Statut : <select name="statut" size="1"> <option>prive<option>public</select> </p>
                    <p>Image : <input type="image" src="exemple.png" style="height:80px;" /> </p>
                    <input type="submit" />
                    <input type="reset" />                  
                </form>
            <?php
            
            
            if(isset($_POST['nom']))    $nom_groupe=$_POST['nom'];
            else    $nom_groupe="";
            
            if(isset($_POST['description']))    $description_groupe=$_POST['description'];
            else $description_groupe="";
            
            $nombre_max_membres= $_POST['nombre_max'];
            
            $statut=$_POST['statut']; 
            
            echo $nom_groupe;
            echo $description_groupe;
            
     
            
            if(empty($nom_groupe) OR strlen($nom_groupe) < 3)
            {
                echo 'Vous devez renseigner le nom de plus de trois caractères';
            
            }
            else {
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : ' .$e ->getMessage());
                }
                
                $reponse = $bdd->query('SELECT id FROM groupe WHERE nom_groupe = $nom_groupe');
                $requete = $bdd->prepare('INSERT INTO groupe(nom_groupe, description_groupe, nombre_max_membres, statut)
                        VALUES (:nom_groupe, :description_groupe, :nombre_max_membres, :statut)');
                $requete->execute(array(
                    'nom_groupe' => $nom_groupe,
                    'description_groupe' => $description_groupe,
                    'nombre_max_membres' => $nombre_max_membres,
                    'statut' => $statut
                    ));
                
            }
            
            
           
            ?>
       
            
            
            
        </
    </body>
</html>
