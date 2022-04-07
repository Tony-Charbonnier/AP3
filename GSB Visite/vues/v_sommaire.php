    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  Visiteur :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']."  ".$_SESSION['idVisiteur']   ?>
			</li>
           <li class="smenu">
              <a href="index.php?uc=gererRapport&action=selectMedecin" title="gérer mes rapports de visite">Crée un rapport de visite</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=modifRapport&action=mesRapport" title="Consultation de mes visites">Gerer mes rapports de visite</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=gererMedecin&action=selecMedecin" title="Consultation des medecins ">Les médecins</a>
           </li>
           
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
    