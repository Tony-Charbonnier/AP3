<?php
session_start();
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;

$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();

if(!isset($_REQUEST['uc']) || !$estConnecte){

     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
	case 'gererRapport' :{
		include("controleurs/c_creeVisite.php");break;
	}
	case 'modifRapport' :{
		include("controleurs/c_visite.php");break; 
	}
	case 'gererMedecin' :{
		include("controleurs/c_medecin.php");break; 
	}
	case 'classementRapport' :{
		include("controleurs/c_classementRapport.php");break; 
	}
	
}

include("vues/v_pied.php") ;

?>

