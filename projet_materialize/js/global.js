var wraphaut = "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col s12 m6 text-center\">";
var wrapbas = "</div></div></div>";
var optionBtnAdmin = wraphaut + 
					" <img class=\"responsive-img mt-3\" src=\"images.app/USFII.jpg\"/ style=\"border:3px solid white;border-radius: 10px;\"><br>"
					 + wrapbas;

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

function afficherChargement(){
	return 	" 	<div class=\"container pt-5\"> " +
			" 		<div class=\"row\"> " + 
			" 			<div class=\"preloader-wrapper big active center-block\"> " + 
			" 				<div class=\"spinner-layer spinner-red-only\"> " + 
			" 				<div class=\"circle-clipper left\"> " +
			" 					<div class=\"circle\"></div> " + 
			" 				</div><div class=\"gap-patch\"> " + 
			" 					<div class=\"circle\"></div> " + 
			" 				</div><div class=\"circle-clipper right\"> " + 
			" 					<div class=\"circle\"></div> " +
			" 				</div> " +
			" 				</div> " + 
			" 			</div> " +
			" 		<div> " +
			" 	</div> ";
}