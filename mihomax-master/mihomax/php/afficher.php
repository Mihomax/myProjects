<?php
	require_once("../BD/connexion.inc.php");
	
	$resultat="<html>
	<head><meta charset=\"UTF-8\"> 
	
	

	<link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\">
	<link href=\"../css/mystyle.css\" rel=\"stylesheet\">
	<script src=\"../js/functions.js\"></script>
	<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
	<script src=\"js/bootstrap.min.js\"></script>
	<script src=\"https://code.jquery.com/jquery-3.3.1.js\"
	  integrity=\"sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=\"
	  crossorigin=\"anonymous\"></script>
	 
	  <script>
  
  function statist () {
	
	window.location.reload();
	document.getElementById(\"stats\").submit();
	
	
}

</script>
	 
	 
	 
	  </head><body>"
	  
	  ;
	  


	  $resultat.= "<img id=\"logo\" src=\"../images/logo.png\">\n";
	  
	  $resultat.= "	<nav class=\"navbar navbar-inverse\">\n";
	  $resultat.= "  <div class=\"container-fluid\">\n";
	  $resultat.= "    \n";
	  $resultat.= "    <ul class=\"nav navbar-nav\">\n";
	  $resultat.= "      <li ><a href=\"main.php\"><input class=\"btn btn-warning\" type=\"button\" value=\"Accueil \" ></a></li>\n";
	  $resultat.= "      <li><a href=\"#\"><input class=\"btn btn-success\" type=\"button\" value=\"Ajouter un film \" onClick=\"visible();\"></a></li>\n";
	  $resultat.= "      <li><a href=\"#\"><input class=\"btn btn-info\" type=\"button\" value=\"Afficher la liste des films \" onClick=\"envoyer();\"></a></li>\n";
	  $resultat.= "      <li><a href=\"#\"><input class=\"btn btn-danger\"type=\"button\" value=\"Check la statistique \" onClick=\"statist();\"></a></li>\n";
	  $resultat.= "    </ul>\n";
	  $resultat.= "  </div>\n";
	  $resultat.= "</nav>";
	  
	$resultat.="<div id=\"filmTable\"><table   class=\"table table-striped table-dark\">";
	$resultat.="<tr><th scope=\"col\">#</th><th scope=\"col\">TITRE</th><th scope=\"col\">DUREE</th>
	<th scope=\"col\">REALISATEUR</th><th scope=\"col\">PAYS</th><th scope=\"col\">PRIX</th>
	<th scope=\"col\">TRAILER</th><th scope=\"col\">POCHETTE</th><th scope=\"col\">
	RATING</th><th scope=\"col\">DESCRIPTION</th><th scope=\"col\">GESTION</th><th scope=\"col\">GESTION</th></tr>";

	
	
	
		$requette="SELECT * FROM films";
		
	 try{
		 $listeFilms=mysqli_query($connexion,$requette);
		 while($ligne=mysqli_fetch_object($listeFilms)){
			$resultat.="<tr><td>".($ligne->idf)."</td><td>".($ligne->titre)."</td><td>".($ligne->duree).
			"</td><td>".($ligne->res)."</td><td>".($ligne->pays)."</td><td>$".($ligne->prix)."</td><td>".
			($ligne->trailer)."</td><td><img src='../pochettes/".($ligne->pochette).
			"' width=70 height=100></td><td>".($ligne->rating)."</td><td>".($ligne->descr)."</td><td>
			<form  action=\"supprimer.php\" method=\"POST\">
			<input type=\"hidden\" name=\"idf\" value=\"".($ligne->idf)."\" />
			<input class=\"btn btn-danger\"type=\"submit\" value=\"Supprimer\" >
			</form></td><td>
			<form  action=\"fiche.php\" method=\"POST\">
			<input type=\"hidden\" name=\"idfmod\" value=\"".($ligne->idf)."\" />
			<input class=\"btn btn-primary\"type=\"submit\" value=\"Modifier\" >
			</form></td></tr>"
			;	
			
		}
		mysqli_free_result($listeFilms);
	 }catch (Exception $e){
		echo "Probleme pour lister";
	 }finally {
		$resultat.="</table></div>";
		$resultat.= "<div id=\"ajout\" >\n";
	$resultat.= "		\n";
	$resultat.= "		\n";
	$resultat.= "        <form id=\"ajouter\" enctype='multipart/form-data' action=\"ajouter.php\" method=\"POST\" onSubmit=\"return valider()\">\n";
	$resultat.= "	\n";
	$resultat.= "            Titre : <input type=\"text\" id=\"titre\" name=\"titre\">\n";
	$resultat.= "            Duree : <input type=text id=\"duree\" name=\"duree\">\n";
	$resultat.= "            Realisateur : <input type=\"text\" id=\"res\" name=\"res\">\n";
	$resultat.= "            Pays : <input type=\"text\" id=\"pays\" name=\"pays\"><br><br>\n";
	$resultat.= "            Prix : <input type=\"number\" step=\"any\" id=\"prix\" name=\"prix\">\n";
	$resultat.= "            Trailer : <input type=\"text\" id=\"trailer\" name=\"trailer\">\n";
	$resultat.= "            Rating : <input type=\"number\" step=\"any\" id=\"rating\" name=\"rating\">\n";
	$resultat.= "            Description : <input type=\"text\" id=\"descr\" name=\"descr\"><br><br>\n";
	$resultat.= "			Pochette : <input type=\"file\" id=\"pochette\" name=\"pochette\"><br><br>\n";
	$resultat.= "\n";
	$resultat.= "			<input class=\"btn btn-primary\" type=\"submit\" value=\"Ajouter\">\n";
	$resultat.= "			<input class=\"btn btn-danger\" onClick=\"fermAjout();\" type=\"button\" 
										value=\"Fermer\">\n";
	$resultat.= "		</form>		\n";
	$resultat.= "	</div>";
		
	$resultat.= "<form id=\"stats\" action=\"stats.php\" method=\"POST\">
	</form>";
		
		
	$resultat.="</body></html>";
		
		echo $resultat;
		
	 }
	 
	 mysqli_close($connexion);
?>
