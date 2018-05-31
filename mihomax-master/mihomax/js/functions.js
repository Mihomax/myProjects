function valider(){
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	if(titre=="" || duree=="" || res=="")
		return false;
	else 
		return true;
}

function visible(){
	document.getElementById("ajout").style.display='block';
	}

function invisible(){
	document.getElementById(filmsTable).style.display='none';
	document.getElementById(ajout).style.display='block';
}

function fermAjout(){
	
	document.getElementById("ajout").style.display='none';
}

/*function envoyer(){
	window.location.reload();
	document.getElementById('afficher').submit();
	
	
}*/

function statist() {
	
	window.location.reload();
	document.getElementById("stats").submit();
	
	
}


function validerNumFilm(elem){
	var regIdf=new RegExp("^[0-9]{1,4}$");
	var idf=document.getElementById(elem).value;
	if (regIdf.test(idf))
		return true;
	else 
		return false;
}

function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
	document.getElementById(elem).style.display='none';
}

function validerNum(elem){
	var num=document.getElementById(elem).value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && numRegExp.test(num))
		return true;
	return false;
}

function valider(){
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			return true;
	return false;
}
//Cas d'un button
/*
function valider(){
	var formEnreg=document.getElementById('formEnreg');
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			formEnreg.submit();
}
*/