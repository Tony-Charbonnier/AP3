<form method='POST' action='index.php?uc=gererMedecin&action=infoMedecin' style="margin-left:16%">
<table class='tabNonQuadrille' id="rapport">
<tr>
	<td><?php
		for ($i=0; $i <count($lesMedecins) ; $i++) { 
			if ($lesMedecins[$i][5]==null) {
                $spe="  pas de spécialité complementaire";
            }else{
                $spe='  spécialité complementaire : '.$lesMedecins[$i][5].' ';
            }
			if ($i==0) {
				echo "<input  type='radio' name='medecin' checked value=",$lesMedecins[$i][0],">",$lesMedecins[$i][1],' ',$lesMedecins[$i][2], ' </br></br>' ;
			}else {
				echo "<input  type='radio' name='medecin' value=",$lesMedecins[$i][0],">",$lesMedecins[$i][1],' ',$lesMedecins[$i][2],'  </br></br>' ;
			}
		}?>
		</td>
	
</tr>

    </table>
    <input type='submit' value='voir les informations' name='valider'>
    </forme>