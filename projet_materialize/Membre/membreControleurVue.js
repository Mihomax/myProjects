
function afficherMenuUtilisateur(){

	if (JSON.parse(localStorage.getItem("role")) === "ADMIN"){

		$('#menuUserOpt').hide();
		$('#MenuAdminOpt').show();
		$('#imgUser').hide();
		$('#imgAdmin').show();
		
		
	} else {
		$('#menuUserOpt').show();
		$('#MenuAdminOpt').hide();
		$('#imgUser').show();
		$('#imgAdmin').hide();
	}

}

function afficherPageAccueil(){

	
	afficherMenuUtilisateur();

	if (localStorage.getItem("pseudo") === null){
		afficherNavDepart();
	} else {
		var pseudo = JSON.parse(localStorage.getItem("pseudo"));
		var role = JSON.parse(localStorage.getItem("role"));
		var avatar = JSON.parse(localStorage.getItem("avatar"));
		var numMembre = JSON.parse(localStorage.getItem("identifiantmbr"));
		afficherNavMembre(pseudo,role,avatar);
	}

	if (JSON.parse(localStorage.getItem("role")) === "ADMIN"){
		
		rendreVisiblePgAdmin();
		afficherLesMembres();
		recupererInfoMembre(numMembre);
		
	} else if (JSON.parse(localStorage.getItem("role")) === "UTILISATEUR"){
		
		listerJeux('touslesjeux');
		rendreVisiblePgUtilisateur();
		recupererInfoMembre(numMembre);
	} else {
		listerJeux('touslesjeux');
		rendreVisiblePgNonMembre();
	}
	
}

function rendreVisiblePgNonMembre(){
	
	$("#imgAdmin").hide();
	$("#imgUser").show();
	$("#contenu").show();
	$("#contenuListJeu").show();
	$("#contenuMembre").hide();
	$("#message").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
}

function rendreVisiblePgUtilisateur(){
	
	$("#imgAdmin").hide();
	$("#imgUser").show();
	$("#contenu").show();
	$("#contenuListJeu").show();
	$("#contenuMembre").hide();
	$("#message").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
	
}

function rendreVisiblePgAdmin(){
	$("#imgAdmin").show();
	$("#imgUser").hide();
	$("#contenu").hide();
	$("#contenuListJeu").hide();
	$("#contenuMembre").show();
	$("#message").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#sectionMes").hide();
	$("#sectionJeux").hide();
	$("#sectionEvents").hide();
}
function afficherInfoMembre(){
	$("#imgAdmin").hide();
	$("#imgUser").hide();
	$("#contenu").hide();
	$("#contenuListJeu").hide();
	$("#contenuMembre").show();
	$("#message").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#sectionMes").hide();
	$("#sectionJeux").hide();
	$("#sectionEvents").hide();
}

function afficherProfilMembre(){
	$("#imgAdmin").hide();
	$("#imgUser").hide();
	$("#contenu").hide();
	$("#contenuListJeu").hide();
	$("#contenuMembre").hide();
	$("#message").hide();
	$("#profilMembre").show();
	$("#carteConnexion").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
}

function detruireContenuMbr(){
	document.getElementById("contenuMembre").innerHTML = "";
	document.getElementById("profilMembre").innerHTML = "";
	document.getElementById("contenuListJeu").innerHTML = "";
}

function afficherNavDepart(){
	 
	var barnav = "       <ul id=\"nav-mobile\" class=\"right\"> ";
	barnav+=" 			<li href=\"#\" class=\"nav-item\" onclick=\"retournerPagePrec()\">";
	barnav+= "				<i class=\"large material-icons\" style=\"cursor: pointer; display: block;\">home</i>";
	barnav+=" 			</li> ";   
	barnav+="         <li><a href=\"#\" onclick=\"devenirMembre();\">Devenir membre</a></li> "; 
	barnav+="         <li><a href=\"#\" onclick=\"afficherSeConnecter();\">Se connecter</a></li> "; 
	barnav+="       </ul> ";

	document.getElementById("navigation").innerHTML = barnav;
		
}

function afficherNavMembre(pseudo,role,avatar){

	var barnav = "       <ul id=\"nav-mobile\" class=\"right\"> ";
	barnav+=" 			<li class=\"nav-item pt-2\">";
	barnav+= "				<img  class=\"nav_avatar_membre\" src=\"avatar/"+ avatar +"\" alt=\"avatar_membre\" height=\"60px\" width=\"60px\"/>";
	barnav+=" 			</li> "; 
	barnav+=" 			<li class=\"nav-item\"> ";
	barnav+=" 			  <a href=\"#\">";
	barnav+= pseudo;
	barnav+=" 			  </a> "; 
	barnav+=" 			</li> ";
	barnav+=" 			<li class=\"nav-item \" onclick=\"retournerPagePrec()\">";
	barnav+= "				<i class=\"large material-icons\" style=\"cursor: pointer; display: block;\">home</i>";
	barnav+=" 			</li> "; 


	if (role === "ADMIN"){
		barnav+= "<li class=\"nav-item\">";
		barnav+= "<a href=\"#\" onclick=\"rendreVisiblePgAdmin();\">";
		barnav+= "Gestion</a></li>";
	}

	var numMembre = JSON.parse(localStorage.getItem("identifiantmbr"));

	barnav+=" 			<li class=\"nav-item\"> "; 
	barnav+=" 			  <a href=\"#\" onclick=\"afficherProfilMembre();\" style=\"padding-left: 20px;\"> "; 
	barnav+=" 				Mon Profil "; 
	barnav+=" 			  </a> "; 
	barnav+=" 			</li> "; 

	barnav+=" 			<li class=\"nav-item\"> "; 
	barnav+=" 			  <a href=\"#\" onclick=\"deconnecterMembre();detruireContenuMbr();afficherPageAccueil();afficherNavDepart()\" style=\"padding-left: 20px;\"> "; 
	barnav+=" 				Se déconnecter "; 
	barnav+=" 			  </a> "; 
	barnav+=" 			</li> "; 
	barnav+=" 		</ul> ";
	
	document.getElementById("navigation").innerHTML = barnav;
		
}

function retournerPagePrec(){
	if (JSON.parse(localStorage.getItem("role")) === "ADMIN"){
		rendreVisiblePgAdmin();
	} else {
		rendreVisiblePgUtilisateur();
	}
}

function chargerProfil(reponse){

	
	var numMembre = JSON.parse(localStorage.getItem("identifiantmbr"));

	var pseudoMembre = reponse.Membre.pseudo;
	var nomMembre = reponse.Membre.nom;
	var prenomMembre = reponse.Membre.prenom;

	var membres=" 		<div id=\"carteProfil\" class=\"card p-5 s12 m12 gray-box centrer\" style=\"width: 43%; margin-top: 1%\"> ";
	membres+="		<img  class=\"nav_avatar_membre centrer\" src=\"avatar/"+ reponse.Membre.avatar +"\" alt=\"avatar_membre\" height=\"150px\" width=\"150px\"/>";
	

	if (JSON.parse(localStorage.getItem("role")) === "ADMIN") {
		membres+="      <br><h2 class=\"centrer\">" + reponse.Membre.pseudo + "&nbsp;&nbsp;&nbsp;<img class=\"centrer\" src=\"images.app/medaille_or.png\" alt=\"medaillon\" height=\"50px\" width=\"30px\"/></h2>";
	} else membres+="      <br><h2 class=\"centrer\">" + reponse.Membre.pseudo + "&nbsp;&nbsp;&nbsp;<img class=\"centrer\" src=\"images.app/medaille_argent.png\" alt=\"medaillon\" height=\"50px\" width=\"50px\"/></h2>"; 
	
	//membres+="        <br><h2 class=\"centrer\">" + reponse.Membre.pseudo + "</h2> ";
	membres+="               <form id=\"loginForm\"> "; 
	membres+="                     <div class=\"form-group\"> "; 
	membres+="                         <label class=\"col-xs-3 control-label\">Avatar</label> "; 
	membres+="                         <div class=\"col-xs-5\"> "; 
	membres+="                             <input type=\"file\" class=\"form-control\" id=\"avatar"+ pseudoMembre +"\" name=\"avatar"+ pseudoMembre +"\" /> "; 
	membres+="                         </div> "; 
	membres+="                     </div> ";  
	membres+="                     <div class=\"form-group\"> "; 
	membres+="                         <label class=\"col-xs-3 control-label\">Pseudo</label> "; 
	membres+="                         <div class=\"col-xs-5\"> "; 
	membres+="                             <input type=\"text\" class=\"form-control\"  id=\"pseudo"+ pseudoMembre +"\" name=\"pseudo"+ pseudoMembre +"\" value=\"" + pseudoMembre + "\" /> "; 
	membres+="                         </div> "; 
	membres+="                     </div> ";
	membres+="                     <div class=\"form-group\"> "; 
	membres+="                         <label class=\"col-xs-3 control-label\">Nom</label> "; 
	membres+="                         <div class=\"col-xs-5\"> "; 
	membres+="                             <input type=\"text\" class=\"form-control\"  id=\"nom"+ pseudoMembre +"\" name=\"nom"+ pseudoMembre +"\" value=\"" + nomMembre + "\" /> "; 
	membres+="                         </div> "; 
	membres+="                     </div> ";
	membres+="                     <div class=\"form-group\"> "; 
	membres+="                         <label class=\"col-xs-3 control-label\">Prénom</label> "; 
	membres+="                         <div class=\"col-xs-5\"> "; 
	membres+="                             <input type=\"text\" class=\"form-control\"  id=\"prenom"+ pseudoMembre +"\" name=\"prenom"+ pseudoMembre +"\" value=\"" + prenomMembre + "\" /> ";  
	membres+="                         </div> "; 
	membres+="                     </div> "; 
	membres+="                     <div class=\"form-group\"> "; 
	membres+="                         <div class=\"col-xs-5 col-xs-offset-3\"> "; 
	membres+="                             <button type=\"button\" class=\"btn btn-success\" onclick=\"modifierMembre(" + numMembre + ",'" + pseudoMembre +"',1);retournerPagePrec();\">Modifier</button> "; 
	membres+="                             <button type=\"button\" class=\"btn btn-success\" onclick=\"retournerPagePrec();\">Cancel</button> "; 
	membres+="                         </div> "; 
	membres+="                     </div> "; 
	membres+="                 </form> ";
	membres+="                 </div> ";

	document.getElementById("profilMembre").innerHTML = wraphaut + membres + wrapbas;
}

function devenirMembre(){
	afficherInfoMembre();
	$("#carteConnexion").hide();
	var inscription = " <div class=\"container-fluid\"> "; 
	inscription+=" 			<div class=\"row\" style=\"margin-top: 3%;\"> ";
	inscription+=" 			<div class=\"col-1\"></div> ";  
	inscription+="        <div class=\"col-10 s12 m6\">";
	inscription+="  		<div id=\"carteDevMbr\"class=\"card\" style=\"width: 100%\;border: 1px solid #cc7a00;box-shadow: 0 5px 15px rgba(0,0,0,0);\">";
	inscription+=" 				<div class=\"card-content\"> "; 
	inscription+=" 					<h3>S'inscrire</h3> "; 
	inscription+=" 					<form name=\"formInscription\" id=\"formInscription\"> ";
	inscription+=" 						  <div class=\"input-field col s12\"> "; 
	inscription+=" 							<label for=\"nom\" class=\"active\">Nom</label> "; 
	inscription+=" 							<input type=\"text\" name=\"nom\" id=\"nom\">"; 
	inscription+=" 						  </div> ";
	inscription+=" 						  <div class=\"input-field col s12\"> "; 
	inscription+=" 							<label for=\"prenom\" class=\"active\">prenom</label> "; 
	inscription+=" 							<input type=\"text\" name=\"prenom\" id=\"prenom\">"; 
	inscription+=" 						  </div> ";  
	inscription+=" 						  <div class=\"input-field col s12\"> "; 
	inscription+=" 							<label for=\"pseudo\" class=\"active\">Pseudonyme</label> "; 
	inscription+=" 							<input type=\"text\" name=\"pseudodm\" id=\"pseudodm\">"; 
	inscription+=" 						  </div> "; 	
	inscription+=" 						  <div class=\"input-field col s12\"> "; 
	inscription+=" 							<label for=\"courriel\" class=\"active\">Courriel</label> "; 
	inscription+=" 							<input type=\"email\" name=\"courriel\" id=\"courriel\" placeholder=\"Courriel\" required> "; 
	inscription+=" 						  </div> "; 
	inscription+=" 						  <div class=\"input-field col s12\"> "; 
	inscription+=" 							<label for=\"datenaissance\" class=\"active\">Date de naissance</label> "; 
	inscription+=" 							<input type=\"date\" name=\"datenaissance\" id=\"datenaissance\" placeholder=\"aaaa-mm-jj\" min=\"1899-02-26\" max=\"2000-02-26\" required> "; 
	inscription+=" 						  </div> "; 
	inscription+=" 						  <div class=\"input-field col s12\"> "; 
	inscription+=" 							<label for=\"motDePasse\" class=\"active\">Mot de passe</label> "; 
	inscription+=" 							<input type=\"password\" name=\"motdepasse\" id=\"motdepasse\" placeholder=\"Mot de passe\" required> "; 
	inscription+=" 						  </div> ";
	inscription+="  					  <div class=\"input-field col s12\"> "; 
	inscription+="  						<label for=\"avatarm\" class=\"active\">Pochette</label> "; 
	inscription+="  						<input type=\"file\" name=\"avatarm\" id=\"avatarm\"/> "; 
	inscription+="  					  </div> ";
	inscription+=" 						  <button name=\"button\" type=\"button\" onclick=\"enregistrerMembre();retournerPagePrec();\" class=\"btn btn-primary cyan darken-2\" style=\"width: 100px; border-color: transparent; margin-top: 2%;\">S'incrire</button> ";
	inscription+=" 						  <button name=\"button\" type=\"button\" onclick=\"retournerPagePrec();\" class=\"btn btn-primary cyan darken-2\" style=\"width: 100px; border-color: transparent; margin-top: 2%;\">Cancel</button> ";
	inscription+=" 					</form> "; 
	inscription+=" 				</div> "; 
	inscription+=" 			</div> "; 
	inscription+=" 		</div> ";
	inscription+=" 			<div class=\"col-1\"></div> "; 
	inscription+=" 		</div> "; 
	inscription+=" 	</div> ";

	document.getElementById("contenuMembre").innerHTML = inscription;
}

function afficherMembresInfo(reponse){
	
	rendreVisiblePgAdmin();
	if(reponse.OK){
		var nb_membres = reponse.listeMembres.length;

		var membres = "<div id=\"carteMembre\" class=\"card s12 m12 text-center\" style=\"display: block; margin: 0 auto;\">";
		membres += " <table class=\"table responsive-table\" style=\"transform: scale(.9);\"> ";
		membres+=" 		<thead> "; 
		membres+=" 		  <tr> ";
		membres+=" 			<th scope=\"col\">Avatar</th>";
		membres+=" 			<th scope=\"col\">Pseudo</th> "; 
		membres+=" 			<th scope=\"col\">nom</th> "; 
		membres+=" 			<th scope=\"col\">Prénom</th> "; 
		membres+=" 			<th scope=\"col\"> Status</th> ";
		membres+=" 			<th scope=\"col\"> Modifier</th> "; 
		membres+=" 			<th scope=\"col\"> Supprimer</th> ";  
		membres+=" 		  </tr> "; 
		membres+=" 		</thead> "; 
		membres+=" 		<tbody> "; 
		var statusmembre;
		var numMembre;
		for (var i=0; i < nb_membres ;i++){
			membres+=" 		  <tr>";
			membres+="<td><img  class=\"nav_avatar_membre\" src=\"avatar/"+ reponse.listeMembres[i].avatar +"\" alt=\"avatar_membre\" height=\"100px\" width=\"100px\"/></td>";
			membres+=" 			<td class=\"align-middle\">" + reponse.listeMembres[i].pseudo+"</td> "; 
			membres+=" 			<td class=\"align-middle\">"+ reponse.listeMembres[i].nom +"</td> "; 
			membres+=" 			<td class=\"align-middle\">" + reponse.listeMembres[i].prenom +"</td> ";

			statusmembre = reponse.listeMembres[i].status;
			numMembre = reponse.listeMembres[i].idm;

			if ( statusmembre == "activé") {
				membres+=" <td class=\"align-middle\"><button type=\"button\" class=\"btn btn-danger\" onclick=\"changerStatusMembre("+numMembre+",0)\">Désactiver</button></td> ";
			} else membres+=" <td class=\"align-middle\"><button type=\"button\" class=\"btn btn-success\" onclick=\"changerStatusMembre("+ numMembre+ ",1)\">Activer</button></td> ";

			membres+=" <td class=\"align-middle\"><i class=\"medium material-icons couleurCyan pointer\" data-toggle=\"modal\" data-target=\"#loginModal"+ i +"\">create</i></td> ";
			membres+=" <td class=\"align-middle\"><i class=\"medium material-icons couleurCyan pointer\" onclick=\"supprimerMembre("+ numMembre + ")\">delete</i></td> ";
			membres+=" 		  </tr>";
		}

		//modal
		for (var j=0; j < nb_membres ;j++){

			numMembre = reponse.listeMembres[j].idm;
			pseudoMembre = reponse.listeMembres[j].pseudo;
			nomMembre = reponse.listeMembres[j].nom;
			prenomMembre = reponse.listeMembres[j].prenom;

			membres+=" <div class=\"modal fade\" id=\"loginModal"+ j +"\" tabindex=\"-1\" role=\"dialog\" style=\"z-index: 9999;\" aria-labelledby=\"Login\" aria-hidden=\"true\"> "; 
			membres+="     <div class=\"modal-dialog\"> "; 
			membres+="         <div class=\"modal-content\"> "; 
			membres+="             <div class=\"modal-header\"> "; 
			membres+="                 <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"> "; 
			membres+="                     <span aria-hidden=\"true\">&times;</span> "; 
			membres+="                 </button> "; 
			membres+="             </div> "; 
			membres+="             <div class=\"modal-body\"> "; 
			membres+="                 <form id=\"loginForm"+ pseudoMembre +"\"> "; 
			membres+="                     <div class=\"form-group\"> "; 
			membres+="                         <label class=\"col-xs-3 control-label\">Avatar</label> "; 
			membres+="                         <div class=\"col-xs-5\"> "; 
			membres+="                             <input type=\"file\" class=\"form-control\" id=\"avatar"+ pseudoMembre +"\" name=\"avatar"+ pseudoMembre +"\" /> "; 
			membres+="                         </div> "; 
			membres+="                     </div> ";  
			membres+="                     <div class=\"form-group\"> "; 
			membres+="                         <label class=\"col-xs-3 control-label\">Pseudo</label> "; 
			membres+="                         <div class=\"col-xs-5\"> "; 
			membres+="                             <input type=\"text\" class=\"form-control\"  id=\"pseudo"+ pseudoMembre +"\" name=\"pseudo"+ pseudoMembre +"\" value=\"" + pseudoMembre + "\" /> "; 
			membres+="                         </div> "; 
			membres+="                     </div> ";
			membres+="                     <div class=\"form-group\"> "; 
			membres+="                         <label class=\"col-xs-3 control-label\">Nom</label> "; 
			membres+="                         <div class=\"col-xs-5\"> "; 
			membres+="                             <input type=\"text\" class=\"form-control\"  id=\"nom"+ pseudoMembre +"\" name=\"nom"+ pseudoMembre +"\" value=\"" + nomMembre + "\" /> "; 
			membres+="                         </div> "; 
			membres+="                     </div> ";
			membres+="                     <div class=\"form-group\"> "; 
			membres+="                         <label class=\"col-xs-3 control-label\">Prénom</label> "; 
			membres+="                         <div class=\"col-xs-5\"> "; 
			membres+="                             <input type=\"text\" class=\"form-control\"  id=\"prenom"+ pseudoMembre +"\" name=\"prenom"+ pseudoMembre +"\" value=\"" + prenomMembre + "\" /> ";  
			membres+="                         </div> "; 
			membres+="                     </div> "; 
			membres+="                     <div class=\"form-group\"> "; 
			membres+="                         <div class=\"col-xs-5 col-xs-offset-3\"> "; 
			membres+="                             <button type=\"button\" class=\"btn btn-primary indigo darken-1\" data-dismiss=\"modal\" aria-label=\"Close\" onclick=\"modifierMembre(" + numMembre + ",'" + pseudoMembre +"',0)\">Modifier</button> "; 
			membres+="                             <button type=\"button\" class=\"btn btn-default indigo darken-1\" data-dismiss=\"modal\">Cancel</button> "; 
			membres+="                         </div> "; 
			membres+="                     </div> "; 
			membres+="                 </form> "; 
			membres+="             </div> "; 
			membres+="         </div> "; 
			membres+="     </div> "; 
			membres+=" </div> ";
			
		}

		membres+=" 		</tbody> "; 
		membres+=" 	  </table>";
		
		membres+=" </div> ";
		
		document.getElementById("contenuMembre").innerHTML = membres ;

	} else {
		var msgAlerte = "<span class=\"alert alert-success col-6\" role=\"alert\"> Aucun utilisateur pour le moment </span>";
		document.getElementById("contenuMembre").innerHTML =  wraphaut + msgAlerte + wrapbas;
	}
}

function afficherLesMembres(){

	$("#contenu").show();
	$("#contenuMembre").hide();
	$("#contenuListJeu").hide();
	$("#carteConnexion").hide();
	$("#message").hide();
	$("#sectionMes").hide();
	$("#sectionJeux").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
	afficherMembres();
}