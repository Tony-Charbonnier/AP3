<?php
include_once "./include/cl_rapportGsb_inc.php";
include_once "./include/class.pdogsb.inc.php";
include_once "./include/cl_medicament_inc.php";
require_once("./include/cl_medecinGsb_inc.php");
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$direct="gererMedecin"   ;
$direct2="voirMedecin";

switch($action){
    case'selecMedecin':{
        include("vues/v_selectionMedecin.php");
        break;
    }
    case'voirMedecin':{
        $lesMedecins= cl_medecinGsb_inc::medecin($_REQUEST['medgsb']);
        
        if(count($lesMedecins)==0){
            include("vues/v_selectionMedecin.php");
            echo "Aucun medecin trouver";

        }else if(strlen($_REQUEST['medgsb'])>2){   
            include("vues/v_selectionMedecin.php");
            include("vues/v_lesMedecins.php");
        }else{
            include("vues/v_selectionMedecin.php");
            echo "veillez Saisir au moins les 3 premiers charactères du nom du medecins";
        }
        break;
    }
    case'infoMedecin':{
        $leMedecin= cl_medecinGsb_inc::medecinId($_REQUEST['medecin']);
        $rapportMedecin= cl_rapportGsb_inc::rapportMedecin($_REQUEST['medecin']);
        include("vues/v_modifMedecin.php");
        break;
    }
    case'updateMedecin':{
       
        $erreur="";
        $idMed= $_REQUEST['idMedecin'];
        
        if(strlen($_REQUEST['nMedecin'])!=0){
            $nMed = $_REQUEST['nMedecin']; 
        }else{
            $erreur="Veuillez rentrer le nom du medecin. $erreur";
        }
        if(strlen($_REQUEST['pMedecin'])!=0){
            $pMed = $_REQUEST['pMedecin']; 
        }else{
            $erreur="Veuillez rentrez le nom du medecin. $erreur";
        }
        if(strlen($_REQUEST['adresseM'])!=0){
            $adrMed = $_REQUEST['adresseM']; 
            
        }else{
            $erreur="Veuillez renseignez l'adresse du medecin. $erreur";
        }
        if(strlen($_REQUEST['telM'])!=0){
            $telMed = $_REQUEST['telM']; 
            
        }else{
            $erreur="Veuillez renseignez le téléphone du medecin. $erreur";
        }
        if(strlen($_REQUEST['depMed'])!=0){
            $depM = $_REQUEST['depMed']; 
            
        }else{
            $erreur="Veuillez renseignez le département du medecin. $erreur";
        }
        $speMed = $_REQUEST['speM'];
        
        if (strlen($erreur)==0) {
            
            cl_medecinGsb_inc::updateMed($idMed,$nMed,$pMed,$adrMed,$telMed,$speMed,$depM);
            break;
        }else{

            echo $erreur;
            $leMedecin= cl_medecinGsb_inc::medecinId($_REQUEST['idMedecin']);
            $rapportMedecin= cl_rapportGsb_inc::rapportMedecin($_REQUEST['idMedecin']);
            include("vues/v_modifMedecin.php");
            break;
        }
    }
    

}
?>