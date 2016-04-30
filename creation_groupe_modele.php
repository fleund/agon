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
                <form action="creation_groupe_modele.php" method="post" enctype="multipart/form-data">
                    <p>Nom du groupe : <input type="text" name="nom" /></p>
                    <p>Description (facultatif) : <textarea name="description" rows="8" cols="45">Décrivez votre groupe </textarea></p>
                    <p>Nombre maximum de membres : <input type="number" min="5" max="200" value="100" step="5" onkeypress="return false;" name="nombre_max" </p>
                    <p>Statut : <select name="statut" size="1"> <option>prive<option>public</select> </p>
                    <p> <label for="image"> Image du groupe (JPG, PNG ou GIF) :</label><br/>
                        <input type="file" name="image" id="image" /> </p>
                    <input type="submit" />
                    <input type="reset" />                  
                </form>
   
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
            
            $nombre_max_membres= $_POST['nombre_max'];
            
            $statut=$_POST['statut']; 
            
            
            $_FILES['image']['name'];
            $_FILES['image']['type'];
            $_FILES['image']['size'];
            $_FILES['image']['tmp_name'];
            $_FILES['image']['error'];

            
     
            
            if(empty($nom_groupe) OR strlen($nom_groupe) < 3)
            {
                echo 'Vous devez renseigner le nom de plus de trois caractères';
            
            }
            else {
                
                //On vérifie s'il y a eu une erreur lors du transfert
                if ($_FILES['image']['error']>0) 
                {
                    $erreur = "Erreur lors du transfert";
                }
                
                //On vérifie si le fichier est trop grand
                $maxsize=1048576;
                if ($_FILES['image']['size'] > $maxsize) 
                {
                    $erreur = "Le fichier est trop grand";
                }
                
                //On donne les extensions de fichier acceptées
                $extensions_valides = array ( 'jpg', 'jpeg', 'gif', 'png');
                //strtolower met tout en minuscule, substr(début, fin) prend un morceau de la chaine, strrchr prend la dernière occurence (ici, du .)
                $extension_upload = strtolower( substr( strrchr($_FILES['image']['name'], '.') ,1) );
                //in_array vérifie si l'extension_upload est bien dans les extensions valides
                if ( in_array($extension_upload, $extensions_valides) ) 
                {  
                    echo "Extension correcte";
                }

                $image_sizes = getimagesize($_FILES['image']['tmp_name']);
/*                if($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) 
                {
                    $erreur = "Image trop grande";
                }
*/
                mkdir('fichier/2/', 0777, true);

                $nom = md5(uniqid(rand(), true));
                $nom = "image_groupe/{id_groupe}.{$extension_upload}";
                $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $nom);
                if($resultat) 
                {
                    echo "Transfert réussi";
                }
                
                
                
                
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : ' .$e ->getMessage());
                }
                
                $reponse = $bdd->query('SELECT id FROM groupe WHERE nom_groupe = $nom_groupe');
                $requete = $bdd->prepare('INSERT INTO groupe(nom_groupe, description_groupe, nombre_max_membres, statut, image)
                        VALUES (:nom_groupe, :description_groupe, :nombre_max_membres, :statut, :image_groupe)');
                $requete->execute(array(
                    'nom_groupe' => $nom_groupe,
                    'description_groupe' => $description_groupe,
                    'nombre_max_membres' => $nombre_max_membres,
                    'statut' => $statut,
                    'image_groupe' => $nom
                    ));
                
            }
            
            
           
            ?>
       
            
            
            
        </
    </body>
</html>
