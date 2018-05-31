var allElemId = [ "divNavbar", "divMenu", "divSlider", "divCarooselFilms",
        "divFooter", "divCatalogue", "divSingle", "divPanier", "divLogin",
        "divRegistration", "divAdmin", "divSocialIcons", "divAjouterFilm",
        "divListerFilms", "divMettreAJourFilm", "divGetByIdFilms",
        "divStatistiqueFilms" ];
var recettes = {
    mainPage : [ 0, 1, 2, 3, 4, 11 ],
    catalogPage : [ 0, 1, 4, 5, 11 ],
    singlePage : [ 0, 1, 4, 6, 11 ],
    panierPage : [ 0, 1, 4, 7, 11 ],
    loginPage : [ 0, 1, 4, 8, 11 ],
    registrPage : [ 0, 1, 4, 9, 11 ],
    adminPageCreate : [ 4, 10, 12 ],
    adminPageLister : [ 4, 10, 13 ],
    adminPageGetFilmUpdate : [ 4, 10, 15 ],
    adminPageUpdate : [ 4, 10, 14 ],
    adminPageDelete : [ 4, 10, 15 ],
    adminPageStatistic : [ 4, 10, 16 ]
};

function showRecette(recetteNom) {
    if (recetteNom != "panierPage") {
	$('#divSingle').html("");
    }
    var components = recettes[recetteNom];
    $('.hsdiv').hide();
    for (var i = 0; i < components.length; i++) {
	document.getElementById(allElemId[components[i]]).style.display = "block";
    }
}

function clearBlocks() {
    $('#divSingle').html("");
    // user registration
    $('#username').val("");
    $('#password1').val("");
    $('#password2').val("");
    $('#nom').val("");
    $('#prenom').val("");
    $('#email').val("");
    $('#datnais').val("");
    // enregistrer film
    $('#titre').val("");
    $('#duree').val("");
    $('#res').val("");
    $('#genre').removeAttr('selected');
    $('#pays').removeAttr('selected');
    $('#prix').val("");
    $('#trailer').val("");
    $('#rating').val("");
    $('#descr').val("");
    $('#pochette').val("");
}

function validDate(date) {
    var d_arr = date.split('-');
    var d = new Date(d_arr[0] + '/' + d_arr[1] + '/' + d_arr[2] + '');
    if (d_arr[0] != d.getFullYear() || d_arr[1] != (d.getMonth() + 1)
	    || d_arr[2] != d.getDate()) {
	return false;
    }
    ;
    return true;
}

function validateFormModifier() {
    var reponse = "";
    if ($('#titreU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Titre ne peut pas être vide</p>";
    }
    if ($('#dureeU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Duree ne peut pas être vide</p>";
    } else if ($('#dureeU').val().trim() < 1
	    || $('#dureeU').val().trim() > 10000) {
	reponse += "<p class=\"text-danger\">Duree doit être plus que 0 et mois que 10000</p>";
    }
    if ($('#resU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Realisateur ne peut pas être vide</p>";
    }
    if ($('#genreU').val() == null || $('#genreU').val().length < 1
	    || $('#genreU').val().length > 3) {
	reponse += "<p class=\"text-danger\">Il faut 1, 2 ou 3 genres </p>";
    }
    if ($('#paysU').val() == null) {
	reponse += "<p class=\"text-danger\">Il faut choisire pays </p>";
    }
    if ($('#prixU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Prix ne peut pas être vide</p>";
    }
    if ($('#trailerU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Trailer ne peut pas être vide</p>";
    }
    if ($('#ratingU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Rating ne peut pas être vide</p>";
    } else if ($('#ratingU').val().trim() < 0 || $('#ratingU').val().trim() > 5) {
	reponse += "<p class=\"text-danger\">Rating doit etre entre 0 et 5 </p>";
    }
    if ($('#descrU').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Description ne peut pas être vide</p>";
    }
    if (reponse == "") {
	$('#divMettreAJourFilm .panel-footer').html("");
	return true;
    } else {
	$('#divMettreAJourFilm .panel-footer').html(reponse);
	return false;
    }

}

function validateFormNewFilm() {
    var reponse = "";
    if ($('#titre').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Titre ne peut pas être vide</p>";
    }
    if ($('#duree').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Duree ne peut pas être vide</p>";
    } else if ($('#duree').val().trim() < 1 || $('#duree').val().trim() > 10000) {
	reponse += "<p class=\"text-danger\">Duree doit être plus que 0 et mois que 10000</p>";
    }
    if ($('#res').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Realisateur ne peut pas être vide</p>";
    }
    if ($('#genre').val() == null || $('#genre').val().length < 1
	    || $('#genre').val().length > 3) {
	reponse += "<p class=\"text-danger\">Il faut 1, 2 ou 3 genres </p>";
    }
    if ($('#pays').val() == null) {
	reponse += "<p class=\"text-danger\">Il faut choisire pays </p>";
    }
    if ($('#prix').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Prix ne peut pas être vide</p>";
    }
    if ($('#trailer').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Trailer ne peut pas être vide</p>";
    }
    if ($('#rating').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Rating ne peut pas être vide</p>";
    } else if ($('#rating').val().trim() < 0 || $('#rating').val().trim() > 5) {
	reponse += "<p class=\"text-danger\">Rating doit etre entre 0 et 5 </p>";
    }
    if ($('#descr').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Description ne peut pas être vide</p>";
    }
    if (reponse == "") {
	$('#divAjouterFilm .panel-footer').html("");
	return true;
    } else {
	$('#divAjouterFilm .panel-footer').html(reponse);
	return false;
    }

}

function validateFormNewUser() {
    var reponse = "";
    if ($('#username').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Pseudo ne peut pas être vide</p>";
    }
    if ($('#password1').val().trim().length == 0
	    || $('#password2').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Mot de passe ne peut pas être vide</p>";
    } else if ($('#password1').val() != $('#password2').val()) {
	reponse += "<p class=\"text-danger\">Les mots de passe que vous avez entrés ne correspondent pas</p>";
    }
    if ($('#nom').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Nom ne peut pas être vide</p>";
    }
    if ($('#prenom').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Prenom ne peut pas être vide</p>";
    }
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (!testEmail.test($('#email').val().trim())) {
	reponse += "<p class=\"text-danger\">Adresse e-mail incorrecte</p>";
    }
    if (!validDate($('#datnais').val().trim())) {
	reponse += "<p class=\"text-danger\">Date incorrecte</p>";
    }
    if (reponse == "") {
	$('#divRegistration .panel-footer').html("");
	return true;
    } else {
	$('#divRegistration .panel-footer').html(reponse);
	return false;
    }
}
function validateFormLogin() {
    var reponse = "";
    if ($('#usernameL').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Pseudo ne peut pas être vide</p>";
    }
    if ($('#passwordL').val().trim().length == 0) {
	reponse += "<p class=\"text-danger\">Mot de passe ne peut pas être vide</p>";
    }
    if (reponse == "") {
	$('#divLogin .panel-footer').html("");
	return true;
    } else {
	$('#divLogin .panel-footer').html(reponse);
	return false;
    }
}

function rendreVisible(elem) {
    document.getElementById(elem).style.display = 'block';
}

function rendreInvisible(elem) {
    document.getElementById(elem).style.display = 'none';
}

function validerNum(elem) {
    var num = document.getElementById(elem).value;
    var numRegExp = new RegExp("^[0-9]{1,4}$");
    if (num != "" && numRegExp.test(num))
	return true;
    return false;
}

function valider() {
    var num = document.getElementById('num').value;
    var titre = document.getElementById('titre').value;
    var duree = document.getElementById('duree').value;
    var res = document.getElementById('res').value;
    var numRegExp = new RegExp("^[0-9]{1,4}$");
    if (num != "" && titre != "" && duree != "" && res != "")
	if (numRegExp.test(num))
	    return true;
    return false;
}
