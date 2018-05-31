//vue films
function listerA(listAchats) {
    var taille;
    var rep = "<div class='table-users' style='overflow: scroll; height: 500px;'>";
    rep += "<div class='header'>Liste des achats<span style='float:right;padding-right:10px;cursor:pointer;' onClick=\"$('#contenu').hide();\">X</span></div>";
    rep += "<table cellspacing='0'>";
    rep += "<tr><th>NUMERO</th><th>MEMBRE</th><th>DATE</th></tr>";
    taille = listAchats.length;
    for (var i = 0; i < taille; i++) {
	rep += "<tr><td>" + listAchats[i].idach + "</td><td>"
	        + listAchats[i].idm + "</td><td>" + listAchats[i].datach
	        + "</td></tr>";
    }
    rep += "</table>";
    rep += "</div>";
    $('#contenu').html(rep);
}

var achatVue = function(reponse) {
    var action = reponse.action;
    switch (action) {
    case "enregistrer":
	$('#panierForm').html("");
	$('#panierForm')
	        .html(
	                "<h2 class=\"text-center\" style=\"margin: 1em auto 1em auto;\">Merci pour votre achat</h2>");
	getNDeFilmsPanier();
	break;
    case "lister":
	listerA(reponse.listeAchats);
	break;
    }
}
