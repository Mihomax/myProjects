function affichePanel(reponse) {
    var res = "";
    if (reponse.username == "") {
	res += "<li><a href=\"#\" onclick=\"showRegistrationPage();\"><span class=\"glyphicon glyphicon-user\"></span> Inscription</a></li>\n";
	res += "<li><a href=\"#\" onclick=\"showLoginPage();\"><span class=\"glyphicon glyphicon-log-in\"></span> S'identifier</a></li>";
    } else {
	res += "<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>Salut, "
	        + reponse.username + "</a></li>";
	if (reponse.username == "admin@admin.ca") {
	    res += "<li><a href=\"#\" onclick=\"showAdminLister();\"><span class=\"glyphicon glyphicon-wrench\"></span>Admin Panel</a>";
	}
	res += "<li><a href=\"#\" onclick=\"userLogout();\"><span class=\"glyphicon glyphicon-log-out\"></span> Déconnecter</a></li>";
	res += "<li><a href=\"#\" onclick=\"showPanier();\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Panier<span class=\"badge\" id=\"numberEnPanier\">"
	        + 0 + "</span></a></li>";
    }

    $('#panelDeUser').html(res);
    getNDeFilmsPanier();
}

function checkUserLogin(reponse) {
    if (reponse.error == "") {
	if (reponse.username == "admin@admin.ca") {
	    showAdminLister();
	} else {
	    showMainPage();
	}
    } else {
	$('#divLogin .panel-footer').html(
	        "<p class=\"text-danger\">" + reponse.error + "</p>");
    }
}
function faireLogout() {
    showMainPage();
}
function newUser(reponse) {
    if (reponse.error == "") {
	$('#username').val("");
	$('#password1').val("");
	$('#password2').val("");
	$('#nom').val("");
	$('#prenom').val("");
	$('#email').val("");
	$('#datnais').val("");
	showMainPage();
    } else {
	$('#divRegistration .panel-footer').html(reponse.error);
    }
}
var userVue = function(reponse) {
    var action = reponse.action;

    switch (action) {
    case "userfromsession":
	affichePanel(reponse);
	break;
    case "login":
	checkUserLogin(reponse);
	break;
    case "logout":
	faireLogout();
	break;
    case "enregistrer":
	newUser(reponse);
	break;

    }
};