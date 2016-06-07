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
        <link rel="stylesheet" href="Accueil.css">
    </head>
    <body>
        <?php
        include('header.php');	
        echo '<div id="content"></div>';
        if(!isset($_GET['id_topic'])) {
            echo 'Sujet non d�fini.';
        }
        else {
            ?>
                <table class="table_index" width='500' border='1'><tr>
                        <td class="tab_lire_sujet">
                            Auteur
                        </td>
						<td class="tab_lire_sujet">
                            Messages
                        </td></tr>
                    <?php
        $sq=$bdd->query('SELECT prenom_auteur, nom_auteur, premier_message, date_last_post, id_auteur FROM topic WHERE id_topic="'.$_GET['id_topic'].'"');
        $data_auteur=$sq->fetch();
        sscanf($data_auteur['date_last_post'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
            echo'<tr><td>';
            $auteur=$data_auteur['prenom_auteur'] .' ' . $data_auteur['nom_auteur'];
            echo $auteur;
            echo '<br/>';
            echo $jour . '-' . $mois . '-' .$annee . ' ' . $heure . ':' . $minute;
            echo '</td><td>';
            echo nl2br(htmlentities(trim($data_auteur['premier_message'])));
            echo '</td></tr>';
        $sql=$bdd->query('SELECT prenom_repondant, nom_repondant, message, date_reponse, id_repondant FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_topic'].'" ORDER BY date_reponse ASC');

            while($data=$sql->fetch()) {
                    /*
                     * sscanf permet de prendre les �l�ments de datetime et de d�finir � quoi ils correspondent
                     * (pour afficher d'une meilleure mani�re plus tard
                     */
                sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

                echo '<tr> <td>';
                $auteur= $data['prenom_repondant']. ' '. $data['nom_repondant'];
                '<a href="Profil.php?id='. $data['id_repondant']. 'title="Voir son profil" target="_blank">' . htmlentities(trim($data['prenom_repondant'] . ' ' . $data['nom_repondant'])). '</a>';
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
        <a class="bouton_forum" href="repondre.php?id_topic=<?php echo $_GET['id_topic']; ?> ">Répondre</a>
        <?php
            }
        ?>
        <a class="bouton_forum" href="index.php">Retour à l'index du forum </a>
        
        
    </body>
</html>
