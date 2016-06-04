<html>
    <head>
        <title>Mon profil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css"/>
        
        
    </head>
    
    <body>
        
             
		<?php 
                
                
                include('header.php');
                include ('bdd.php');
                
                $req = $bdd->prepare('SELECT * FROM inscrit WHERE id = :id '); 
                    $req->execute(array('id' => $_GET['id'] ));
                    $donnees = $req->fetch();
            
                ?>
                <div id="content"></div>
                    <h2>Informations</h2>
                    <ul>
                        <li>Nom: <?php echo $donnees['nom'];?></li> </br>
                        <li>Prenom: <?php echo $donnees['prenom'];?></li></br>
                        <li>Departement: <?php echo $donnees['departement'];?></li></br>
                        <li>Sport favoris: <?php echo $donnees['sport'];?></li></br>
                        <li>Date de naissance: <?php echo $donnees['date_naissance'];?></li></br>
                        <li>Sexe: <?php echo $donnees['sexe'];?></li></br>
                        <li>Email: <?php echo $donnees['email'];?></li></br>
                        
                    </ul>
                	</div>
		
                <p>
                    <div class = "bordure1">
		
                    <h2>Statistique</h2>
                    <ul>
                        <li>Inscrit le:<?php echo $donnees['date_inscription'];?></li></br>
                        <li>Message: 50</li></br>
                        <li>Nombre de groupe:<?php echo $donnees['nombre_groupe'];?></li></br>
                    </ul>
                
                    </div>
        
                    <div >
                
                    <div class="bordure2"> 
   
                        <h2>Groupes</h2>  
                        <?php
                        
                        $id_groupe = $donnees['id_groupe'];
                        
                   
                        $requ = $bdd->query('SELECT * FROM groupe');
                        while ($donnees2 = $requ->fetch()){
                            if ($id_groupe == $donnees2['id']){echo $donnees2['nom_groupe'];}
                        }
                        
                        
                        
                           
                            
                            
             
                        
                        //$requ = $bdd->prepare('SELECT * FROM `inscrit`, `groupe`WHERE inscrit.id_groupe = groupe.id LIMIT 0, 30 ');
                          //  $requ->execute(array('id' => $_GET['id'] ));
                           // $donnee = $requ->fetch(); 
                            
                            //if ($donnee['id_groupe']!=0)
                            //{
                              //  echo $donnee['nom_groupe'];
                            //}
                            
                               
                            
                        ?>
                    </div > 
                    
                    
                    </div>
                <div class = "bordure3">
                
                    <h2>Dernier messages postés</h2>
	
		</div>
            
	
    </body>
</html>
