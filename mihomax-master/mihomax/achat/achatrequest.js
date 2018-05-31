//requêtes films
function enregistrerAchat() {
    var formAchat = new FormData();
    formAchat.append('action', 'acheter');
    $.ajax({
	type : 'POST',
	url : 'achat/achatcontroleur.php',
	data : formAchat,
	dataType : 'json', // text pour le voir en format de string
	// async : false,
	// cache : false,
	contentType : false,
	processData : false,
	success : function(reponse) {// alert(reponse);
	    achatVue(reponse);
	},
	fail : function(err) {

	}
    });
}

function lister() {
    var formAchat = new FormData();
    formAchat.append('action', 'lister');// alert(formAchat.get("action"));
    $.ajax({
	type : 'POST',
	url : 'achat/achatcontroleur.php',
	data : formAchat,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    AchatVue(reponse);
	},
	fail : function(err) {
	}
    });
}
