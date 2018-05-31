<?php
	require_once("../includes/modele.jeu.inc.php");
	$tabRes=array();
	function enregistrer(){
		global $tabRes;	
		$nom=$_POST['nomjeu'];
		$idcatj=$_POST['idcatjeu'];
		$trailer=$_POST['trailerjeu'];
		$descr=$_POST['descjeu'];
		$dateinsc=date('Y-m-d H:i:s');
		$ident_mb = $_POST['idmembre'];
		$zero = 0;
		
		try{
			$unModele=new jeuModele();
			$pochete=$unModele->verserFichier("images.jeu", "pochettejeu", "avatar.jpg",$nom);
			$fiche=$unModele->verserDossier("installables", "fichierjeu", "tester.exe",$nom);
			$requete="INSERT INTO jeux(idm,nom,idcatj,pochette,fichej,nblike,nbdislike,descr,trailer,dateinsc) VALUES(?,?,?,?,?,?,?,?,?,?)";
			$unModele=new jeuModele($requete,array($ident_mb,$nom,$idcatj,$pochete,$fiche,$zero,$zero,$descr,$trailer,$dateinsc));
			$stmt=$unModele->executer();
			$tabRes['action']="enregistrer";
			$tabRes['msg']="Jeu bien enregistre";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}	
	function lister(){
		global $tabRes;
		$tabRes['action']="lister";
		$requete="SELECT J.idm, M.avatar, M.pseudo, J.idj, J.nom, C.nom as nomCat, J.trailer, J.pochette, J.fichej, J.descr, J.dateinsc, J.nblike, J.nbdislike, statusj FROM jeux J, categjeux C, membres M WHERE J.idcatj=C.idcatj AND M.idm = J.idm";
		try{
			 $unModele=new jeuModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeJeux']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeJeux'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function enlever(){
		global $tabRes;	
		$idjeu=$_POST['identJeu'];
		try{
			//$requete="SELECT * FROM jeux WHERE idj=?";
			//$unModele=new jeuModele($requete,array($idjeu));
			//$stmt=$unModele->executer();
			//if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$requetedeux="DELETE FROM jeux WHERE idj=?";
				$unModeledeux=new jeuModele($requetedeux,array($idjeu));
				$stmtdeux=$unModeledeux->executer();
				$tabRes['action']="enlever";
				$tabRes['msg']="Jeu ".$idjeu." bien enleve";
			//}
			//else{
				//$tabRes['action']="enlever";
				//$tabRes['msg']="Jeu ".$idjeu." introuvable";
			//}
		}catch(Exception $e){
		}finally{
			//unset($unModele);
			unset($unModeledeux);
		}
	}

	function changerStatusJeu(){
		global $tabRes;
		$tabRes['action']="changerstatusjeu";

		if ($_POST['statusjeu'] == 0)
			$nouveauStatus = "désactivé";
		else  $nouveauStatus = "activé";

		$requete = "update jeux set jeux.statusj=? where idj =?";
		try{
			$unModele=new JeuModele($requete,array($nouveauStatus,$_POST['idjeu']));
			$stmt=$unModele->executer();
			$tabRes['Membre']=array();
			$tabRes['OK']=false;
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			   $tabRes['OK']=true;
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
		case "enlever" :
			enlever();
		break;
		case "fiche" :
			fiche();
		break;
		case "modifier" :
			modifier();
		break;
		case "changerstatusjeu" :
			changerStatusJeu();
		break;
	}
    echo json_encode($tabRes);
?>