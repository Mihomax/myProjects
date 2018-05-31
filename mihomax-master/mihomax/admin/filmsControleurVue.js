//vue films
function listerFAdmin(listFilms) {
    var taille;
    var rep = "<div id=\"filmTable\">";
    rep += "<table class=\"table table-striped\">";
    rep += "<tr><th>NUMERO</th><th>TITRE</th><th>DUREE</th><th>REALISATEUR</th><th>GENRE</th><th>PAYS</th><th>PRIX</th><th>TRAILER</th><th>POCHETTE</th><th>RATING</th><th>DESCRIPTION</th><th>GESTION</th><th>GESTION</th></tr>";
    taille = listFilms.length;
    for (var i = 0; i < taille; i++) {
	rep += "<tr><td>"
	        + listFilms[i].idf
	        + "</td><td>"
	        + listFilms[i].titre
	        + "</td><td>"
	        + listFilms[i].duree
	        + "</td><td>"
	        + listFilms[i].res
	        + "</td><td>"
	        + listFilms[i].genres
	        + "</td><td>"
	        + listFilms[i].pays
	        + "</td><td>"
	        + listFilms[i].prix
	        + "</td><td>"
	        + listFilms[i].trailer
	        + "</td><td><img src='pochettes/"
	        + listFilms[i].pochette
	        + "' width='80' height='118'></td><td>"
	        + listFilms[i].rating
	        + "</td><td>"
	        + listFilms[i].descr
	        + "</td><td><form  id=\""
	        + listFilms[i].idf
	        + "\"><input type=\"hidden\" name=\"numE\" value=\""
	        + listFilms[i].idf
	        + "\"/><input class=\"btn btn-danger\"type=\"button\" onClick=\"enlever("
	        + listFilms[i].idf
	        + ");\" value=\"Supprimer\" ></form><td><form><input type=\"hidden\" name=\"numF\" value=\""
	        + listFilms[i].idf
	        + "\"/><input class=\"btn btn-primary\"type=\"button\" onClick=\"showAdminModifier("
	        + listFilms[i].idf
	        + ");\"value=\"Modifier\" ></form></td></tr>";
    }
    rep += "</table>";
    rep += "</div>";
    $('#divListerFilms .panel-body').html(rep);
}

function afficherFiche(reponse) {
    var uneFiche;
    if (reponse.OK) {

	uneFiche = reponse.fiche;
	var allGenres = uneFiche.genres.split(',');
	// $('#formFicheF h3:first-child').html(
	// "Fiche du film numero " + uneFiche.idf);
	$('#idfU').val(uneFiche.idf);
	$('#titreU').val(uneFiche.titre);
	$('#dureeU').val(uneFiche.duree);
	$('#resU').val(uneFiche.res);
	$('#prixU').val(uneFiche.prix);
	$('#trailerU').val(uneFiche.trailer);
	$('#ratingU').val(uneFiche.rating);
	$('#descrU').val(uneFiche.descr);
	$('#paysU').removeAttr('selected');
	$('#paysU option[value=' + uneFiche.pays + ']').attr('selected',
	        'selected');
	$('#genreU').removeAttr('selected');
	for (var i = 0; i < allGenres.length; i++) {
	    $('#genreU option[value=' + allGenres[i] + ']').attr('selected',
		    'selected');
	}

    } else {
	// $('#messages').html("Film " + $('#numE').val() + " introuvable");
	// setTimeout(function() {
	// $('#messages').html("");
	// }, 5000);
    }

}

function afficherTopFilms(listFilms) {
    var allFilms = listFilms.listeFilms;
    var res = "";
    for (var i = 0; i < allFilms.length; i++) {
	res += "<div class=\"col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 centered-text\">\n";
	res += "<div class=\"thumbnail\">";
	res += "<a href=\"#\" onclick=\"showFilm(" + allFilms[i].idf + ");\">";
	res += "<img src=\"pochettes/" + allFilms[i].pochette
	        + "\" alt=\"Image de film\" style=\"width:100%\">";
	res += "<div class=\"caption\">";
	res += "<p class=\"text-center\"><strong>" + allFilms[i].titre
	        + "</strong></p>";
	res += "<div class=\"w3l-movie-text text-center\">\n";
	res += "<p>" + allFilms[i].genres + "</p>";
	res += "</div>\n";
	res += "<div class=\"mid-2 agile_mid_2_home\">";
	res += "<p class=\"text-center\">" + allFilms[i].prix + " $</p>";
	res += "<div class=\"block-stars\">\n";
	res += "<ul class=\"w3l-ratings\">\n";
	for (var j = 0; j < Math.floor(allFilms[i].rating); j++) {
	    res += "<li><a href=\"#\"><i class=\"fa fa-star\" aria-hidden=\"true\"></i></a></li>\n";
	}
	for (var k = 0; k < (5 - Math.floor(allFilms[i].rating)); k++) {
	    res += "<li><a href=\"#\"><i class=\"fa fa-star-o\" aria-hidden=\"true\"></i></a></li>\n";
	}
	res += "</ul>\n";
	res += "</div>";
	res += "</div>";
	res += "<div class=\"clearfix\"></div>";

	if (listFilms.user === "1") {
	    res += '<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"#\" onclick=\"ajouterInPanier('
		    + allFilms[i].idf
		    + ', \''
		    + allFilms[i].pochette
		    + '\', &#34;'
		    + allFilms[i].titre
		    + '&#34;, 1, '
		    + allFilms[i].prix + ');\">Au panier</a>';
	} else {
	    res += "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"#\" onclick=\"showLoginPage();\">Au panier</a>";
	}
	res += "</div>\n";
	res += "</a>";
	res += "</div>";
	res += "</div>";
    }
    document.getElementById("beginBestFilms").innerHTML = res;
}

function showFilmSinglePage(filmInfo) {
    var film = filmInfo.fiche;
    var res = "";
    res += "<h1 class=\"text-center\" style=\"margin: 1em 0 1em 0;\">"
	    + film.titre + "</h1>";
    res += "<div class=\"text-center\">\n";
    res += " <img src=\"pochettes/" + film.pochette
	    + "\" class=\"rounded\" alt=\"Image de film\">\n";
    res += "</div>";
    res += "<div class=\"conteiner col-xl-8 col-lg-8 col-md-8 col-sm-10 col-xs-12 col-xl-offset-2 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0\">";
    res += "<table class=\"table table-bordered table-hover\" style=\"margin: 1em auto 1em auto\">";
    res += " <tr>\n";
    res += " <th scope=\"row\">Realisateur</th>\n";
    res += " <td>" + film.res + "</td>\n";
    res += " </tr>\n";
    res += " <tr>\n";
    res += " <th scope=\"row\">Genre</th>\n";
    res += " <td>" + film.genres + "</td>\n";
    res += " </tr>\n";
    res += " <tr>\n";
    res += " <th scope=\"row\">Duree</th>\n";
    res += " <td>" + film.duree + "</td>\n";
    res += " </tr>\n";
    res += " <tr>\n";
    res += " <th scope=\"row\">Pays</th>\n";
    res += " <td>" + film.pays + "</td>\n";
    res += " </tr>\n";
    res += " <tr>\n";
    res += " <th scope=\"row\">Rating</th>\n";
    res += " <td>" + film.rating + "</td>\n";
    res += " </tr>\n";
    res += " <tr>\n";
    res += " <th scope=\"row\">Prix</th>\n";
    res += " <td>" + film.prix + "</td>\n";
    res += " </tr>\n";
    res += " <tr>\n";
    res += " <th scope=\"row\">Description</th>\n";
    res += " <td>" + film.descr + "</td>\n";
    res += " </tr>\n";
    res += " <tr><td colspan=\"2\">";
    if (filmInfo.user === "1") {
	res += '<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"#\" onclick=\"ajouterInPanier('
	        + film.idf
	        + ', \''
	        + film.pochette
	        + '\', \''
	        + film.titre
	        + '\', 1, ' + film.prix + ');\">Au panier</a>';
    } else {
	res += "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"#\" onclick=\"showLoginPage();\">Au panier</a>";
    }

    res += "</td></tr>";
    res += "</table>\n";
    res += "</div>";
    res += "<div class=\"conteiner\">";
    res += "<div class=\"embed-responsive embed-responsive-16by9 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12\" style=\"margin: 0 auto 1em auto;\">";
    res += " <iframe src=\"https://www.youtube.com/embed/"
	    + film.trailer
	    + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1\" allowfullscreen></iframe>";
    res += "</div>";
    res += "</div>";
    $('#divSingle').html(res);
}

function makeFilration(listFilms) {
    var allFilms = listFilms.listeFilms;
    var res = "";
    for (var i = 0; i < allFilms.length; i++) {
	res += "<div class=\"col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-6 centered-text\">\n";
	res += "<div class=\"thumbnail\">";
	res += "<a href=\"single.php?id=" + allFilms[i].idf + "\">";
	res += "<img src=\"pochettes/" + allFilms[i].pochette
	        + "\" alt=\"Image de film\" style=\"width:100%\">";
	res += "<div class=\"caption\">";
	res += '<p class="text-center"><strong>' + allFilms[i].titre
	        + '</strong></p>';
	res += "<div class=\"w3l-movie-text text-center\">\n";
	res += "<p>" + allFilms[i].genres + "</p>";
	res += "</div>\n";
	res += "<div class=\"mid-2 agile_mid_2_home\">";
	res += "<p class=\"text-center\">" + allFilms[i].prix + " $</p>";
	res += "<div class=\"block-stars\">\n";
	res += "<ul class=\"w3l-ratings\">\n";
	for (var j = 0; j < Math.floor(allFilms[i].rating); j++) {
	    res += "<li><a href=\"#\"><i class=\"fa fa-star\" aria-hidden=\"true\"></i></a></li>\n";
	}
	for (var k = 0; k < (5 - Math.floor(allFilms[i].rating)); k++) {
	    res += "<li><a href=\"#\"><i class=\"fa fa-star-o\" aria-hidden=\"true\"></i></a></li>\n";
	}
	res += "</ul>\n";
	res += "</div>";
	res += "</div>";
	res += "<div class=\"clearfix\"></div>";
	if (listFilms.user === "1") {
	    res += '<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"#\" onclick=\"ajouterInPanier('
		    + allFilms[i].idf
		    + ', \''
		    + allFilms[i].pochette
		    + '\', &#34;'
		    + allFilms[i].titre
		    + '&#34;, 1, '
		    + allFilms[i].prix + ');\">Au panier</a>';
	} else {
	    res += "<a style=\"width: 100%; margin-top: 10px;\" class=\"btn btn-info text-center\" href=\"#\" onclick=\"showLoginPage();\">Au panier</a>";
	}
	res += "</div>\n";
	res += "</a>";
	res += "</div>";
	res += "</div>";
    }
    $('#catalogueFilms').html(res);
}

var filmsVue = function(reponse) {
    var action = reponse.action;
    switch (action) {
    case "enregistrer":
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
	showAdminLister();
	break;
    case "enlever":
    case "modifier":
	// $('#messages').html(reponse.msg);
	// setTimeout(function() {
	// $('#messages').html("");
	// }, 5000);
	showAdminLister();
	break;
    case "lister":
	listerFAdmin(reponse.listeFilms);
	break;
    case "fiche":
	afficherFiche(reponse);
	break;
    case "topfilms":
	afficherTopFilms(reponse);
	break;
    case "description":
	showFilmSinglePage(reponse);
	break;
    case "filtrer":
	makeFilration(reponse);
	break;
    }
};
