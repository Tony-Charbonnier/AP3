
<script src="./js/jquery-1.10.2.min.js"></script>

<h3>Ajouter une nouvelle visite</h3>
<form method='POST' action='index.php?uc=gererRapport&action=validerCreationRapport' style="margin-left:16%">
<table class='tabNonQuadrille' id="rapport">
<tr>
	<td><?php
		for ($i=0; $i <count($lesMedecins) ; $i++) { 
			
			if ($i==0) {
				echo "<input  type='radio' name='medecin' checked value=",$lesMedecins[$i][0],">",$lesMedecins[$i][1],' ',$lesMedecins[$i][2],'</br>' ;
			}else {
				echo "<input  type='radio' name='medecin' value=",$lesMedecins[$i][0],">",$lesMedecins[$i][1],' ',$lesMedecins[$i][2],'</br>' ;
			}
		}?>
		</td>
	
</tr>
<tr>
	<td>Date de la visite (jj/mois/aaaa)</td>
	<td>
		<input  type='date' name=dateRapport  size='30' maxlength='45'>
	</td>
</tr>
<tr>
	<td>Motif de la visite</td>
	<td>
		<input  type='text' name=description  size='50' maxlength='100'>
	</td>
</tr>
<tr>
	<td>Bilan de la visite</td>
	<td>
		<input  type='text' name=bilan  size='50' maxlength='100'>
	</td>
</tr>

<tr id="medicament">
	<td>Medicament prescrit </td>
	<td> <img  src="./images/Add.png" onclick="addMedicament()"> Ajouter un médicament </td>
</tr>


</table>
<input type='submit' value='Valider' name='valider'>
         <input type='reset' value='Annuler' name='annuler'>

</form>

<script type="text/javascript">
	var tabRapport=document.getElementById('rapport');
	var tabMedicament = <?php echo json_encode($lesMedicaments); ?>;
	var compteur =0;
	function addMedicament(){
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
		for (var i = 0; i < tabMedicament.length; i++) {
     		 var opt1 = document.createElement("option");
     	 	opt1.value = tabMedicament[i][0];
      		opt1.text = tabMedicament[i][1];
			  combo1.add(opt1, null);
  		}
		  compteur++;

	}
</script>

