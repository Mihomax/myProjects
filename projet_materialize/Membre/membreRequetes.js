//requêtes films

function enregistrerMembre(){

	var form = $('#formInscription')[0];
	var formMembre = new FormData(form);
	formMembre.append('action','enregistrermembre');
	
	$.ajax({
		type : 'POST',
		url : 'membre/membreControleur.php',
		data : formMembre,
		dataType : 'json', //text pour le voir en format de string
		enctype: 'multipart/form-data',
		//async : false,
		cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){ //alert(reponse);
		},
		error : function (err){
		}
	});
}

function afficherMembres(){
	$("#contenuMembre").show();
	document.getElementById("contenuMembre").innerHTML = afficherChargement();
	var postData = { action : "affichermembres" };
	$.ajax({
		url : 'membre/membreControleur.php',
		data : postData,
		type : 'POST',
		dataType : 'json',
		success : function (reponse){ //alert(reponse);
				afficherMembresInfo(reponse);
		},
		error : function (err){
		}
	});

}

function recupererInfoMembre(numMembre){

	var postData = { action : "afficherunmembre", numMb : numMembre };
	$.ajax({
		url : 'membre/membreControleur.php',
		data : postData,
		type : 'POST',
		dataType : 'json',
		success : function (reponse){ //alert(reponse);
				chargerProfil(reponse);
		},
		error : function (err){
		}
	});

}

function changerStatusMembre(numero,status){
	var postData = { action : "changerstatusmembre", identifiant: numero, statusMembre: status };
	$.ajax({
		url : 'membre/membreControleur.php',
		data : postData,
		type : 'POST',
		dataType : 'json',
		success : function (reponse){ //alert(reponse);
				afficherMembres();
		},
		error : function (err){
		}
	});
}

function supprimerMembre(numero){
	
	document.getElementById("carteMembre").innerHTML = afficherChargement();
	var postData = { action : "supprimermembre", identifiant: numero };
	$.ajax({
		url : 'membre/membreControleur.php',
		data : postData,
		type : 'POST',
		dataType : 'json',
		success : function (reponse){ //alert(reponse);
			afficherMembres();
		},
		error : function (err){
		}
	});
}


function modifierMembre(numero,pseudo_m,profil){
	
	var formMembre = new FormData();

	formMembre.append('action','modifiermembre');
	formMembre.append('identifiant',numero);
	formMembre.append('nom_m',document.getElementById("nom"+pseudo_m).value);
	formMembre.append('prenom_m',document.getElementById("prenom"+pseudo_m).value);
	formMembre.append('pseudo_m',document.getElementById("pseudo"+pseudo_m).value);

	var trouveNomFich = "input[name='avatar"+ pseudo_m +"']";
	imgfich = $(trouveNomFich)[0].files[0];
	formMembre.append('nouvelavatarimg',imgfich);

	nomfich = $(trouveNomFich).val();
	nomfich = nomfich.replace(/\\/g, '/').replace(/.*\//, '');
	formMembre.append('nouvelavatarnom',nomfich);

		$.ajax({
		url : 'membre/membreControleur.php',
		data : formMembre,
		type : 'POST',
		enctype: 'multipart/form-data',
		contentType: false,
		processData: false,
		dataType : 'json',
		success : function (reponse){ //alert(reponse);
			if(!profil) afficherMembres();
		},
		error : function (err){
		}
	});
	
}