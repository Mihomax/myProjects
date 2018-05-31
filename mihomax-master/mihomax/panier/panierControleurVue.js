function setQuantiterDePanier(reponse) {
    if (reponse.nombre != -1) {
	$('#numberEnPanier').text(reponse.nombre);
    }
}

function addArticleInPanier(reponse) {
    if (reponse.error == "") {
	getNDeFilmsPanier();
	showPanier();
    }
}

function afterEnlever() {
    showPanier();
    getNDeFilmsPanier();
}

function showPanierWithFilms(reponse) {
    var panier = reponse.panier;
    var size = reponse.size;
    var res = "";
    var total = 0;
    for (var j = 0; j < size; j++) {
	total += panier[j].qteProduit * panier[j].prixProduit;
    }
    total = total.toFixed(2);
    if (size > 0) {
	res += "<table class=\"table table-condensed bg-white\">";
	res += "<thead>";
	res += "<tr>";
	res += "<th>Product</th>";
	res += "<th>Quantity</th>";
	res += "<th class=\"text-center\">Price</th>";
	res += "<th class=\"text-center\">Total</th>";
	res += "<th></th>";
	res += "</tr>";
	res += "</thead>";
	res += "<tbody>";
	for (var i = 0; i < size; i++) {
	    res += "<tr style=\"border-bottom: 1px solid #ccc;\">\n";
	    res += "<td class=\"col-sm-2 col-md-2\">\n";
	    res += "<div class=\"media\" style=\"margin-bottom: 5px;\">\n";
	    res += "<a style=\"width: 90px;\" class=\"thumbnail pull-top\" href=\"#\" onclick=\"showFilm("
		    + panier[i].idProduit + ");\">";
	    res += "<img class=\"media-object\" src=\"pochettes/"
		    + panier[i].pochetteProduit
		    + "\" style=\"width: 80px; height: 118px;\" onclick=\"showFilm("
		    + panier[i].idProduit + ");\"> </a>\n";
	    res += "<div class=\"media-body\">\n";
	    res += "<h4 class=\"media-heading\"><a href=\"#\" onclick=\"showFilm("
		    + panier[i].idProduit
		    + ");\">"
		    + panier[i].libelleProduit
		    + "</a></h4>\n";
	    res += "</div>\n";
	    res += "</div></td>\n";
	    res += "<td class=\"col-sm-2 col-md-2 col-xs-2\" style=\"text-align: center\">\n";
	    res += "<input type=\"number\" min=\"0\" max=\"10\" step=\"1\" onchange=\"changerQuantite("
		    + panier[i].idProduit
		    + ", this.value)\" class=\"form-control nb"
		    + i
		    + "\" style=\"width: 100px\" value=\""
		    + panier[i].qteProduit + "\">\n";
	    res += "</td>\n";
	    res += "<td class=\"col-sm-2 col-md-2 text-center\"><strong>"
		    + panier[i].prixProduit + "$</strong></td>\n";
	    res += "<td class=\"col-sm-2 col-md-2 text-center\"><strong>"
		    + Math
		            .round((panier[i].qteProduit * panier[i].prixProduit) * 100)
		    / 100 + "$</strong></td>\n";
	    res += "<td class=\"col-sm-2 col-md-2\">\n";
	    res += "<a href=\"#\" onclick=\"enleverDePanier("
		    + panier[i].idProduit + ");\">";
	    res += "<span class=\"glyphicon glyphicon-remove\"></span> Remove\n";
	    res += "</a></td>\n";
	    res += "</tr>";
	}
	res += "<tr>";
	res += "<td colspan=\"2\">   </td>";
	res += "<td class=\"text-right\"> Sous total:  </td>";
	res += "<td class=\"text-center\">";
	res += Math.round(total * 100) / 100 + "$";
	res += "</td>";
	res += "<td></td>";
	res += "</tr>";
	res += "<tr>";
	res += "<td colspan=\"2\">   </td>";
	res += "<td class=\"text-right\"> TVQ:  </td>";
	res += "<td class=\"text-center\">";
	res += Math.round((total * 9.98 / 100) * 100) / 100 + "$";
	res += "</td>";
	res += "<td></td>";
	res += "</tr>";
	res += "<tr>";
	res += "<td colspan=\"2\"></td>";
	res += "<td class=\"text-right\"> TPS:  </td>";
	res += "<td class=\"text-center\">";
	res += Math.round((total * 5 / 100) * 100) / 100 + "$";
	res += "</td>";
	res += "<td></td>";
	res += "</tr>";
	res += "<tr>";
	res += "<td colspan=\"2\">   </td>";
	res += "<td class=\"text-right\"> Total:  </td>";
	res += "<td class=\"text-center\">";
	res += (Math.round((total * 1.1498) * 100) / 100) + "$";
	res += "</td>";
	res += "<td></td>";
	res += "</tr>";
	res += "<tr>";
	res += "<td colspan=\"2\">   </td>";
	res += "<td>";
	res += "<a href=\"panier.php?action=\"></a>";
	res += "</td>";
	res += "<td class=\"text-center\">";
	res += "<button type=\"button\" class=\"btn btn-success\" onclick=\"enregistrerAchat();\">";
	res += "Checkout <span class=\"glyphicon glyphicon-play\"></span>";
	res += "</button></td>";
	res += "<td></td>";
	res += "</tr>";
	res += "</tbody>";
	res += "</table>";
	$('#panierForm').html(res);
    } else {
	$('#panierForm')
	        .html(
	                "<h2 class=\"text-center\" style=\"margin: 1em 0 1em 0;\">Voptre panier est vide</h1>");
    }
}

function changeQuantity() {
    showPanier();
    getNDeFilmsPanier();
}

var panierVue = function(reponse) {
    var action = reponse.action;
    switch (action) {
    case "contenu":
	showPanierWithFilms(reponse);
	break;
    case "nombre":
	setQuantiterDePanier(reponse);
	break;
    case "ajouter":
	addArticleInPanier(reponse);
	break;
    case "enlever":
	afterEnlever(reponse);
	break;
    case "changerQuantite":
	changeQuantity();
	break;
    }

};