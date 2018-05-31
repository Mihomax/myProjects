
var wraphaut = "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col s12 m6 text-center\">";
var wrapbas = "</div></div></div>";

					 
function afficherSeConnecter(){

	afficherInfoMembre();
	$("#contenuMembre").hide();
	var formConnexion = " 	<div class=\"container-fluid pt-2\" style=\"margin-top: 4%;\"> "; 

	formConnexion+=" 		<div class=\"row pt-5\"> "; 
	formConnexion+=" 			<div class=\"col-3\"></div> "; 
	formConnexion+=" 			<div class=\"col-6\"> "; 
	formConnexion+=" 				<div class=\"card p-5\" style=\"border: 1px solid #cc7a00;box-shadow: 0 5px 15px rgba(0,0,0,0);\"> "; 
	formConnexion+=" 					<h3 class=\"text-muted pb-2\">Se connecter</h3> ";
	formConnexion+=" 					<form id=\"formConnexion\"> "; 
	formConnexion+=" 						  <div class=\"input-field col s12\"> "; 
	formConnexion+=" 								<label for=\"courriel\" class=\"active\">Courriel</label>"; 
	formConnexion+=" 								<input type=\"email\" name=\"courriel\" id=\"courriel\" placeholder=\"Courriel\" value=\"\"/> "; 
	formConnexion+=" 						  </div> "; 
	formConnexion+=" 						  <div class=\"input-field col s12\">";
	formConnexion+=" 								<label for=\"passwd\" class=\"active\">Mot de passe</label>"; 
	formConnexion+=" 								<input type=\"password\" name=\"passwd\" id=\"passwd\" placeholder=\"Mot de passe\" value=\"\"/> "; 
	formConnexion+=" 						  </div> ";  
	formConnexion+=" 							<button type=\"button\" onclick=\"connecterMembre()\" class=\"btn btn-primary cyan darken-2\" style=\"width: 130px; border-color: transparent; margin-top: 5%;\">Se connecter</button> "; 
	formConnexion+=" 							<button type=\"button\" onclick=\"retournerPagePrec()\" class=\"btn btn-primary cyan darken-2\" style=\"width: 130px; border-color: transparent; margin-top: 5%;\">Cancel</button> ";
	formConnexion+=" 					</form> "; 
	formConnexion+=" 				</div> "; 
	formConnexion+=" 			</div> "; 
	formConnexion+=" 			<div class=\"col-3\"></div> "; 
	formConnexion+=" 		</div> "; 
	
	document.getElementById("carteConnexion").innerHTML = formConnexion;

	$("#carteConnexion").show();

}

function membreVueConnection(reponse) {
	if(reponse.OK && reponse.Membre.status =="activé"){

		localStorage.setItem("identifiantmbr", JSON.stringify(reponse.Membre.idm));
		localStorage.setItem("pseudo", JSON.stringify(reponse.Membre.pseudo));
		localStorage.setItem("role", JSON.stringify(reponse.Membre.role));
		localStorage.setItem("avatar", JSON.stringify(reponse.Membre.avatar));
		afficherPageAccueil();
		
	} else if (reponse.Membre.status =="désactivé") {

		var msgAlerte= "<span class=\"alert alert-danger col-6\" role=\"alert\"> <b>Votre compte est désactivé </b></span>";
		document.getElementById("message").innerHTML = wraphaut + msgAlerte + wrapbas;
		$("#message").show();

	} else {
		var credinvalide = "<span class=\"alert alert-info col-6\" role=\"alert\"> <b>Email ou mot de passe invalide</b> </span>";
		document.getElementById("message").innerHTML = wraphaut + credinvalide + wrapbas;
		$("#message").show();
	}
	
}