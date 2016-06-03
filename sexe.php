<div class="champ">
    <select name="sexe" class="critere">
    	<option>F</option>
    	<option <?php if (isset($_POST['sexe'])) {if ($_POST['sexe']=='M') {echo 'selected="selected"';}} ?>>M</option>
    </select>
</div>
