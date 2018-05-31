function currentUser() {
    var formUser = new FormData();
    formUser.append('action', 'getuser');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'users/userControleur.php',
	data : formUser,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    userVue(reponse);
	},
	fail : function(err) {
	}
    });
}
function userLogin() {
    if (validateFormLogin()) {
	var formUser = new FormData(document.getElementById('formLogin'));
	formUser.append('action', 'connection');
	$.ajax({
	    type : 'POST',
	    url : 'users/userControleur.php',
	    data : formUser,
	    dataType : 'json', // text pour le voir en format de string
	    // async : false,
	    // cache : false,
	    contentType : false,
	    processData : false,
	    success : function(reponse) {
		// alert("reponse: " + reponse);
		userVue(reponse);
	    },
	    fail : function(err) {

	    }
	});
    }
}

function userRegistration() {
    if (validateFormNewUser()) {
	var formUser = new FormData(document.getElementById('formRegistration'));
	formUser.append('action', 'registration');
	$.ajax({
	    type : 'POST',
	    url : 'users/userControleur.php',
	    data : formUser,
	    dataType : 'json', // text pour le voir en format de string
	    // async : false,
	    // cache : false,
	    contentType : false,
	    processData : false,
	    success : function(reponse) {
		// alert("reponse: " + reponse.e);
		userVue(reponse);
	    },
	    fail : function(err) {
		alert("error in ajax user registration:" + err);
	    }
	});
    }
}

function userLogout() {
    var formUser = new FormData();
    formUser.append('action', 'logout');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'users/userControleur.php',
	data : formUser,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    userVue(reponse);
	},
	fail : function(err) {
	}
    });
}