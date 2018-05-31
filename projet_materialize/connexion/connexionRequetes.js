//requêtes membres

function connecterMembre(){
	
	var form = $('#formConnexion')[0];
	var formMembre = new FormData(form);
	formMembre.append('action','connecterMembre');
	$.ajax({
		url : 'connexion/connexionControleur.php',
		data : formMembre,
		type : 'POST',
		dataType : 'json',
		enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
		success : function (reponse){ //alert(reponse);
				membreVueConnection(reponse);
		},
		error : function (err){
		}
	});
}

function deconnecterMembre(){
	localStorage.clear();  //supprime tous les items dans le cache
}