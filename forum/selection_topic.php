<select name="topic" class="critere">
    <option value="">Choisir un topic</option>
    <?php
    $reponse = $bdd->query('SELECT nom_topic FROM topic ORDRE BY nom_topic');
    while ($donnees = $reponse->fetch()){
        echo '<option';
        if (isset($_POST['topic'])){
            if ($donnees['nom_topic']==$_POST['topic']) {echo ' selected="selected"';}
        }
        echo '>' . $donnees['nom_topic'].'</option>';
    }
    ?>
</select>
