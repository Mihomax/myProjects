<?php
	require_once("../BD/connexion.inc.php");
	$titre=$_POST['titre'];
	$duree=$_POST['duree'];
	$res=$_POST['res'];
	$pays=$_POST['pays'];
	$prix=$_POST['prix'];
	$trailer=$_POST['trailer'];
	$rating=$_POST['rating'];
	$descr=$_POST['descr'];
	$dossPoch="../pochettes/";
	$nomPochette=sha1($titre.time());
	$pochette="avatar.jpg";
	

	
	if($_FILES['pochette']['tmp_name']!==""){
	
		$tmp = $_FILES['pochette']['tmp_name'];
		$fichier= $_FILES['pochette']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossPoch.$nomPochette.$extension);
		@unlink($tmp); 
		$pochette=$nomPochette.$extension;
	}
	
	
	$requete="INSERT INTO films values(0,?,?,?,?,?,?,?,?,?)";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("sisssssds", $titre,$duree,$res,$pays,$prix,$trailer,$pochette,$rating,$descr);
	$stmt->execute();
	header("Location: afficher.php");
?>
