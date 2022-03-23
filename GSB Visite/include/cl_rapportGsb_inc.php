<?php

    class cl_rapportGsb_inc{
        private $idRapport;
        private $dateRapport;
        private $motif;
        private $bilanRapport;
        private $idVisiteur;
        private $idMedecin;
    

    public function __construct($num,$unIdRapport,$uneDateRapport,$unMotif,$unBilanRapport,$unIdVisiteur, $unIdMedecin){
            $this->idRapport=$unIdRapport;
            $this->dateRapport=$uneDateRapport;
            $this->motif=$unMotif;
            $this->bilanRapport=$unBilanRapport;
            $this->idVisiteur=$unIdVisiteur;
            $this->idMedecin=$unIdMedecin;
        
        
    }

    
	public function ajoutVisite(){
		$req = "insert into rapport(date,motif,bilan,idvisiteur,idmedecin)
		values('$this->dateRapport','$this->motif','$this->bilanRapport','$this->idVisiteur',$this->idMedecin)";
		PdoGsb::get_monPdo()->exec($req);
	}

    public static function dernierRapportVisite(){
        $req = "SELECT id FROM rapport ORDER BY 1 desc limit 1"; 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetch();
            return $laLigne[0];

	}
    public static function rapportVisitePersonne($unIdVisiteur){
        $req = "SELECT DISTINCT date FROM rapport WHERE idVisiteur='$unIdVisiteur' ORDER BY 1 DESC"; 
        
 
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchall();
            return $laLigne;

	}
    public static function rapportVisiteDate($unIdVisiteur,$uneDate){
        $req = " SELECT * FROM rapport WHERE idVisiteur='$unIdVisiteur' and date='$uneDate'";        
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchAll();
            return $laLigne;

	}
    public static function rapportVisiteUnVisiteur($unIdVisiteur,$unId){
        $req = " SELECT * FROM rapport WHERE idVisiteur='$unIdVisiteur' and id='$unId'";        
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchAll();
            return $laLigne[0];
        }


    public function updateRapport(){
        $req = " UPDATE rapport set date='$this->dateRapport', motif='$this->motif', bilan='$this->bilanRapport'  WHERE id='$this->idRapport'";        
            $res = PdoGsb::get_monPdo()->query($req);
  
	}
    public static function rapportMedecin($Idmed){
       
        $req = " SELECT * FROM rapport,visiteur WHERE rapport.idMedecin=$Idmed AND rapport.idVisiteur=visiteur.id order BY 2";        
            $res = PdoGsb::get_monPdo()->query($req);
            $laLigne = $res->fetchAll();
            return $laLigne;
        }

}

?>