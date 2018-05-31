<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8"> 

<link href="../css/bootstrap.min.css" rel="stylesheet">   
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <link href="../css/mystyle.css" type="text/css" rel="stylesheet">
  
<script src="../js/functions.js"></script>

  <script>
  
  function statist () {
	
	window.location.reload();
	document.getElementById("stats").submit();
	
	
}

</script>

</head>

<body>

<img id="logo" src="../images/logo.png">
    <div class = "titre"><h3>Bonjour chers amis!!! Michael, Maxim et Hovhannes (et Antonio :) ), 
	<br>qu'est-ce qu'on va faire aujourd'hui?</h3></div><br>

	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li ><a href="main.php"><input class="btn btn-warning" type="button" value="Accueil " ></a></li>
      <li><a href="#"><input class="btn btn-success" type="button" value="Ajouter un film " onClick="visible();"></a></li>
      <li><a href="#"><input class="btn btn-info" type="button" value="Afficher la liste des films " onClick="envoyer();"></a></li>
      <li><a href="#"><input class="btn btn-danger"type="button" value="Check la statistique " onClick="statist();"></a></li>
    </ul>
  </div>
</nav>
	<br><br>
	
	<div id="ajout" >
		
		
        <form id="ajouter" enctype='multipart/form-data' action="ajouter.php" method="POST" onSubmit="return valider()">
	
            Titre : <input type="text" id="titre" name="titre">
            Duree : <input type=text id="duree" name="duree">
            Realisateur : <input type="text" id="res" name="res">
            Pays : <input type="text" id="pays" name="pays"><br><br>
            Prix : <input type="number" step="any" id="prix" name="prix">
            Trailer : <input type="text" id="trailer" name="trailer">
            Rating : <input type="number" step="any" id="rating" name="rating">
            Description : <input type="text" id="descr" name="descr"><br><br>
			Pochette : <input type="file" id="pochette" name="pochette"><br><br>

			<input class="btn btn-primary" type="submit" value="Ajouter">
			<input class="btn btn-danger" onClick="fermAjout();" type="button" value="Fermer">
			
		</form>		
	</div>
    
	<?php
	
	require_once("../BD/connexion.inc.php");
	
	
	  
	$resultat="<div id=\"meillclient\"><h2 style=\"color:white; padding-left:5px\" >Votre meilleurs client pour cette semaine est ";
	

		$requette="SELECT prenom,nom,somme,MAX(nombrefilms) as maxfilms from resultsem";
		 
	 try{
		 $clientsem=mysqli_query($connexion,$requette);
		 while($ligne=mysqli_fetch_object($clientsem)){
			$resultat.="<span class=\"highlited\">".($ligne->prenom)." ".($ligne->nom).",</span>
			<br><br> qui a achete <span class=\"highlited\">".($ligne->maxfilms).
			"</span> films et qui vous a apporte <span class=\"highlited\">$".($ligne->somme)." !!!</span></h2></div>";	
			
		}

		mysqli_free_result($clientsem);

	 }catch (Exception $e){
		echo "Probleme pour lister";

	 }finally {
				echo $resultat;
		
	 }

	 $res="<div  style=\"width:1000px;
	 height:180px;
	 background-color:#222222;
	 border-radius:10px;
	 position:absolute;
	 top:70%;
	 left:15%;
	 z-index: -1;\">
	<h2 style=\"color:white; padding-left:5px\">Le film le plus vendu cette semaine est ";

	 $requette="SELECT * from meillfilm";
	 
  try{
	  $filmsem=mysqli_query($connexion,$requette);
	  $ligne=mysqli_fetch_object($filmsem);

		 $res.="<span class=\"highlited\">".($ligne->titre).",</span>
		 <br><br> vous en avez vendu <span class=\"highlited\"> ".($ligne->filmlist).
		 " </span> en faisant <span class=\"highlited\">$".($ligne->somme).
		 "</span> au total.</h2></div>";	
   
	 mysqli_free_result($filmsem);

  }
  catch (Exception $e){
	 echo "Probleme pour lister";

  }finally {

   
			 echo $res;
	 
  }
	 
	 mysqli_close($connexion);


	?>

	<form id="afficher" action="afficher.php" method="POST">
	</form>
	
	<form id="stats" action="stats.php" method="POST">
	</form>
	
	
	<br><br>

	
	</body>
</html>

