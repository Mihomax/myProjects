var _indexEvenement = 1;
var _indexImage = 0;
var _data;
var _idev;
var _isModifier;

function setIsModifier(isModifier){
	_isModifier = isModifier;
}

function listerAdmin(listEvenements){
	_data = listEvenements;
	showEvenementAdmin();
}

function listerNormal(listEvenements){
	_data = listEvenements;
	showEvenement();
}

function showEvenementAdmin(){	
	//var rep="<div class='table-users' style='overflow: scroll; height: 500px;'>";
	//rep+="<div class='header'>Liste des evenements<span style='float:right;padding-right:20px;cursor:pointer;' onClick=\"$('#contenu').hide();\">X</span></div>";
	var rep ="<br><table class=\"table responsive-table\">";
	rep+="<tr><th>IdEvenement</th><th>Titre</th><th>Date</th><th>Description</th><th>Image1</th><th>Image2</th><th>Image3</th><th>MODIFIER</th><th>SUPPRIMER</th></tr>";
	for(var i = 0; i<_data.length; i++){
		rep +="<tr>"
		 + "<td>"+_data[i].idev +"</td>"
		 + "<td>"+_data[i].titre+"</td>"
		 + "<td>"+_data[i].dateev+"</td>"
		 + "<td>"+_data[i].descr +"</td>"
		 + "<td><img src=\"images/"+ _data[i].img1 +"\" alt=\"pas d'image\" height=\"80px\" width=\"80px\"/></td>" 
		 + "<td><img src=\"images/"+ _data[i].img2 +"\" alt=\"pas d'image\" height=\"80px\" width=\"80px\"/></td>" 
		 + "<td><img src=\"images/"+ _data[i].img3 +"\" alt=\"pas d'image\" height=\"80px\" width=\"80px\"/></td>" 
		 + "<td><input class=\"btn btn-success\"type=\"button\" onClick=\"showModifier("+_data[i].idev+",\'"+_data[i].titre+"\',\'"+_data[i].descr+"\',\'"+_data[i].dateev+"\');\" value=\"Modifier\" ></td>"
		 + "<td><input class=\"btn btn-success\"type=\"button\" onClick=\"supprimerEvents("+_data[i].idev+");\" value=\"Supprimer\" ></td>"
		 + "</tr>";	
	}
	rep+="</table>";
	rep+="</div>";	
	$('#contenuEvents').html(rep);
	$("#contenuEvents").show();
}

function showEvenement(){	
	//evenement
	if (_indexEvenement < 1) _indexEvenement = _data.length - 1;
	else if (_indexEvenement >= _data.length) _indexEvenement = 1;
	var evenement = _data[_indexEvenement];
	var frm = "";	
	if (evenement == null) {
		frm += "<div></div>";
	} else {
		//Prochain
		frm += "<div>";
		frm += "<h2>Notre prochain événement ....</h2></br><br>";
		frm += "<img class=\"responsive-img\" style=\"height:400px;border-radius: 25px;\" src=\"images/" + _data[0].img1 + "\"></img></br></br>";
		frm += "<h4 style=\"width:600px;margin:auto;\">" + _data[0].descr + "</h4></br></br></br></br></br>";
		frm += "</div><hr>";
		//Historique
		_idev = evenement.idev;
		//images
		var images = [];		
		if (evenement.img1 != null && evenement.img1 != "") images.push(evenement.img1);
		if (evenement.img2 != null && evenement.img2 != "") images.push(evenement.img2);
		if (evenement.img3 != null && evenement.img3 != "") images.push(evenement.img3);
		if (_indexImage < 0) _indexImage = images.length - 1;
		else if (_indexImage >= images.length) _indexImage = 0;
		//Structure
		frm += "<div>";
		frm += "<h2>Historique des événement</h2></br>";
		frm += "<button class=\"waves-effect waves-light btn\"onclick=\"_indexEvenement--;showEvenement();\">Previous</button>&nbsp;&nbsp;"
		frm += "<button class=\"waves-effect waves-light btn\"onclick=\"_indexEvenement++;showEvenement();\">Next</button></br></br></br>"
		frm += "&nbsp;&nbsp;<a id=\"previous\" onclick=\"_indexImage--;showEvenement();\"><img src=\"imagesevenements/avant.png\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;"
		if (images.length > 0) frm += "<img style=\"height:500px;border-radius: 25px;\"class=\"responsive-img\"src=\"images/" + images[_indexImage] + "\"></img>&nbsp;&nbsp;&nbsp;&nbsp;";
		frm += "<a id=\"next\" onclick=\"_indexImage++;showEvenement();\"><img src=\"imagesevenements/apres.png\" /></a></br></br>"
		frm += "<h4 style=\"width:800px;margin:auto;\">" + evenement.descr + "</h8>";
		frm += "</div>";	
	}	
	document.getElementById("eventSec").innerHTML = frm;
	
	$("#espaceListeJeu").hide();
	$("#eventSec").show();
	$("#messagesSec").hide();
	$("#carteDevMbr").hide();
	$("#carteConnexion").hide();
	
	
}

function showModifier(idev, titre, descr, dateev){
	$("#contenuEvents").hide();
	document.getElementById('dateev').value = dateev;
	cacherFormEvents();
	rendreVisible('divEnregEvents');
	rendreVisibleEnr();
	_idev = idev;
	document.getElementById('titre').value = titre;
	document.getElementById('dateev').value = dateev;
	document.getElementById('descr').value = descr;
}

function rendreVisibleEnr(){
	document.getElementById('titre').value = "";
	document.getElementById('descr').value = "";
	document.getElementById('dateev').value = "";
	document.getElementById("labelTitre").style.visibility = "visible";
	document.getElementById("labelDateEv").style.visibility = "visible";
	document.getElementById("labelDesc").style.visibility = "visible";
}

/*fonction ajoutée par Ralph*/
function cacherFormEvents(){
	$("#divEnregEvents").hide();
	$("#contenuEvents").hide();
}

/*fonction ajoutée par Ralph*/
function afficherEventsAdmin() {
	$("#imgAdmin").show();
	$("#imgUser").hide();
	$("#contenu").hide();
	$("#profilMembre").hide();
	$("#contenuMembre").hide();
	$("#carteConnexion").hide();
	$("#message").hide();
	$("#sectionMes").hide();
	$("#sectionEvents").show();
	$("#sectionJeux").hide();
	cacherFormEvents();
}

function afficherEvents() {
	$("#imgAdmin").hide();
	$("#imgUser").show();
	$("#contenu").show();
	$("#profilMembre").show();
	$("#contenuMembre").show();
	$("#carteConnexion").hide();
	$("#message").show();
	$("#sectionMes").hide();
	$("#sectionEvents").hide();
	$("#sectionJeux").hide();
	cacherFormEvents();
	listerEvents(false);
}

function eventsVue(reponse, isAdmin){

	var erreur = reponse.erreur;
	var action=reponse.action; 
	switch(action){
		case "enregistrer" :
		case "supprimer" :
		case "modifier" :
		$("#messagesEvents").show();
		if (!erreur){
			$('#messagesEvents').html(reponse.msg);
			setTimeout(function(){ $('#messagesEvents').html(""); }, 5000);
		} else {
			$('#messagesEvents').html(erreur);
		}
		break;
		case "lister" :
			if (isAdmin){
				listerAdmin(reponse.listeEvenements);
			} else {
				listerNormal(reponse.listeEvenements);
			}
		break;
		
	}
}

