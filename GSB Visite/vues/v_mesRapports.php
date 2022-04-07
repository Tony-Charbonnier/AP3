<script src="./js/jquery-1.10.2.min.js"></script>



<table class='tabNonQuadrille' id="rapport">
    
	<?php
		for ($i=0; $i <count($rapportcli) ; $i++) { 
echo " 
<form method='POST' action='index.php?uc=modifRapport&action=modifRapport' style='margin-left:16%'>
 <tr>    
 <td> date de la visite :",$rapportcli[$i][1]," </td>  
 <td> motif visite : ",$rapportcli[$i][2],"</td>  
 <td> bilan : ",$rapportcli[$i][3],"</td> 
 <td> <input type='submit' value='modifier le rapport' name='rapport'>  </td>    
 <input name='idVisite' type='hidden' value=",$rapportcli[$i][0],">      
 </tr>   

 </form>      ";
			
		}?>
    
	 
   
</table>
           