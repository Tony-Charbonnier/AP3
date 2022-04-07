<script src="./js/jquery-1.10.2.min.js"></script>

<h3>Mes rapports de visite</h3>
<form method='POST' action='index.php?uc=modifRapport&action=rapportDate' style="margin-left:16%">
<table class='tabNonQuadrille' id="rapport">
    <select name="dateVisite">
    <option value="" disabled selected hidden>Selectionner une date </option>
	<?php
		for ($i=0; $i <count($dateVisite) ; $i++) { 
            echo "<option value=",$dateVisite[$i][0],"> ",$dateVisite[$i][0],"</option> ";
			
		}?>
    </select>
    <input type='submit' value='Valider' name='valider'>
</form>
   
</table>
           