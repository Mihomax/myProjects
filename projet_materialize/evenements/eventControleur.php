<?php
	
	function enregistrer(){
		global $tabRes;	
		$titre=$_POST['titre'];
		//$dateev=$_POST['dateev'];
		$dateev = date('Y-m-d H:i:s');
		$descr=$_POST['descr'];
		try{
			$unModeleA=new eventsModele();
			$unModeleB=new eventsModele();
			$unModeleC=new eventsModele();
			$img1=$unModeleA->verserFichier("images", "img1", "","img1");
			$img2=$unModeleB->verserFichier("images", "img2", "","img2");
			$img3=$unModeleC->verserFichier("images", "img3", "","img3");
			$requete="INSERT INTO evenements VALUES(0,?,?,?,?,?,?)";
			$unModele=new eventsModele($requete,array($titre,$dateev,$descr,$img1,$img2,$img3));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']="Événement bien enregistré";
		}catch(Exception $e){
			$tabRes['err_enregistrer']=true;
		}finally{
			unset($unModele);
		}
	}
	
	function lister(){
		global $tabRes;
		$tabRes['action']="lister";
		$requete="SELECT * FROM evenements";
		try{
			 $unModele=new eventsModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeEvenements']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeEvenements'][]=$ligne;
			}
		}catch(Exception $e){
			$tabRes['erreur']=$e;
		}finally{
			unset($unModele);
		}
	}
	
	function supprimer(){
		global $tabRes;
		$idev=$_POST['idev'];
		try{
			$requete="SELECT * FROM evenements WHERE idev=?";
			$unModele=new eventsModele($requete,array($idev));
			$stmt=$unModele->executer();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$requete="DELETE FROM evenements WHERE idev=?";
				$unModele=new eventsModele($requete,array($idev));
				$stmt=$unModele->executer();
				$tabRes['action']="supprimer";
				$tabRes['msg']="Évenement ".$idev." bien enlevé";
			}
			else{
				$tabRes['action']="supprimer";
				$tabRes['msg']="Évenement ".$idev." introuvable";
			}
		}catch(Exception $e){
			$tabRes['erreur']=$e;
		}finally{
			unset($unModele);
		}
	}
		
	function modifier(){
		global $tabRes;
		$titre=$_POST['titre'];		
		$descr=$_POST['descr'];
		$dateev=$_POST['dateev'];
		$idev=$_POST['idev'];
		try{
		
			$requete="UPDATE evenements SET titre=?,descr=?, dateev=? WHERE idev=?";
			$unModele=new eventsModele($requete,array($titre,$descr,$dateev,$idev));
			$stmt=$unModele->executer();
			$tabRes['action']="modifier";
			$tabRes['msg']="Événement " . $idev . " bien modifié";
		}catch(Exception $e){
			$tabRes['erreur']=$e;
		}finally{
			unset($unModele);
		}
	}	
	
	//******************************************************
	//Contr�leur
	require_once("../includes/modele.events.inc.php");
	$tabRes=array();
	$action=$_POST['action'];
	switch($action){
		case "enregistrer" :
			enregistrer();
		break;
		case "lister" :
			lister();
		break;
		case "supprimer" :
			supprimer();
		break;
		case "modifier" :
			modifier();
		break;
	}
    echo json_encode($tabRes);
?>