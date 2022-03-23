 <?php
 include_once("class.pdogsb.inc.php");
 include_once ( "./index.php");
    class cl_medicament_inc{
        private $idMedicament;
        private $nomMedicament;
        private $idFamilleMedicament;
        private $CompositionMedicament;
        private $effetMedicament;
        private $contreIndicationMedicament;

        public function __construct($unIdMedicament,$unNom,$unIdFamille,$uneCompo,$unEffet,$uneContreIndic){
            $this->idMedicament=$unIdMedicament;
            $this->nomMedicament=$unNom;
            $this->idFamilleMedicament=$unIdFamille;
            $this->CompositionMedicament=$uneCompo;
            $this->effetMedicament=$unEffet;
            $this->contreIndicationMedicament=$uneContreIndic;
        }

        public static function medicament(){
            $req = "SELECT * FROM  medicament "; 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchall();
            return $laLigne;
        }
      
        public static function ajouteMedicamentOffrir($unIdRapport,$unIdMedicament,$uneQuantite){
            $req = "insert into offrir(idRapport,idMedicament,quantite)
            values($unIdRapport,'$unIdMedicament',$uneQuantite)";
            PdoGsb::get_monPdo()->exec($req);
        }
        

        public static function reccupMedicamentOffrir($idRapport){
            $req = "SELECT offrir.idMedicament, offrir.quantite, medicament.nomCommercial FROM offrir, medicament WHERE offrir.idRapport=$idRapport and offrir.idMedicament=medicament.id"; 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchall();
            return $laLigne;
        }
     
        public static function MedicamentOffrirupdate($leRapport,$idmedoc,$combien,$idAncienmedoc){
            $req = " UPDATE offrir set idMedicament='$idmedoc', quantite='$combien'  WHERE idRapport='$leRapport' and idMedicament='$idAncienmedoc'";        
                $res = PdoGsb::get_monPdo()->query($req);
        }



    }


 ?>