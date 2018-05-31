function filtreAppliquer(object){
	var nom=object.name;
	if (nom == document.getElementById("selectGenre").name){
		document.getElementById("inputRealis").value="";
		document.getElementById("selectPays").value="";
		document.getElementById("inputNom").value="";
	}
	if (nom == document.getElementById("inputRealis").name){
		document.getElementById("selectGenre").value="";
		document.getElementById("selectPays").value="";
		document.getElementById("inputNom").value="";
	}
	if (nom == document.getElementById("selectPays").name){
		document.getElementById("inputRealis").value="";
		document.getElementById("selectGenre").value="";
		document.getElementById("inputNom").value="";
	}
	if (nom == document.getElementById("inputNom").name){
		document.getElementById("inputRealis").value="";
		document.getElementById("selectPays").value="";
		document.getElementById("selectGenre").value="";
		
	}
	document.getElementById("formFilter").action = "catalog.php";
	document.getElementById("formFilter").submit();
}