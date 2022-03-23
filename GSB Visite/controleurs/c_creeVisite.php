<?php
include("vues/v_sommaire.php");
include_once "./include/cl_rapportGsb_inc.php";
include_once "./include/class.pdogsb.inc.php";
include_once "./include/cl_medicament_inc.php";
require_once("./include/cl_medecinGsb_inc.php");

$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$direct="gererRapport"   ;
$direct2="AfficheMedecins";
switch($action){
    case'selectMedecin':{
       
        include("vues/v_selectionMedecin.php");
        break;
    }
    case'validerCreationRapport':{      

        if ( $_REQUEST['dateRapport']=="" || $_REQUEST['description']=="" ||$_REQUEST['bilan']=="") {            
            include("vues/v_selectionMedecin.php");
            echo "TOUT LES CHAMPS DOIVENT ÊTRE REMPLIS !";       
            break;
            
        }else {
            $medecin = $_REQUEST['medecin'];
		    $dateR = $_REQUEST['dateRapport'];
		    $motif = $_REQUEST['description'];    
            $bilan = $_REQUEST['bilan'];  
            $nomMedicament= array();
            $i=0;
            $rapport=new cl_rapportGsb_inc(1,"",$dateR,$motif,$bilan,$idVisiteur,$medecin) ;
            $rapport->ajoutVisite();
            $DernierRapportId=cl_rapportGsb_inc::dernierRapportVisite();
    
            while(isset($_REQUEST["nomMedoc$i"]) && isset($_REQUEST["nombreDeMedoc$i"])){
                $nomMedicament[$i]=$_REQUEST["nomMedoc$i"];
                $nombreDeMedoc[$i]=$_REQUEST["nombreDeMedoc$i"];
                $newOffrir= cl_medicament_inc::ajouteMedicamentOffrir($DernierRapportId,$nomMedicament[$i],$nombreDeMedoc[$i]);

                $i++;
            }
            
        
            
            break;
        }
       
    }
    case'AfficheMedecins':{
        $lesMedecins= cl_medecinGsb_inc::medecin($_REQUEST['medgsb']);
        $lesMedicaments= cl_medicament_inc::medicament();
        
        
        if(count($lesMedecins)==0){
            include("vues/v_selectionMedecin.php");
            echo "Aucun medecin trouver";

        }else if(strlen($_REQUEST['medgsb'])>2){   
            include("vues/v_selectionMedecin.php");
            include("vues/v_ajoutRapport.php");
        }else{
            include("vues/v_selectionMedecin.php");
            echo "veillez Saisir au moins les 3 premiers charactères du nom du medecins";
        }
       
       
        
        break;
    }
}
?>