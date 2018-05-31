//requ�tes films
function enregistrerJeu(){

	var identifiant = JSON.parse(localStorage.getItem("identifiantmbr"));
	
	$("#formEnregJeux").hide();
	
	document.getElementById("contenuJeux").innerHTML = afficherChargement();
	$("#contenuJeux").show();

	var formJeux = new FormData(document.getElementById('formEnregJeux'));
	formJeux.append('action','enregistrer');
	formJeux.append('idmembre',identifiant);
	$.ajax({
		type : 'POST',
		url : 'jeu/jeuControleur.php',
		data : formJeux,
		dataType : 'json', //text pour le voir en format de string
		//async : false, deprecated XMLHttpRequest feature
		cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					jeuVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
/*
function chargerListeJeu(){
	var formJeux = new FormData(document.getElementById('formEnregJeux'));
	formJeux.append('action','enregistrer');
	$.ajax({
		type : 'POST',
		url : 'jeu/jeuControleur.php',
		data : formJeux,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){alert(reponse);
					//jeuVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}*/

function listerJeux(categorie){
	
	if (JSON.parse(localStorage.getItem("role")) === "ADMIN"){
	document.getElementById("contenuJeux").innerHTML = afficherChargement();
	$("#contenuJeux").show();
	}
	
	if (JSON.parse(localStorage.getItem("role")) !== "ADMIN"){
		afficherListJeuxUser();
	}
	var formJeux = new FormData();
	formJeux.append('action','lister');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'jeu/jeuControleur.php',
		data : formJeux,
		//async : false, deprecated XMLHttpRequest feature
		cache : false,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
				if (JSON.parse(localStorage.getItem("role")) === "ADMIN") jeuVue(reponse);
				else chargerListeJeux(reponse,categorie);
		},
		fail : function (err){
		}
	});
}

function enleverJeu(identj){
	document.getElementById("contenuJeux").innerHTML = afficherChargement();
	$("#contenuJeux").show();

	var leForm=document.getElementById(identj);
	var formJeu = new FormData(leForm);
	formJeu.append('identJeu',identj);
	formJeu.append('action','enlever');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'jeu/jeuControleur.php',
		data : formJeu,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					//jeuVue(reponse);
					listerJeux('null');
		},
		fail : function (err){
		}
	});
}

function changerStatusJeu(numero,status){

	var postData = { action : "changerstatusjeu", idjeu: numero, statusjeu: status };
	$.ajax({
		url : 'jeu/jeuControleur.php',
		data : postData,
		type : 'POST',
		dataType : 'json',
		success : function (reponse){ //alert(reponse);
				listerJeux('touslesjeux');
		},
		error : function (err){
		}
	});
}