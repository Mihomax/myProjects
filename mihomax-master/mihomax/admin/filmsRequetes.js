//requ�tes films
function enregistrer() {
    if (validateFormNewFilm()) {
	var formFilm = new FormData(document.getElementById('ajouter'));
	formFilm.append('action', 'enregistrer');
	$.ajax({
	    type : 'POST',
	    url : 'admin/filmsControleur.php',
	    data : formFilm,
	    dataType : 'json', // text pour le voir en format de string
	    // async : false,
	    // cache : false,
	    contentType : false,
	    processData : false,
	    success : function(reponse) {// alert(reponse);
		filmsVue(reponse);
	    },
	    fail : function(err) {

	    }
	});
    }
}

function listerFilmsAdmin() {
    var formFilm = new FormData();
    formFilm.append('action', 'lister');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'admin/filmsControleur.php',
	data : formFilm,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    filmsVue(reponse);
	},
	fail : function(err) {
	}
    });
}

function listerTop() {
    var formFilm = new FormData();
    formFilm.append('action', 'topfilms');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'admin/filmsControleur.php',
	data : formFilm,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    filmsVue(reponse);
	},
	fail : function(err) {
	}
    });
}
function enlever(idf) {
    var formFilm = new FormData();
    formFilm.append('idf', idf);
    formFilm.append('action', 'enlever');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'admin/filmsControleur.php',
	data : formFilm,// leForm.serialize(),
	contentType : false, // Enlever ces deux directives si vous utilisez
	// serialize()
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    filmsVue(reponse);
	},
	fail : function(err) {
	}
    });
}

function obtenirFiche(idf) {
    var formFilm = new FormData();
    formFilm.append('idf', idf);
    formFilm.append('action', 'fiche');
    $.ajax({
	type : 'POST',
	url : 'admin/filmsControleur.php',
	data : formFilm,
	contentType : false,
	processData : false,
	dataType : 'json',
	success : function(reponse) {// alert(reponse);
	    filmsVue(reponse);
	},
	fail : function(err) {
	}
    });
}

function modifierFilm() {
    if (validateFormModifier()) {
	var leForm = document.getElementById('updateFilm');
	var formFilm = new FormData(leForm);
	formFilm.append('action', 'modifier');
	$.ajax({
	    type : 'POST',
	    url : 'admin/filmsControleur.php',
	    data : formFilm,
	    contentType : false,
	    processData : false,
	    dataType : 'json',
	    success : function(reponse) {
		// alert("All good in controler: " + reponse.e);
		filmsVue(reponse);
	    },
	    fail : function(err) {
		alert("Error in controler: " + reponse.e);
	    }
	});
    }
}

function showFilmDescription(idf) {
    var formFilm = new FormData();
    formFilm.append('action', 'description');// alert(formFilm.get("action"));
    formFilm.append('idf', idf);
    $.ajax({
	type : 'POST',
	url : 'admin/filmsControleur.php',
	data : formFilm,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    filmsVue(reponse);
	},
	fail : function(err) {
	}
    });
}

function filtrerFilms() {
    var leForm = document.getElementById('formFilter');
    var formFilm = new FormData(leForm);
    formFilm.append('action', 'filtrer');
    $.ajax({
	type : 'POST',
	url : 'admin/filmsControleur.php',
	data : formFilm,
	contentType : false,
	processData : false,
	dataType : 'json',
	success : function(reponse) {
	    // alert("All good in controler: " + reponse.e);
	    filmsVue(reponse);
	},
	fail : function(err) {
	    alert("Error in controler: " + reponse.e);
	}
    });

}

function montreCatalogueByRequet(nom, genre, pays) {
    $('#formFilter input[name=nom]').val(nom);
    if (genre == "") {
	$("#selectGenre").prop("selectedIndex", 0);
    } else {
	$('#selectGenre option[value=' + genre + ']').attr('selected',
	        'selected');
    }
    if (pays == "") {
	$("#selectPays").prop("selectedIndex", 0);
    } else {
	$('#selectPays option[value=' + pays + ']')
	        .attr('selected', 'selected');
    }
    filtrerFilms();
}