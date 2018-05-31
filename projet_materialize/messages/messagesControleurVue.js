//vue films
function listerF(listMess){
	var taille;
	//var rep="<div class='table-users'>";
	//rep+="<div class='header'>Tous les messages<span style='float:right;padding-right:10px;cursor:pointer;' onClick=\"$('#contenuMes').hide();\">X</span></div>";
	var rep="<table class=\"table\" style=\"transform: scale(.9);\">";
	rep+="<tr><th>ID</th><th>AVATAR</th><th>PSEUDO</th><th>MESSAGE</th><th>IMAGE</th><th>CATEGORIE</th><th>DATE</th><th>SUPPRIMER</th></tr>";
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<tr><td>"+listMess[i].idmes+"</td><td><img src='avatar/"+listMess[i].avatar+"' width=80 height=80></td><td>"+listMess[i].pseudo+"</td><td>"+listMess[i].message+
		"</td><td><img src='images/"+listMess[i].image+"' width=80 height=80></td><td>"+listMess[i].nom+
		"</td><td>"+listMess[i].datemes+"</td><td><form  id=\""+listMess[i].idmes+"\"><input type=\"hidden\" name=\"numE\" value=\""+listMess[i].idmes+
		"\"/><input class=\"btn btn-danger\"type=\"button\" onClick=\"enleverMess("+listMess[i].idmes+
		");\"value=\"Supprimer\" ></form></td></tr>";			 
	}
	
	rep+="</table>";
	//rep+="</div>";
	$('#contenuMes').html(rep);
}

/*fonction ajoutée par Ralph*/
function cacherFormMessages(){
	
	$("#carteMess").show();
	$("#divCategMes").hide();
	$("#divMemMes").hide();
	$("#divEnregMes").hide();
	$("#contenuMes").hide();
}

/*fonction ajoutée par Ralph*/
function afficherMessagesAdmin() {

	$("#imgAdmin").show();
	$("#imgUser").hide();
	$("#contenu").hide();
	$("#contenuListJeu").hide();
	$("#contenuMembre").hide();
	$("#profilMembre").hide();
	$("#carteConnexion").hide();
	$("#message").hide();
	$("#sectionMes").show();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
	// pour les messages Hovhannes
	$('#gestionMesAdmin').show();
	$("#eventSec").hide();
	cacherFormMessages();
}

/*fonction ajoutée par Hovhannes*/
function afficherClubDisc() {

	var clubDiscMenu = "<div id = \"clubDisc\"class=\"row\">";
	
	clubDiscMenu += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessDev();\"href = \"#\"><h3>Developpeurs<\/h3><img src =\"images\/SVG\/Round Icons\/Coding-Html.svg\"></a></div><br>";
	clubDiscMenu += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessAst();\"href = \"#\"><h3>Astuces<\/h3><img src =\"images\/SVG\/Round Icons\/Magician.svg\"></a></div><br>";
	clubDiscMenu += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessEv();\"href = \"#\"><h3>Evenements<\/h3><img src =\"images\/SVG\/Round Icons\/Apartment.svg\"></a></div><br>";
	clubDiscMenu += "<div class = \"clubDiscMenu\"><a href = \"#\"><h3>Meilleurs Jeux<\/h3><img src =\"images\/SVG\/Round Icons\/Medal-2.svg\"></a></div></div><br>";
	
	$("#messagesSec").html(clubDiscMenu);
	$("#espaceListeJeu").hide();
	$("#eventSec").hide();
	$("#messagesSec").show();
	$("#carteDevMbr").hide();
	$("#carteConnexion").hide();


}



function afficherVenteEch() {

	var venteEch = "<div id = \"venteEch\"class=\"row\">";
	
	venteEch += "<div class = \"venteEchMenu\"><a onClick=\"listerMessVente();\"href = \"#\"><h3>Vente<\/h3><img src =\"images\/SVG\/Round Icons\/Shop.svg\"></a></div><br>";
	venteEch += "<div class = \"venteEchMenu\"><a onClick=\"listerMessEch();\"href = \"#\"><h3>Echange<\/h3><img src =\"images\/SVG\/Round Icons\/Television-Shelf.svg\"></a></div></div><br>";
	
	
	$("#messagesSec").html(venteEch);
	$("#espaceListeJeu").hide();
	$("#messagesSec").show();
	$("#eventSec").hide();
	$("#carteDevMbr").hide();
	$("#carteConnexion").hide();


}

function listerMessD(listMess){
	var taille;
	
	var rep = "<div id = \"clubDisc\"class=\"row\">";
	
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessDev();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Coding-Html.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessAst();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Magician.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessEv();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Apartment.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessMJ();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Medal-2.svg\"></a></div></div><br>";

	rep +="<h2>Developpeurs</h2><br>";
	
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<div id = \"messagesUser\" style = \"background-color:white;width:1000px;height:200px; margin: auto;\">"+
		"<div id = \"nomUser\"style = \"background-color:#5bc0de;width:1000px;height:50px; color:white;\">"+
		"<h3 style = \"float:left;padding-left:20px;\">"+listMess[i].pseudo+"<\/h3><h4 style = \"float:right;padding-right:20px;\">"+listMess[i].datemes+
		"<\/h4><\/div><div id = \"avatarUser\"style = \"float:left;width:200px;height:150px; border-right: 1px solid #5bc0de;\">"+
		"<img src='avatar/"+listMess[i].avatar+"' width=100 height=100 style=\"border-radius:50%;padding:10px;\"><\/div>"+
		"<div id=\"textUser\" style = \"float:left; margin:auto;width:600px;height:100px;\"><h5 style=\"padding:25px;\">"+
		listMess[i].message+"<\/h5><\/div><div id = \"imageUser\"style = \"float:left;width:200px;height:150px; border-left: 1px solid #5bc0de;\">"+
		"<img src='images/"+listMess[i].image+"' width=150 height=150><\/div><\/div><br>";
		}
	
	rep+="<a class=\"btn-floating btn-large cyan pulse\" onclick=\"cacherFormMessages();rendreVisible('divEnregMes');$('#sectionMes').show();$('#gestionMesAdmin').hide();\"><i class=\"material-icons\">edit</i></a>"

	$('#messagesSec').html(rep);

}



function listerMessA(listMess){
	var taille;
	
	
	var rep = "<div id = \"clubDisc\"class=\"row\">";
	
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessDev();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Coding-Html.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessAst();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Magician.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessEv();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Apartment.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessMJ();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Medal-2.svg\"></a></div></div><br>";

	rep +="<h2>Astuces</h2><br>";
	
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<div id = \"messagesUser\" style = \"background-color:white;width:1000px;height:200px; margin: auto;\">"+
		"<div id = \"nomUser\"style = \"background-color:#5bc0de;width:1000px;height:50px; color:white;\">"+
		"<h3 style = \"float:left;padding-left:20px;\">"+listMess[i].pseudo+"<\/h3><h4 style = \"float:right;padding-right:20px;\">"+listMess[i].datemes+
		"<\/h4><\/div><div id = \"avatarUser\"style = \"float:left;width:200px;height:150px; border-right: 1px solid #5bc0de;\">"+
		"<img src='avatar/"+listMess[i].avatar+"' width=100 height=100 style=\"border-radius:50%;padding:10px;\"><\/div>"+
		"<div id=\"textUser\" style = \"float:left; margin:auto;width:600px;height:100px;\"><h5 style=\"padding:25px;\">"+
		listMess[i].message+"<\/h5><\/div><div id = \"imageUser\"style = \"float:left;width:200px;height:150px; border-left: 1px solid #5bc0de;\">"+
		"<img src='images/"+listMess[i].image+"' width=150 height=150><\/div><\/div><br>";
		}
	
	rep+="<a class=\"btn-floating btn-large cyan pulse\" onclick=\"cacherFormMessages();rendreVisible('divEnregMes');$('#sectionMes').show();$('#gestionMesAdmin').hide();\"><i class=\"material-icons\">edit</i></a>"

	$('#messagesSec').html(rep);
	
	
}

function listerMessE(listMess){
	var taille;
	var rep = "<div id = \"clubDisc\"class=\"row\">";
	
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessDev();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Coding-Html.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessAst();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Magician.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessEv();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Apartment.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessMJ();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Medal-2.svg\"></a></div></div><br>";

	rep +="<h2>Evenements</h2><br>";
	
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<div id = \"messagesUser\" style = \"background-color:white;width:1000px;height:200px; margin: auto;\">"+
		"<div id = \"nomUser\"style = \"background-color:#5bc0de;width:1000px;height:50px; color:white;\">"+
		"<h3 style = \"float:left;padding-left:20px;\">"+listMess[i].pseudo+"<\/h3><h4 style = \"float:right;padding-right:20px;\">"+listMess[i].datemes+
		"<\/h4><\/div><div id = \"avatarUser\"style = \"float:left;width:200px;height:150px; border-right: 1px solid #5bc0de;\">"+
		"<img src='avatar/"+listMess[i].avatar+"' width=100 height=100 style=\"border-radius:50%;padding:10px;\"><\/div>"+
		"<div id=\"textUser\" style = \"float:left; margin:auto;width:600px;height:100px;\"><h5 style=\"padding:25px;\">"+
		listMess[i].message+"<\/h5><\/div><div id = \"imageUser\"style = \"float:left;width:200px;height:150px; border-left: 1px solid #5bc0de;\">"+
		"<img src='images/"+listMess[i].image+"' width=150 height=150><\/div><\/div><br>";
		}
	
	rep+="<a class=\"btn-floating btn-large cyan pulse\" onclick=\"cacherFormMessages();rendreVisible('divEnregMes');$('#sectionMes').show();$('#gestionMesAdmin').hide();\"><i class=\"material-icons\">edit</i></a>"

	$('#messagesSec').html(rep);
	
}

function listerMessM(listMess){
	var taille;
	var rep = "<div id = \"clubDisc\"class=\"row\">";
	
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessDev();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Coding-Html.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessAst();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Magician.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessEv();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Apartment.svg\"></a></div><br>";
	rep += "<div class = \"clubDiscMenu\"><a onClick=\"listerMessMJ();\"href = \"#\"><img src =\"images\/SVG\/Round Icons\/Medal-2.svg\"></a></div></div><br>";

	rep +="<h2>Meilleurs Jeux</h2><br>";
	
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<div id = \"messagesUser\" style = \"background-color:white;width:1000px;height:200px; margin: auto;\">"+
		"<div id = \"nomUser\"style = \"background-color:#5bc0de;width:1000px;height:50px; color:white;\">"+
		"<h3 style = \"float:left;padding-left:20px;\">"+listMess[i].pseudo+"<\/h3><h4 style = \"float:right;padding-right:20px;\">"+listMess[i].datemes+
		"<\/h4><\/div><div id = \"avatarUser\"style = \"float:left;width:200px;height:150px; border-right: 1px solid #5bc0de;\">"+
		"<img src='avatar/"+listMess[i].avatar+"' width=100 height=100 style=\"border-radius:50%;padding:10px;\"><\/div>"+
		"<div id=\"textUser\" style = \"float:left; margin:auto;width:600px;height:100px;\"><h5 style=\"padding:25px;\">"+
		listMess[i].message+"<\/h5><\/div><div id = \"imageUser\"style = \"float:left;width:200px;height:150px; border-left: 1px solid #5bc0de;\">"+
		"<img src='images/"+listMess[i].image+"' width=150 height=150><\/div><\/div><br>";
		}
	
	rep+="<a class=\"btn-floating btn-large cyan pulse\" onclick=\"cacherFormMessages();rendreVisible('divEnregMes');$('#sectionMes').show();$('#gestionMesAdmin').hide();\"><i class=\"material-icons\">edit</i></a>"

	$('#messagesSec').html(rep);
	
	
}

function listerMessV(listMess){
	var taille;

	var rep = "<div id = \"venteEch\"class=\"row\">";
	
	rep += "<div class = \"venteEchMenu\"><a onClick=\"listerMessVente();\"href = \"#\"><h3>Vente<\/h3><img src =\"images\/SVG\/Round Icons\/Shop.svg\"></a></div><br>";
	rep += "<div class = \"venteEchMenu\"><a onClick=\"listerMessEch();\"href = \"#\"><h3>Echange<\/h3><img src =\"images\/SVG\/Round Icons\/Television-Shelf.svg\"></a></div></div><br>";

	rep +="<h2>Ventes</h2><br>";
	
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<div id = \"messagesUser\" style = \"background-color:white;width:1000px;height:200px; margin: auto;\">"+
		"<div id = \"nomUser\"style = \"background-color:#5bc0de;width:1000px;height:50px; color:white;\">"+
		"<h3 style = \"float:left;padding-left:20px;\">"+listMess[i].pseudo+"<\/h3><h4 style = \"float:right;padding-right:20px;\">"+listMess[i].datemes+
		"<\/h4><\/div><div id = \"avatarUser\"style = \"float:left;width:200px;height:150px; border-right: 1px solid #5bc0de;\">"+
		"<img src='avatar/"+listMess[i].avatar+"' width=100 height=100 style=\"border-radius:50%;padding:10px;\"><\/div>"+
		"<div id=\"textUser\" style = \"float:left; margin:auto;width:600px;height:100px;\"><h5 style=\"padding:25px;\">"+
		listMess[i].message+"<\/h5><\/div><div id = \"imageUser\"style = \"float:left;width:200px;height:150px; border-left: 1px solid #5bc0de;\">"+
		"<img src='images/"+listMess[i].image+"' width=150 height=150><\/div><\/div><br>";
		}
	
	rep+="<a class=\"btn-floating btn-large cyan pulse\" onclick=\"cacherFormMessages();rendreVisible('divEnregMes');$('#sectionMes').show();$('#gestionMesAdmin').hide();\"><i class=\"material-icons\">edit</i></a>"

	$('#messagesSec').html(rep);
	
	
}

function listerMessEchange(listMess){
	var taille;

	var rep = "<div id = \"venteEch\"class=\"row\">";
	
	rep += "<div class = \"venteEchMenu\"><a onClick=\"listerMessVente();\"href = \"#\"><h3>Vente<\/h3><img src =\"images\/SVG\/Round Icons\/Shop.svg\"></a></div><br>";
	rep += "<div class = \"venteEchMenu\"><a onClick=\"listerMessEch();\"href = \"#\"><h3>Echange<\/h3><img src =\"images\/SVG\/Round Icons\/Television-Shelf.svg\"></a></div></div><br>";

	rep +="<h2>Echanges</h2><br>";
	
	taille=listMess.length;
	for(var i=0; i<taille; i++){
		rep+="<div id = \"messagesUser\" style = \"background-color:white;width:1000px;height:200px; margin: auto;\">"+
		"<div id = \"nomUser\"style = \"background-color:#5bc0de;width:1000px;height:50px; color:white;\">"+
		"<h3 style = \"float:left;padding-left:20px;\">"+listMess[i].pseudo+"<\/h3><h4 style = \"float:right;padding-right:20px;\">"+listMess[i].datemes+
		"<\/h4><\/div><div id = \"avatarUser\"style = \"float:left;width:200px;height:150px; border-right: 1px solid #5bc0de;\">"+
		"<img src='avatar/"+listMess[i].avatar+"' width=100 height=100 style=\"border-radius:50%;padding:10px;\"><\/div>"+
		"<div id=\"textUser\" style = \"float:left; margin:auto;width:600px;height:100px;\"><h5 style=\"padding:25px;\">"+
		listMess[i].message+"<\/h5><\/div><div id = \"imageUser\"style = \"float:left;width:200px;height:150px; border-left: 1px solid #5bc0de;\">"+
		"<img src='images/"+listMess[i].image+"' width=150 height=150><\/div><\/div><br>";
		}
	
	rep+="<a class=\"btn-floating btn-large cyan pulse\" onclick=\"cacherFormMessages();rendreVisible('divEnregMes');$('#sectionMes').show();$('#gestionMesAdmin').hide();\"><i class=\"material-icons\">edit</i></a>"

	$('#messagesSec').html(rep);
	
	
}



var messageVue=function(reponse){
	var action=reponse.action; 
	switch(action){
		case "enregistrer" :
		$("#contenuMes").hide();
		$("#formEnregMes").show();
			//$('#messagesMes').html(reponse.msg);
			//setTimeout(function(){ $('#messagesMes').html(""); }, 5000);

		break;
		case "enlever":
		case "lister" :
		case "filtrerCateg" :
		case "filtrerMembre" :
			listerF(reponse.listeMessages);
		break;
		case "listerMessDev" :
			listerMessD(reponse.listeMessages);
		break;
		case "listerMessAst" :
			listerMessA(reponse.listeMessages);
		break;
		case "listerMessEv" :
			listerMessE(reponse.listeMessages);
		break;
		case "listerMessMJ" :
			listerMessM(reponse.listeMessages);
		break;
				case "listerMessMJ" :
			listerMessM(reponse.listeMessages);
		break;
		case "listerMessVente" :
			listerMessV(reponse.listeMessages);
		break;
		case "listerMessEch" :
			listerMessEchange(reponse.listeMessages);
		break;
		
	}
}

