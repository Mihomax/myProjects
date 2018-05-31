//requ�tes films
function enregistrerMessage(){

	var identifiant = JSON.parse(localStorage.getItem("identifiantmbr"));
	
	$("#formEnregMes").hide();
	
	document.getElementById("contenuMes").innerHTML = afficherChargement();
	$("#contenuMes").show();

	var formMessage = new FormData(document.getElementById('formEnregMes'));
	formMessage.append('action','enregistrer');
	formMessage.append('idmembre',identifiant);

	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessage,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
					
		},
		fail : function (err){
		   
		}
	});
}

function listerMess(){
	document.getElementById("contenuMes").innerHTML = afficherChargement();
	var formMessage = new FormData();
	formMessage.append('action','lister');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessage,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}

function filtrerCateg(){
	document.getElementById("contenuMes").innerHTML = afficherChargement();
	var formMessage = new FormData(document.getElementById('formCategMes'));
		formMessage.append('action','filtrerCateg');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessage,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}

function filtrerMembre(){
	var formMessage = new FormData(document.getElementById('formMemMes'));
		formMessage.append('action','filtrerMembre');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessage,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}

function enleverMess(idmes){
	var leForm=document.getElementById(idmes);
	var formMessage = new FormData(leForm);
	formMessage.append('action','enlever');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessage,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					//messageVue(reponse);
					listerMess();
		},
		fail : function (err){
		}
	});
}

function listerMessDev(){
	
	var formMessDev = new FormData();
	formMessDev.append('action','listerMessDev');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessDev,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}

function enregistrerMessDev () {

	var identifiant = JSON.parse(localStorage.getItem("identifiantmbr"));
	
	
	
	
	
	var formMessage = new FormData(document.getElementById('formEnregMessDev'));
	formMessage.append('action','enregistrerMessDev');
	formMessage.append('idmembre',identifiant);

	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessage,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
					
					
		},
		fail : function (err){
		   
		}
	});
}function listerMessAst(){
	
	var formMessAst = new FormData();
	formMessAst.append('action','listerMessAst');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessAst,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}


function listerMessEv(){
	
	var formMessEv = new FormData();
	formMessEv.append('action','listerMessEv');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessEv,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}


function listerMessMJ(){
	
	var formMessMJ = new FormData();
	formMessMJ.append('action','listerMessMJ');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessMJ,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}



function listerMessVente() {
	
	var formMessVente = new FormData();
	formMessVente.append('action','listerMessVente');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessVente,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}

function listerMessEch() {
	
	var formMessEch = new FormData();
	formMessEch.append('action','listerMessEch');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messages/messagesControleur.php',
		data : formMessEch,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					messageVue(reponse);
		},
		fail : function (err){
		}
	});
}


function refreshListMesUser() {

	if (JSON.parse(localStorage.getItem("role")) !== "ADMIN"){
		listerMessDev();
	}
}