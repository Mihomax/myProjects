//requ�tes events
function enregistrerEvents(){
	var frm = new FormData(document.getElementById('formEnregEvents'));
	if (_isModifier) frm.append('idev', _idev);	
	frm.append('action',_isModifier ? 'modifier' : 'enregistrer');	
	$.ajax({
		type : 'POST',
		url : 'evenements/eventControleur.php',
		data : frm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){ //alert(reponse);
			eventsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function listerEvents(isAdmin){
	var frm = new FormData();
	frm.append('action','lister');//	alert(frm.get("action"));
	document.getElementById("contenuEvents").innerHTML = afficherChargement();
	$.ajax({
		type : 'POST',
		url : 'evenements/eventControleur.php',
		data : frm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			//alert(reponse);
			eventsVue(reponse, isAdmin);
		},
		fail : function (err){
		}
	});
}

function supprimerEvents(idev){
	var frm = new FormData(document.getElementById('formEnregEvents'));
	frm.append('idev',idev);//alert(frm.get("action"));
	frm.append('action','supprimer');//alert(frm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'evenements/eventControleur.php',
		data : frm,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					eventsVue(reponse);
					//listerEvents(false);
		},
		fail : function (err){
		}
	});
}
