<?php
	require_once("../includes/modele.message.inc.php");
	$tabRes=array();
	function enregistrer(){

		global $tabRes;
		$message=$_POST['message'];
		$idm=$_POST['idmembre'];
		$idcatm=$_POST['idcatm'];
		$datemes= date('Y-m-d H:i:s');
		try{
			$unModele=new messageModele();
			$image=$unModele->verserFichier("images", "image", "avatar.jpg",$idm);
			$requete="INSERT INTO messages VALUES(0,?,?,?,?,?)";
			$unModele=new messageModele($requete,array($idm,$message,$image,$idcatm,$datemes));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']="Message bien publie";				
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function lister(){
		global $tabRes;
		$tabRes['action']="lister";
		$requete="select idmes,avatar, pseudo, message, image, categmes.nom, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	function filtrerCateg(){
		global $tabRes;
		$idcatm=$_POST['idcatm'];
		$tabRes['action']="filtrerCateg";
		$requete="select idmes,avatar, pseudo, message, image, categmes.nom, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm
		and messages.idcatm = ".$idcatm;
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

	function filtrerMembre(){
		global $tabRes;
		$pseudo=$_POST['pseudo'];
		$tabRes['action']="filtrerMembre";
		$requete="select idmes,avatar, pseudo, message, image, categmes.nom, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm
		and pseudo = '".$pseudo."'";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function enlever(){
		global $tabRes;	
		$idmes=$_POST['numE'];
		try{
			$requete="SELECT * FROM messages WHERE idmes=?";
			$unModele=new messageModele($requete,array($idmes));
			$stmt=$unModele->executer();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$unModele->enleverFichier("images",$ligne->image);
				$requete="DELETE FROM messages WHERE idmes=?";
				$unModele=new messageModele($requete,array($idmes));
				$stmt=$unModele->executer();
				$tabRes['action']="enlever";
				$tabRes['msg']="Message ".$idmes." bien enleve";
			}
			else{
				$tabRes['action']="enlever";
				$tabRes['msg']="Message ".$idmes." introuvable";
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function listerMessDev(){
		global $tabRes;
		$tabRes['action']="listerMessDev";
		$requete="select avatar, pseudo, message, image, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm and messages.idcatm = 3";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

	function listerMessAst(){
		global $tabRes;
		$tabRes['action']="listerMessAst";
		$requete="select avatar, pseudo, message, image, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm and messages.idcatm = 4";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function listerMessEv(){
		global $tabRes;
		$tabRes['action']="listerMessEv";
		$requete="select avatar, pseudo, message, image, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm and messages.idcatm = 5";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

	function listerMessMJ(){
		global $tabRes;
		$tabRes['action']="listerMessMJ";
		$requete="select avatar, pseudo, message, image, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm and messages.idcatm = 6";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

	function listerMessVente(){
		global $tabRes;
		$tabRes['action']="listerMessVente";
		$requete="select avatar, pseudo, message, image, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm and messages.idcatm = 1";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

	function listerMessEch(){
		global $tabRes;
		$tabRes['action']="listerMessEch";
		$requete="select avatar, pseudo, message, image, datemes from membres, messages, categmes where membres.idm = messages.idm and categmes.idcatm = messages.idcatm and messages.idcatm = 2";
		try{
			 $unModele=new messageModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeMessages']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeMessages'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}



	
	//******************************************************
	//Contr�leur
	$action=$_POST['action'];
	switch($action){
		case "enregistrer" :
			enregistrer();
		break;
		case "lister" :
			lister();
		break;
		case "filtrerCateg" :
			filtrerCateg();
		break;
		case "filtrerMembre" :
			filtrerMembre();
		break;
		case "enlever" :
			enlever();
		break;
		case "listerMessDev" :
			listerMessDev();
		break;
		case "listerMessAst" :
			listerMessAst();
		break;
		case "listerMessEv" :
			listerMessEv();
		break;
		case "listerMessMJ" :
			listerMessMJ();
		break;
		case "listerMessVente" :
		listerMessVente();
		break;
		case "listerMessEch" :
		listerMessEch();
		break;
		
		
	}
    echo json_encode($tabRes);
?>