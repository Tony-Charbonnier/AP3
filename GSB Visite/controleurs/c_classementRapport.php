<?php
include("vues/v_sommaire2.php");
include_once "./include/cl_rapportGsb_inc.php";
include_once "./include/class.pdogsb.inc.php";
include_once "./include/cl_medicament_inc.php";
require_once("./include/cl_medecinGsb_inc.php");
$action = $_REQUEST['action'];

    switch($action){
        case'afficheSpe':{
            $classMed=cl_medecinGsb_inc::classementMed('desc','specialitecomplementaire');
            include('./vues/v_classSpe.php');
            var_dump($classMed);
            break;
        }
        case'afficheDep':{
            $classMed=cl_medecinGsb_inc::classementMed('asc','departement');
            include('./vues/v_classDep.php');
            var_dump($classMed);
            break;
        }
    }
?>