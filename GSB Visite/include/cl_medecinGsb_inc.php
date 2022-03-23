<?php   
include_once("class.pdogsb.inc.php");
include_once ( "./index.php");
    class cl_medecinGsb_inc{
        private static $idMedecin;
        private static $nom;
        private static $prenom;
        private static $tel;
        private static $specialiteComplementaire;
        private static $departement;


        public static function medecin($nomMedecins){
            $req = "SELECT * FROM  medecin WHERE  nom LIKE '$nomMedecins%' "; 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchall();
            return $laLigne;
        }
        public static function medecinId($idMedecins){
            $req = "SELECT * FROM  medecin WHERE  id=$idMedecins "; 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchall();
            return $laLigne[0];
        }
       
        public static function updateMed($idMedecin,$nomMed,$PrenomMed,$adresseMed,$telMed,$speMed,$depM){
            $req = "UPDATE medecin set nom='$nomMed', prenom='$PrenomMed', adresse='$adresseMed', tel='$telMed' , specialitecomplementaire='$speMed', departement=$depM  WHERE id=$idMedecin" ; 
            $res = PdoGsb::get_monPdo()->query($req);
        }
        public static function classementMed($orderBy,$SpeDep){
            $req = "SELECT COUNT(medecin.id) AS NombreRapport, $SpeDep FROM medecin
                INNER JOIN rapport ON medecin.id = rapport.idMedecin
                GROUP BY medecin.$SpeDep 
                order by 1 $orderBy

            "; 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchall();
            return $laLigne;
        }
    }



?>