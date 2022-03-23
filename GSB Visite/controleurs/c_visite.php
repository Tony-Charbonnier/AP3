<?php
include("vues/v_sommaire.php");
include_once "./include/cl_rapportGsb_inc.php";
include_once "./include/class.pdogsb.inc.php";
include_once "./include/cl_medicament_inc.php";
require_once("./include/cl_medecinGsb_inc.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$dateVisite= cl_rapportGsb_inc::rapportVisitePersonne($idVisiteur);  

    switch($action){
        case'mesRapport':{               
            include("vues/v_dateRapport.php");   
            break;
        }

        case'rapportDate':{
            $dateCli=$_REQUEST['dateVisite'];
            $rapportcli= cl_rapportGsb_inc::rapportVisiteDate($idVisiteur,$dateCli); 
            include("vues/v_dateRapport.php");            
            include("vues/v_mesRapports.php");          
            break;
        }

        case'modifRapport':{
            $idVisiteCli= $_REQUEST['idVisite'];
            $lesMedicaments= cl_medicament_inc::medicament();
            $listeMedocOffrir=cl_medicament_inc::reccupMedicamentOffrir($idVisiteCli);
            $rapportCliId= cl_rapportGsb_inc::rapportVisiteUnVisiteur($idVisiteur,$idVisiteCli);
            include("vues/v_modifRapport.php");   
            break;
        }
        case'updateRapportClient':{
            $erreur="";
            if(isset($_REQUEST['idVisite'])){
                $idVisiteCli= $_REQUEST['idVisite'];
            }
            if(strlen($_REQUEST['dateRapport'])!=0){
                $dateR = $_REQUEST['dateRapport']; 
            }else{
                $erreur="Veuillez rentrer un date pour votre rapport. $erreur";
            }
            if(strlen($_REQUEST['description'])!=0){
                $motif = $_REQUEST['description']; 
            }else{
                $erreur="Veuillez rentrez un motif de visite. $erreur";
            }
            if(strlen($_REQUEST['bilan'])!=0){
                $bilan = $_REQUEST['bilan']; 
                
            }else{
                $erreur="Veuillez ecrire le bilan de la scéance. $erreur";
            }
            if (strlen($erreur)==0) {     
                echo $erreur;         
                $rapport=new cl_rapportGsb_inc(1,$idVisiteCli,$dateR,$motif,$bilan,$idVisiteur,"") ;
                $rapport->updateRapport();
                $nomMedicament= array();
                $nombreDeMedoc= array();
                $listeMedocOffrir=cl_medicament_inc::reccupMedicamentOffrir($idVisiteCli);
                for ($i=0; $i <count($listeMedocOffrir) ; $i++) { 
                    $nomMedicament[$i]=$_REQUEST["nomMedoc$i"];
                    $nombreDeMedoc[$i]=$_REQUEST["nombreDeMedoc$i"];
                    $newOffrir= cl_medicament_inc::MedicamentOffrirupdate($idVisiteCli,$nomMedicament[$i],$nombreDeMedoc[$i],$listeMedocOffrir[$i][0]);
                }
                break;
            }else{
                echo $erreur;
                $idVisiteCli= $_REQUEST['idVisite'];
                $lesMedicaments= cl_medicament_inc::medicament();
                $listeMedocOffrir=cl_medicament_inc::reccupMedicamentOffrir($idVisiteCli);
                $rapportCliId= cl_rapportGsb_inc::rapportVisiteUnVisiteur($idVisiteur,$idVisiteCli);
                include("vues/v_modifRapport.php");  
                break;
            }             
            
                
            
                
                break;
        }
       
    }

?>