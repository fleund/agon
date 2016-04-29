<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Agon - Chercher un groupe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="chercher_groupe.css"/> 
    </head>
    <body>
        
        <div class = "conteneur">
            
            <p class = "titre"> Chercher un groupe </p></br>
            
            <div class="bloc1">
                <label for = "nom_user">Nom : </label></br> 
                <input type="text" name="nom_user" id="nom_user" maxlength ="30" placeholder="AgonFoot"></br>

                <p>
                    <label for="sport" >Localisation :</label><br />
                    <select name="localisation" id="localisation">
                    <option value="Chosir une région">Choisir une région</option>
                    <option value="Nord-Pas-de-Calais-Picardie">Nord-Pas-de-Calais-Picardie</option>
                    <option value="Normandie">Normandie</option>
                    <option value="Bretagne">Bretagne</option>
                    <option value="Ile-de-France">Ile-de-France</option>
                    <option value="Alsace-Champagne-Ardenne-Lorraine">Alsace-Champagne-Ardenne-Lorraine</option>
                    <option value="Pays de la Loire">Pays de la Loire</option>
                    <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                    <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                    <option value="Aquitaine-Limousin-Poitou-Charentes">Aquitaine-Limousin-Poitou-Charentes</option>
                    <option value="Auvergne-Rhônes-Alpes">Auvergne-Rhônes-Alpes</option>
                    <option value="Auvergne-Rhônes-Alpes">Auvergne-Rhônes-Alpes</option>
                    <option value="Languedoc-Roussillon-Midi-Pyrénées">Languedoc-Roussillon-Midi-Pyrénées</option>
                    <option value="PACA">PACA</option>   
                    </select>
                </p></br>
            </div>
                
            <div class="bloc2">
                
                <p class = "choix_sport">
                    <label for="sport" >Sport concerne :</label><br />
                    <select name="sport" id="sport">
                    <option value="Chosir un sport">Choisir un sport</option>
                    <option value="Football">Football</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Handball">Handball</option>
                    <option value="Natation">Natation</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Rugby">Rugby</option>
                    </select>
		</p>
                
                <label for = "date">Date : </label></br> 
                <input type="date" name="date" id="date"></br>
                    
            </div>
                
            <div class="bouton">
		<input type="submit" value="Rechercher" class = "agrandir_bouton" ></code>
                <?php
                    $mot_cle = htmlspecialchars($_POST['recherche']);
                    if(isset($_POST'mot_cle') && !empty($_POST)) {
                        $recherche = explode(' ',$_POST'mot_cle']);
                        $nbreMots = count($recherche);
                        $recherche[0] = strtolower($recherche[0]);
                        if($mot_cle != '' & strlen($mot_cle) > 2) {
                            $requete = "SELECT DISTINCT nom_groupe"
                            $i=1;
                            while ($i < $nbreMots) {
                                $recherche[$i] = strtolower([$recherche[$i]);
                                $requete.= "AND (LOWER(nom_groupe) LIKE '%recherche[$i]%'";
                                $i++;
                            }
                            $requete.=") ORDER BY "
                            }
                        }1
                        11
                         
                        
                    }1
            </div>
            
        </div>
        
    </body>
</html>
