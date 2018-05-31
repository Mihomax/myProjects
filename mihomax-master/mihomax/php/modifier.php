<?php
	require_once("../BD/connexion.inc.php");
	$idfmod=$_POST['idfmod'];
	$titre=$_POST['titre'];
	$duree=$_POST['duree'];
	$res=$_POST['res'];
	$pays=$_POST['pays'];
	$prix=$_POST['prix'];
	$trailer=$_POST['trailer'];
	$rating=$_POST['rating'];
	$descr=$_POST['descr'];
	$dossier="../pochettes/";
	
	$requette="SELECT pochette FROM films WHERE idf=?";
	$stmt = $connexion->prepare($requette);
	$stmt->bind_param("i", $idfmod);
	$stmt->execute();
	$result = $stmt->get_result();
	$ligne = $result->fetch_object();
	$pochette = $ligne->pochette;

	
	if($_FILES['pochette']['tmp_name']!==""){
		if($pochette!="avatar.jpg"){
			$rmPoc='../pochettes/'.$pochette;
			$tabFichiers = glob('../pochettes/*');
			foreach($tabFichiers as $fichier){
			  if(is_file($fichier) && $fichier==trim($rmPoc)) {
				unlink($fichier);
				break;

			  }
			}
		}
	
		$nomPochette=sha1($titre.time());
		$tmp = $_FILES['pochette']['tmp_name'];
		$fichier= $_FILES['pochette']['name'];
		$extension=strrchr($fichier,'.');
		$pochette=$nomPochette.$extension;
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		@unlink($tmp); 
	}

		
	$requette="UPDATE films set titre=?,duree=?,res=?,pays=?,prix=?,trailer=?,pochette=?,rating=?,descr=?
	 WHERE idf=?";
	$stmt = $connexion->prepare($requette);
	$stmt->bind_param("sisssssdsi", $titre,$duree,$res,$pays,$prix,$trailer,$pochette,$rating,$descr,$idfmod);
	$stmt->execute();
	mysqli_close($connexion);
	header("Location: afficher.php");

?>

	
	