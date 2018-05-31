<?php
	session_start();
	include_once("fonctions_panier.inc.php");
	
	$erreur = false;
	
	$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
	if($action !== null)
	{
	   if(!in_array($action,array('ajout', 'suppression', 'refresh', 'acheter')))
	   $erreur=true;
	
	   //récuperation des variables en POST ou GET
	   $i = (isset($_POST['i'])? $_POST['i']:  (isset($_GET['i'])? $_GET['i']:null )) ;
	   $u = (isset($_POST['u'])? $_POST['u']:  (isset($_GET['u'])? $_GET['u']:null )) ;
	   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
	   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
	   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
	
	   //Suppression des espaces verticaux
	   $l = preg_replace('#\v#', '',$l);
	   //On verifie que $p soit un float
	   $p = floatval($p);
	
	   //On traite $q qui peut etre un entier simple ou un tableau d'entier

	   if (is_array($q)){
	      $QteArticle = array();
	      $i=0;
	      foreach ($q as $contenu){
	         $QteArticle[$i++] = intval($contenu);
	      }
	   }
	   else
	   $q = intval($q);
	    
	}
	
	if (!$erreur){
	   switch($action){
	      Case "ajout":
	         ajouterArticle($i,$u,$l,$q,$p);
	         break;
	
	      Case "suppression":
	         supprimerArticle($i);
	         break;
	
	      Case "refresh" :
	         for ($i = 0 ; $i < count($QteArticle) ; $i++)
	         {
	            modifierQTeArticle($_SESSION['panier']['idProduit'][$i],round($QteArticle[$i]));
	         }
	         break;
	      Case "acheter":
	      		faireAchat();
	      	
	      	break;
	
	      Default:
	         break;
	   }
	}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Panier</title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="../js/panier.js"></script>
  </head>
  <body>
  	<h1 class="text-center">PANIER</h1>
	<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
        	<form method="post" action="panier.php" id="mainForm">
	            
	                	<?php 
	                		if ($action!="acheter"){
								if (creationPanier()){
									$nbArticles=count($_SESSION['panier']['idProduit']);
									if ($nbArticles <= 0)
										echo "<tr><td>Votre panier est vide </ td></tr>";
									else
									{
										echo "<table class=\"table table-hover\">";
										echo "   <thead>";
										echo "        <tr>";
										echo "            <th>Product</th>";
										echo "            <th>Quantity</th>";
										echo "            <th class=\"text-center\">Price</th>";
										echo "            <th class=\"text-center\">Total</th>";
										echo "            <th> </th>";
										echo "        </tr>";
										echo "    </thead>";
										echo "    <tbody>";
										for ($i=0 ;$i < $nbArticles ; $i++){
											$stringActionSuppr = "panier.php?action=suppression&i=".$_SESSION['panier']['idProduit'][$i];
											echo "<tr>\n";
											echo "	<td class=\"col-sm-2 col-md-2\">\n";
											echo "		<div class=\"media\">\n";
											echo "			<a class=\"thumbnail pull-left\" target=\"_blank\" href=\"single.php?id=".$_SESSION['panier']['idProduit'][$i]."\">";
		                    				echo "				<img class=\"media-object\" src=\"../pochettes/".$_SESSION['panier']['pochetteProduit'][$i]."\" style=\"width: 72px; height: 106px;\"> </a>\n";
											echo "			<div class=\"media-body\">\n";
											echo "				<h4 class=\"media-heading\"><a href=\"single.php?id=".$_SESSION['panier']['idProduit'][$i]."\">".$_SESSION['panier']['libelleProduit'][$i]."</a></h4>\n";
											echo "			</div>\n";
											echo "		</div></td>\n";
											echo "	<td class=\"col-sm-2 col-md-2 col-xs-2\" style=\"text-align: center\">\n";
											echo "		<input type=\"number\" class=\"form-control nb".$i."\" style=\"width: 50px\" value=\"".$_SESSION['panier']['qteProduit'][$i]."\">\n";
											echo "	</td>\n";
											echo "	<td class=\"col-sm-2 col-md-2 text-center\"><strong>".$_SESSION['panier']['prixProduit'][$i]."$</strong></td>\n";
											echo "	<td class=\"col-sm-2 col-md-2 text-center\"><strong>".($_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i])."$</strong></td>\n";
											echo "	<td class=\"col-sm-2 col-md-2\">\n";
											echo "		<a href=".$stringActionSuppr.">";
											echo "		<span class=\"glyphicon glyphicon-remove\"></span> Remove\n";
											echo "		</a></td>\n";
											echo "</tr>";
	
										}
										
										echo "<tr>";
										echo "<td colspan=\"3\">   </td>";
										echo "<td> Sous total:  </td>";
										echo "<td>";
										echo MontantGlobal()."$";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td colspan=\"3\">   </td>";
										echo "<td> TVQ:  </td>";
										echo "<td>";
										echo number_format( MontantGlobal()*9.98/100,2,',',' ')."$";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td colspan=\"3\"></td>";
										echo "<td> TPS:  </td>";
										echo "<td>";
										echo number_format(MontantGlobal()*5/100,2,',',' ')."$";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td colspan=\"3\">   </td>";
										echo "<td> Total:  </td>";
										echo "<td>";
										echo number_format(MontantGlobal()*14.98/100+MontantGlobal(),2,',',' ')."$";
										echo "</td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td colspan=\"3\">   </td>";
										echo "<td>";
										echo "<a href=\"panier.php?action=\"></a>";
										echo "</td>";
										echo "<td>";
										echo "<button type=\"button\" class=\"btn btn-success\" onclick=\"faireAchat()\">";
										echo "Checkout <span class=\"glyphicon glyphicon-play\"></span>";
										echo "</button></td>";
										echo "</tr>";
										echo "</tbody>";
										echo "</table>";
	
									}

								}

							}else{
								echo "<h1 class =\"text-center text-success\">Merci pour votre achat!</h1>";	
							}
	                	
	                	?>
	                
	                
						
            </form>
        </div>
    </div>
</div>
  </body>
</html>