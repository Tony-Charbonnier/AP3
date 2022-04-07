<script src="./js/jquery-1.10.2.min.js"></script>
<form method='POST' action='index.php?uc=gererMedecin&action=updateMedecin' style="margin-left:16%">
<table class='tabNonQuadrille' id="rapport">
		<tr>
			<td>Nom du medecin</td>		
			<td><input id="nMedecin"  type='text' name='nMedecin'  size='30' maxlength='45'></td>
		</tr>

		<tr>
			<td>Prénom du medecin</td>
			<td><input id="pMedecin"  type='text' name='pMedecin'  size='50' maxlength='100'></td>
		</tr>
		<tr>
			<td>Adresse medecin</td>
			<td><input id="adresse" type='text' name='adresseM'  size='50' maxlength='200'></td>
		</tr>

		<tr>
			<td>Téléphone </td>
			<td><input id="tel" type='text' name='telM'  size='50' maxlength='100'></td>
		</tr>
        <tr>
			<td>Spécialité</td>
			<td><input id="spe" type='text' name='speM'  size='50' maxlength='100'></td>
		</tr>
		<tr>
			<td>Département</td>
			<td><input id="dep" type='text' name='depMed'  size='50' maxlength='100'></td>
		</tr>

	
	</table>
	<?php echo "<input name='idMedecin' type='hidden' value=",$leMedecin[0],">" ?>
	<input type='submit' value='Valider' name='valider'>
    <input type='reset' value='Annuler' name='annuler'>
		 
</form>
<table  id='tabRapportMed' >
	<tr id="colMed">
		<td>Nom visiteur </td> 
 		<td>Prenom visiteur </td> 
 		<td>date visite  </td>  
 		<td>motif visite</td>  
 		<td>bilan </td> 

</tr>
<?php
		for ($i=0; $i <count($rapportMedecin) ; $i++) { 
echo " 

 <tr>    
 <td>",$rapportMedecin[$i][7],"</td> 
 <td>",$rapportMedecin[$i][8],"</td> 
 <td>",$rapportMedecin[$i][1]," </td>  
 <td>",$rapportMedecin[$i][2],"</td>  
 <td>",$rapportMedecin[$i][3],"</td> 

          
 </tr>   

      ";
			
		}?>
</table>

    <script type="text/javascript">

	var leMedecin = <?php echo json_encode($leMedecin); ?>;
    $('#nMedecin').attr('value',leMedecin[1])
	$('#pMedecin').attr('value',leMedecin[2])
	$('#adresse').attr('value',leMedecin[3])
    $('#spe').attr('value',leMedecin[5])
	$('#tel').attr('value',leMedecin[4])
	$('#dep').attr('value',leMedecin[6])
	//$('#tabRapportMed').css(  'border', '1px solid', 'border-collapse', 'collapse')
	//$('#colMed').css('background-color','grey')


	
</script>
