function showPanierContenu() {
    var formPanier = new FormData();
    formPanier.append('action', 'contenu');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'panier/panierControleur.php',
	data : formPanier,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {
	    // alert("reponse=" + reponse);
	    panierVue(reponse);
	},
	fail : function(err) {

	}
    });
}
function getNDeFilmsPanier() {
    var formPanier = new FormData();
    formPanier.append('action', 'nombre');// alert(formFilm.get("action"));
    $.ajax({
	type : 'POST',
	url : 'panier/panierControleur.php',
	data : formPanier,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    panierVue(reponse);
	},
	fail : function(err) {
	}
    });
}

function enleverDePanier(idf) {
    var formPanier = new FormData();
    formPanier.append('action', 'enlever');// alert(formFilm.get("action"));
    formPanier.append('idf', idf);
    $.ajax({
	type : 'POST',
	url : 'panier/panierControleur.php',
	data : formPanier,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    panierVue(reponse);
	},
	fail : function(err) {
	}
    });
}

function changerQuantite(idf, qte) {
    if (qte == 0) {
	enleverDePanier(idf);
    } else {
	var formPanier = new FormData();
	formPanier.append('action', 'changerQuantite');// alert(formFilm.get("action"));
	formPanier.append('idf', idf);
	formPanier.append('qte', qte);
	$.ajax({
	    type : 'POST',
	    url : 'panier/panierControleur.php',
	    data : formPanier,
	    contentType : false,
	    processData : false,
	    dataType : 'json', // text pour le voir en format de string
	    success : function(reponse) {// alert(reponse);
		panierVue(reponse);
	    },
	    fail : function(err) {
	    }
	});
    }
}

function ajouterInPanier(idProduit, pochetteProduit, libelleProduit,
        qteProduit, prixProduit) {
    var formPanier = new FormData();
    formPanier.append('action', 'ajouter');// alert(formFilm.get("action"));
    formPanier.append('idProduit', idProduit);
    formPanier.append('pochetteProduit', pochetteProduit);
    formPanier.append('libelleProduit', libelleProduit);
    formPanier.append('qteProduit', qteProduit);
    formPanier.append('prixProduit', prixProduit);
    $.ajax({
	type : 'POST',
	url : 'panier/panierControleur.php',
	data : formPanier,
	contentType : false,
	processData : false,
	dataType : 'json', // text pour le voir en format de string
	success : function(reponse) {// alert(reponse);
	    panierVue(reponse);
	},
	fail : function(err) {
	}
    });
}