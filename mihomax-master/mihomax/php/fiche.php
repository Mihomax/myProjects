
<?php
	require_once("../BD/connexion.inc.php");
	$idfmod=$_POST['idfmod'];

	$rep="<html>
	<head><meta charset=\"UTF-8\">	<link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\">
	<link href=\"../css/mystyle.css\" rel=\"stylesheet\">
	<script src=\"../js/functions.js\"></script>
	<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
	<script src=\"../js/bootstrap.min.js\"></script>
	<script src=\"https://code.jquery.com/jquery-3.3.1.js\"
	  integrity=\"sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=\"
	  crossorigin=\"anonymous\"></script></head><body>";
	  


	  $rep.= "<img id=\"logo\" src=\"../images/logo.png\">\n";
	  
	  $rep.= "	<nav class=\"navbar navbar-inverse\">\n";
	  $rep.= "  <div class=\"container-fluid\">\n";
	  $rep.= "    \n";
	  $rep.= "    <ul class=\"nav navbar-nav\">\n";
	  $rep.= "      <li ><a href=\"main.php\"><input class=\"btn btn-warning\" type=\"button\" value=\"Accueil \" ></a></li>\n";
	  $rep.= "      <li><a href=\"#\"><input class=\"btn btn-success\" type=\"button\" value=\"Ajouter un film \" onClick=\"visible();\"></a></li>\n";
	  $rep.= "      <li><a href=\"#\"><input class=\"btn btn-info\" type=\"button\" value=\"Afficher la liste des films \" onClick=\"envoyer();\"></a></li>\n";
	  $rep.= "      <li><a href=\"#\"><input class=\"btn btn-danger\"type=\"button\" value=\"Check la statistique \" onClick=\"envoyer();\"></a></li>\n";
	  $rep.= "    </ul>\n";
	  $rep.= "  </div>\n";
	  $rep.= "</nav>";
	
	function envoyerForm($ligne){
		global $idfmod;
		global $rep;
		
		
		$rep.= "<div id=\"fiche\" style=\"width:1200px;height:200px;background-color:#DCDCDC;border-radius:10px;
		position:absolute;top:30%;left:10%\">
		<form id=\"ajouter\" enctype=\"multipart/form-data\" action=\"modifier.php\" method=\"POST\" onSubmit=\"return valider();\">\n"; 
		$rep.= "	Numero:<input type=\"text\" id=\"idfmod\" name=\"idfmod\" value='".$ligne->idf."' readonly>\n"; 
		$rep.= "	Titre:<input type=\"text\" id=\"titre\" name=\"titre\" value='".$ligne->titre."'>\n"; 
		$rep.= "	Duree:<input type=\"text\" id=\"duree\" name=\"duree\" value='".$ligne->duree."'>\n"; 
		$rep.= "	Realisateur:<input type=\"text\" id=\"res\" name=\"res\" value='".$ligne->res."'>\n"; 
		$rep.= "	Pays:<input type=\"text\" id=\"pays\" name=\"pays\" value='".$ligne->pays."'><br><br><br>\n"; 
		$rep.= "	Prix:<input type=\"text\" id=\"prix\" name=\"prix\" value='".$ligne->prix."'>\n"; 
		$rep.= "	Trailer:<input type=\"text\" id=\"trailer\" name=\"trailer\" value='".$ligne->trailer."'>\n"; 
		$rep.= "  	Rating:<input type=\"text\" id=\"rating\" name=\"rating\" value='".$ligne->rating."'>";
		$rep.= "	Description:<input type=\"text\" id=\"descr\" name=\"descr\" value='".$ligne->descr."'><br><br>\n"; 
		$rep.= "  	Pochette:<input type=\"file\" id=\"pochette\" name=\"pochette\"><br><br>\n";
		$rep.= "	<input class=\"btn btn-primary\" type=\"submit\" value=\"Envoyer\">\n"; 
		

		
		$rep.= "</form></div>\n";
		return $rep;
	}

		
	$requete="SELECT * FROM films WHERE idf=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $idfmod);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
		echo "Film ".$idfmod." introuvable";
		
		mysqli_close($connexion);
		exit;
	}
	echo envoyerForm($ligne);
	
	mysqli_close($connexion);
?>

