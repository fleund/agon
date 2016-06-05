<html>
    <head>
        <title>Index du forum</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css">
    </head>
</html>
<body>
    <div id="content"></div>
<a href="creation_topic.php">Cr�er nouveau sujet</a>
<br/><br/>

<?php
include('bdd.php');
include('header.php');

$req= $bdd->query('SELECT id_topic, prenom_auteur, nom_auteur, date_last_post, nom_topic, description_topic, id_auteur FROM topic ORDER BY date_last_post DESC');
/*echo'La liste des topic est la suivante : ';

while ($topic=$req->fetch())
{
    
    echo '<table>'
    . '<tr>'
                . '<td>'.$topic['prenom_auteur'].'</td>'
                . '<td>'.$topic['nom_auteur'].'</td>'
                . '<td>'.$topic['date_last_post'].'</td>'
            . '</tr>'
    . '</table>';
}
*/
$count= $bdd->query('SELECT COUNT(*)  AS nb FROM topic');
$exe=$count->fetch();
$nb=$exe['nb'];
echo 'Il y a '.$nb . ' sujets en cours' ;

if ($nb==0)
{
    echo 'Aucun sujet, cr�ez en un!';
}
else {
    ?>
    <table width="500" border="1"> <tr>
            <td>
                Auteur
            </td><td>
                Nom du sujet
            </td><td>
                Date du dernier post
            </td><td>
                Description du sujet
            </td></tr>
        <?php
        while($data=$req->fetch()){
            sscanf($data['date_last_post'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
            
            echo '<tr>'
            . '<td>';
            echo '<a href="Profil.php?id='. $data['id_auteur']. 'title="Voir son profil" target="_blank">' . htmlentities(trim($data['prenom_auteur'] . ' ' . $data['nom_auteur'])). '</a>';
            echo'</td><td>';
            echo '<a href="lire_sujet.php?id_topic='. $data['id_topic']. '">'. htmlentities(trim($data['nom_topic'])). '</a>';
            echo'</td><td>';
            echo $jour . '-' . $mois . '-' . $annee . ' ' . $heure . ':' . $minute;$annee;
            echo'</td><td>';
            echo $data['description_topic'];
        }
        ?>
    </td></tr></table>
<?php
}
?>
</body>
</html>
                
            
