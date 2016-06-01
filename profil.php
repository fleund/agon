<html>
    <head>
        <title>Mon profil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Style.css"/>
        
        
    </head>
    
    <body>
        
             <header>
			<div class="Logo">
                            <img src="Logo.jpg" height="100"  >
                        
			<p id="onglets_accueil">
				<a href="">Accueil</a> |
				<a href="">Forums</a> |
				<a href="">Groupes</a> |
				<a href="">Mon espace</a> |
				<a href="">Déconnexion</a> |
			</p>
                        
			<div id="identifiants">
				
			</div>
		
        </header>    
            <div id="barre_bleue_gauche">
                </div>
             <div id="barre_bleue_droite">
            </div>
               <div id="barre_mauve_gauche">
              </div>
               <div id="barre_mauve_droite">
             </div>
           
               <div class="header">
                    
                </div>
		
                <div class = "titremarge" >
                    <h1>Mon profil</h1>
                </div>   
        
              <div class = "marge" >
                    <img src="poque.png" alt="Profil" title="Pseudo"/>
                </div>
                <div class = "bordure" >
		<?php 
                
                
                
                include ('bdd.php');
                
                $req = $bdd->prepare('SELECT * FROM inscrit WHERE id = :id '); 
                    $req->execute(array('id' => $_GET['id'] ));
                    $donnees = $req->fetch();
            
                ?>
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
                        
                        $requ = $bdd->prepare('SELECT * FROM `inscrit`, `groupe`WHERE inscrit.id_groupe = groupe.id LIMIT 0, 30 ');
                            $requ->execute(array('id' => $_GET['id'] ));
                            $donnee = $requ->fetch(); 
                            echo $donnee['nom_groupe']
                        ?>
                    </div > 
                    
                    
                    </div>
                <div class = "bordure3">
                
                    <h2>Dernier messages postés</h2>
	
		</div>
            
	
    </body>
</html>