//vue jeux
function listerJ(listJeux){
	var taille;

	//var rep="<div class='table-users' style='overflow: scroll; height: 500px;'>";
	//rep+="<div class='header'>Liste des jeux<span style='float:right;padding-right:20px;cursor:pointer;' onClick=\"$('#contenu').hide();\">X</span></div>";
	var rep ="<br><table class=\"table responsive-table\">";
	rep+="<tr><th>AVATAR</th><th>PSEUDO</th><th>IDMembre</th><th>IDJeux</th><th>JEU</th><th>CATEGORIE</th><th>TRAILER</th><th>POCHETTE</th><th>FICHIER</th><th>DESCRIPTION</th><th>NBLIKE</th><th>NBDISLIKE</th><th>SUPPRIMER</th><th>STATUS</th></tr>";
	taille=listJeux.length;
	for(var i=0; i<taille; i++){
		rep+="<tr><td><img src=\"avatar/"+ listJeux[i].avatar +"\" alt=\"avatar_membre\" height=\"80px\" width=\"80px\"/></td><td>"+listJeux[i].pseudo+"</td><td>"+
		listJeux[i].idm+"</td><td>"+listJeux[i].idj+"</td><td>"+listJeux[i].nom+"</td><td>"+listJeux[i].nomCat+"</td><td>"+
		listJeux[i].trailer+"</td><td><img src='images.jeu/"+listJeux[i].pochette+"' style=\"opacity: 0.8;\"width=160 height=110></td><td><a HREF='./installables/"+
		listJeux[i].fichej+"' download>Telecharger</a></td><td>"+listJeux[i].descr+"</td><td> "+ listJeux[i].nblike +"</td><td>";
		rep+=listJeux[i].nbdislike +"</td><form  id=\"jeu"+listJeux[i].idj+"\"><input type=\"hidden\" name=\"numjeu\" value=\""+listJeux[i].idj+"\"/></td>";
		rep+="<td><input class=\"btn btn-success\"type=\"button\" onClick=\"enleverJeu("+listJeux[i].idj+");\" value=\"Supprimer\" ></form></td>";

		if ( listJeux[i].statusj == "activé") {
			rep+=" <td><button type=\"button\" class=\"btn btn-danger\" onclick=\"changerStatusJeu("+listJeux[i].idj+",0)\">Désactiver</button></td> ";
		} else rep+=" <td><button type=\"button\" class=\"btn btn-success\" onclick=\"changerStatusJeu("+ listJeux[i].idj+ ",1)\">Activer</button></td></tr>";
		
			
	}
	rep+="</table>";
	rep+="</div>";	
	$('#contenuJeux').html(rep);
	$("#contenuJeux").show();
}
function afficherFiche(reponse){
  var uneFiche;
  if(reponse.OK){
	uneFiche=reponse.fiche;
	$('#formFicheF h3:first-child').html("Fiche du film numero "+uneFiche.idf);
	$('#idf').val(uneFiche.idf);
	$('#titreF').val(uneFiche.titre);
	$('#dureeF').val(uneFiche.duree);
	$('#resF').val(uneFiche.res);
	$('#divFormFiche').show();
	document.getElementById('divFormFiche').style.display='block';
  }else{
	$('#messages').html("Film "+$('#numF').val()+" introuvable");
	setTimeout(function(){ $('#messages').html(""); }, 5000);
  }

}

function chargerListeJeux(reponse,categorie){
	var taille;
	taille=reponse.listeJeux.length;
	var trouve = false;
	var rep="";

	if (JSON.parse(localStorage.getItem("role")) === "UTILISATEUR"){
		rep+="<a href=\"#\" class=\"left\" onclick=\"afficherJeuxUser()\" style=\"color: #669999;\">Ajouter un nouveau jeu</a><br><br>";

	}

	for(var i=0; i<taille; i++){
		
		lsteJeux = reponse.listeJeux[i];


		if((categorie == 'touslesjeux' || lsteJeux.nomCat == categorie) && lsteJeux.statusj != 'désactivé' ){

			rep+="      <div class=\"s12 m6\" style=\"display: inline-block;margin: 0 auto;\"> "; 
			rep+="       <div class=\"card text-center m-1\" style=\"width: 200px; border: 1px solid #ff9900; height: width: 100px;\">"; 
			rep+="         <div class=\"card-image\"> "; 
			rep+="           <img src=\"images.jeu/" + lsteJeux.pochette +"\" style=\"opacity: 0.8;\">"; 
			rep+="           <span class=\"card-title\">" + lsteJeux.nom +"</span>"; 
			rep+="         </div> "; 
			rep+="         <div class=\"card-content\">"; 
			rep+="           <p class=\"couleurCyan\">"+ lsteJeux.descr +" </p>";
			rep+="           <p class=\"text-muted\"><small>"+ lsteJeux.nomCat +" </small></p>";  
			rep+="         </div> "; 
			
			if (JSON.parse(localStorage.getItem("role")) === "UTILISATEUR"){
				rep+="         <div class=\"card-action\"> ";
				rep+="           <a href=\"./installables/"+lsteJeux.fichej+"\" download>Telecharger</a>"; 
				rep+="   	   </div> "; 
			}

			
			rep+="     </div> "; 
			rep+="   </div>";

			//trouve = true;
		}
	}

	$('#contenuListJeu').html(rep);

	$("#contenu").show();
	$("#contenuListJeu").show();

}
/*fonction ajoutée par Ralph*/
function cacherFormJeux(){
	
	$("#carteJeux").show();
	$("#divEnregJeu").hide();
	$("#contenuJeux").hide();
}

/*fonction ajoutée par Ralph*/
function afficherJeuxAdmin() {

	$("#imgAdmin").show();
	$("#imgUser").hide();
	$("#contenu").hide();
	$("#contenuMembre").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#message").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").show();
	$("#listerSupprJeu").show();

	cacherFormJeux();
}

/*fonction ajoutée par Ralph*/
function afficherJeuxUser() {

	$("#imgAdmin").hide();
	$("#imgUser").show();
	$("#contenu").hide();
	$("#contenuMembre").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#message").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").show();

	$("#carteJeux").show();
	$("#divEnregJeu").hide();
	$("#contenu").hide();
	$("#listerSupprJeu").hide();
	$("#contenuListJeu").hide();
	
	
}

function afficherListJeuxUser() {

	$("#imgAdmin").hide();
	$("#imgUser").show();
	$("#contenu").show();
	$("#contenuMembre").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#message").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
	$("#contenuListJeu").show();
	
	// gestion des sections messages-jeux
	$("#espaceListeJeu").show();
	$("#messagesSec").hide();
	$("#eventSec").hide();
	

	cacherFormJeux();
}

var jeuVue=function(reponse){
	var action=reponse.action;
	switch(action){
		case "enregistrer" :
		$("#contenuJeux").hide();
		$("#formEnregJeux").show();
		break;
		case "enlever" :
		case "modifier" :
		case "lister" :
		case "changerstatusjeu" :
			$("#contenuJeux").hide();
			listerJ(reponse.listeJeux);
		break;
		case "fiche" :
			afficherFiche(reponse);
		break;
		
	}
}

