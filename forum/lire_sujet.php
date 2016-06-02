<?php
include("bdd.php")
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Lecture d'un sujet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if(!isset($_GET['id_topic'])) {
            echo 'Sujet non défini.';
        }
        else {
            ?>
                <table width='500' border='1'><tr>
                        <td>
                            Auteur
                        </td><td>
                            Messages
                        </td></tr>
                    <?php
        $sql=$bdd->query('SELECT prenom_auteur, nom_auteur, message, date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_topic'].'" ORDER BY date_reponse ASC');
                while($data=$sql->fetch()) {
                    /*
                     * sscanf permet de prendre les éléments de datetime et de définir à quoi ils correspondent
                     * (pour afficher d'une meilleure manière plus tard
                     */
            sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
            
            echo '<tr> <td>';
            $auteur= $data['prenom_auteur']. ' '. $data['nom_auteur'];
            echo $auteur;
            //echo htmlentities(trim($data['prenom_auteur'].' '.$data['nom_auteur']));
            echo '<br/>';
            echo $jour . '-' . $mois . '-' .$annee . ' ' . $heure . ':' . $minute;
            echo '</td><td>';
            echo nl2br(htmlentities(trim($data['message'])));
            echo '</td></tr>';
        
            }
            ?>
                </table>
        <br/><br/>
        <a href="repondre.php?id_topic=<?php echo $_GET['id_topic']; ?> ">Répondre</a>";
        <?php
            }
        ?>
        <br/><br/>
        <a href="index.php">Retour à l'index du forum </a>
        
        
    </body>
</html>
