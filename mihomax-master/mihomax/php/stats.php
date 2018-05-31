<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8"> 

<link href="../css/bootstrap.min.css" rel="stylesheet">   
<script src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <link href="../css/mystyle.css" type="text/css" rel="stylesheet">
  <script src="../js/functions.js"></script>

 </head>

<body>

<img id="logo" src="../images/logo.png">
    
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


<div id="ajout" >
		
		
        <form id="ajouter" enctype='multipart/form-data' action="ajouter.php" method="POST" onSubmit="return valider()">
	
            Titre : <input type="text" id="titre" name="titre">
            Duree : <input type=text id="duree" name="duree">
            Realisateur : <input type="text" id="res" name="res">
            Pays : <input type="text" id="pays" name="pays"><br><br>
            Prix : <input type=text id="prix" name="prix">
            Trailer : <input type="text" id="trailer" name="trailer">
            Rating : <input type="text" id="rating" name="rating">
            Description : <input type="text" id="descr" name="descr"><br><br>
			Pochette : <input type="file" id="pochette" name="pochette"><br><br>

			<input class="btn btn-primary" type="submit" value="Ajouter">
			<input class="btn btn-danger" onClick="fermAjout();" type="button" value="Fermer">
			
		</form>		
	</div>

	  
	  <?php
	
	require_once("../BD/connexion.inc.php");
		 
	$res="<h4>Statistique des ventes par date...</h4>";
	 
	   $res.="<div style=\"margin-top:50px;\"id=\"ventes\"><table   class=\"table table-striped table-dark\">";
	   $res.="<tr><th scope=\"col\">Date</th><th scope=\"col\">Nombre de films vendu</th></tr>";
  	   
		   $requette="SELECT * FROM ventes";
		   
		try{
			$listeVentes=mysqli_query($connexion,$requette);
			while($ligne=mysqli_fetch_object($listeVentes)){
			   $res.="<tr><td>".($ligne->datach)."</td><td>".($ligne->nombrefilms)."</td></tr>";	
			   
		   }
		   mysqli_free_result($listeVentes);
		}catch (Exception $e){
		   echo "Probleme pour lister";
		}finally {
		   $res.="</table></div>";
		   echo $res;
		}

	   mysqli_close($connexion);

?>

<form id="afficher" action="afficher.php" method="POST">
	</form>




<canvas id="lineChart"></canvas>

 <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>


<script>
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["2018-01-28", "2018-02-18", "2018-02-19", "2018-02-21", "2018-02-22"],
        datasets: [
            {
                label: "Ventes par dates",
                fillColor: "rgba(0,255,0,0.3)",
                strokeColor: "rgba(0,255,0,0.3)",
                pointColor: "rgba(0,255,0,0.3)",
                pointStrokeColor: "#e0a025",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(0,255,0,0.3)",
                data: [1, 2, 2, 3, 1]
            }
           ]
    },
    options: {
        responsive: true
    }    
});

</script>

</body>
</html>