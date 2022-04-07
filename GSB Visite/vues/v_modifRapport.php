<script src="./js/jquery-1.10.2.min.js"></script>

<h3>Modifier une visite</h3>
<form method='POST' action='index.php?uc=modifRapport&action=updateRapportClient' style="margin-left:16%">

	<table class='tabNonQuadrille' id="rapport">
	<?php echo "<input name='idVisite' type='hidden' value=",$rapportCliId[0],">" ?>
		<tr>
			<td>Date de la visite (jj/mois/aaaa)</td>		
			<td><input id="date1"  type='date' name='dateRapport'  size='30' maxlength='45'></td>
		</tr>

		<tr>
			<td>Motif de la visite</td>
			<td><input id="motifV"  type='text' name='description'  size='50' maxlength='100'></td>
		</tr>
		<tr>
			<td>Bilan de la visite</td>
			<td><input id="bilanV" type='text' name='bilan'  size='50' maxlength='100'></td>
		</tr>

		<tr id="medicament">
			<td>Medicament prescrit </td>
			
		</tr>

	
	</table>

	<input type='submit' value='Valider' name='valider'>
    <input type='reset' value='Annuler' name='annuler'>
		 
</form>

<script type="text/javascript">
	var tabRapport=document.getElementById('rapport');
	
	var rapportClient = <?php echo json_encode($rapportCliId); ?>;	
	var tabMedicament = <?php echo json_encode($lesMedicaments); ?>;
	var mediacmentRapport = <?php echo json_encode($listeMedocOffrir); ?>;	
	var compteur =0;
	for (let index = 0; index < mediacmentRapport.length; index++) {
		var tr1=document.createElement('tr');
		var td1=document.createElement('td');
		var td2=document.createElement('td');
		var combo1=document.createElement('select');
		var  nombre=document.createElement('input');
		nombre.setAttribute('type','number');
		nombre.setAttribute('name','nombreDeMedoc'+compteur)
		combo1.setAttribute('name','nomMedoc'+compteur)
		tabRapport.append(tr1);
		tr1.append(td1);
		td1.append(combo1);
		tr1.append(td2);
		td2.append(nombre);
		nombre.setAttribute('value',mediacmentRapport[index][1])
		
		
		for (var i = 0; i < tabMedicament.length; i++) {
     		var opt1 = document.createElement("option");
     	 	opt1.value = tabMedicament[i][0];
      		opt1.text = tabMedicament[i][1];
			combo1.add(opt1, null);
  		}
		  combo1.value=mediacmentRapport[index][0];
		  compteur++;
		
	}
	$('#date1').attr('value',rapportClient[1])
	$('#motifV').attr('value',rapportClient[2])
	$('#bilanV').attr('value',rapportClient[3])
	

</script>

