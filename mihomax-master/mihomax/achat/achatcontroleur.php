<?php
	require_once("../includes/modele.inc.php");
	session_start();
	$tabRes=array();
	function enregistrerAchats(){
		global $tabRes;	
		$allFilmsId=$_SESSION['panier']['idProduit'];
		$idm=$_SESSION['userid'];
		$requete="INSERT INTO achats (idm, datach) VALUES (?, ?)";
		$unModele=new generalModele($requete,array($idm,date('Y-m-d')));
		try{
			$achatId=$unModele->executerAndGetId();
			foreach ($allFilmsId as $filmId){
				$unModele=new generalModele('INSERT INTO films_achats (idach, idf) VALUES (?,?)',array($achatId,$filmId));
				$stmt=$unModele->executer();
			}
			$tabRes['action']="enregistrer";
			$tabRes['msg']="Achat bien enregistre";
			unset($_SESSION['panier']);
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function listerAchats(){
		global $tabRes;
		$tabRes['action']="lister";
		$requete="SELECT * FROM achats";
		try{
		    $unModele=new generalModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeAchats']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeAchats'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	switch($action){
		case "acheter" :
			enregistrerAchats();
		break;
		case "lister" :
			listerAchats();
		break;
		}
    echo json_encode($tabRes);
?>