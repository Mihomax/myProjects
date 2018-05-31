<?php

	require_once("../BD/connexion.inc.php");
	$idf=$_POST['idf'];	
	$requete="SELECT * FROM films WHERE idf=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $idf);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
		echo "Film ".$idf." introuvable";
		mysqli_close($connexion);
		exit;
	}
	$pochette=$ligne->pochette;
	
	
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
			
	$requete="DELETE FROM films WHERE idf=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $idf);
	$stmt->execute();
	mysqli_close($connexion);
	header("Location: afficher.php");

?>

