<?php
	require_once("../includes/modele.inc.php");
	$tabRes=array();

	function connecterMembre(){
		global $tabRes;
		$courriel = $_POST["courriel"];
		$motdepasse = $_POST["passwd"];

		$tabRes['action']="connecterMembre";
		$requete = "Select idm, pseudo, role, status, avatar from connexion natural join membres where courriel=? AND motdepasse=?";
		try{
			$unModele=new JeuModele($requete,array($courriel,$motdepasse));
			$stmt=$unModele->executer();
			$tabRes['Membre']=array();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['Membre']=$ligne;
				$tabRes['OK']=true;
				
			}
			else{
				$tabRes['OK']=false;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

	//******************************************************
	//Contrôleur
	
	//$action  reçoit la valeur de action par membreRequetes.js

	$action = $_POST['action'];

	switch($action){

		case "connecterMembre" :
			connecterMembre();
		break;
	}

    echo json_encode($tabRes,JSON_UNESCAPED_SLASHES);
?>