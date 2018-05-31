<?php
	require_once("../includes/modele.inc.php");
	$tabRes=array();
	
	//vérifie si le courriel et le pseudo existe dans la BD
	function validerCourrielPseudo($courriel,$pseudo){
		global $tabRes;
		$requetep = "Select pseudo from membres where pseudo=?";
		try{
			 $unModelep=new JeuModele($requetep,array($pseudo));
			 $stmtp=$unModelep->executer();
			 if($ligne=$stmtp->fetch(PDO::FETCH_OBJ)){
			    $tabRes['err_pseudo'] = true;
			}
		}catch(Exception $e){
		}finally{
			unset($unModelep);
		}
		
		$requetec = "Select courriel from connexion where courriel=?";
		try{
			 $unModelec=new JeuModele($requetec,array($courriel));
			 $stmtc=$unModelec->executer();
			 if($ligne=$stmtc->fetch(PDO::FETCH_OBJ)){
			    $tabRes['err_courriel'] = true;
			}
		}catch(Exception $e){
		}finally{
			unset($unModelec);
		}	
	}
	
	function enregistrerMembre(){
		global $tabRes;

		//on récupère les informations du membre pour l'enregistrement
		//methode d'envoi POST

		$nom_m=$_POST['nom'];
		$prenom_m=$_POST['prenom'];
		$datnais_m=$_POST['datenaissance'];
		$pseudo_m=$_POST['pseudodm'];

		$membre_avatar=$_POST['avatarm'];
		
		$courriel_m=$_POST['courriel'];
		$motdepasse_m=$_POST['motdepasse'];
		$dateincription = date('Y-m-d H:i:s');
		$tabRes['err_pseudo'] = false;
		$tabRes['err_courriel'] = false;
		
		validerCourrielPseudo($courriel_m,$pseudo_m);
		
		if($tabRes['err_pseudo'] == false && $tabRes['err_courriel'] == false){
			
			try{
				$unModele=new JeuModele();
				$avatar_m=$unModele->verserFichier("avatar", "avatarm", "mario.png",$membre_avatar);
				$requete="INSERT INTO membres(nom,prenom,datnais,pseudo,avatar,dateinsc) VALUES(?,?,?,?,?,?)";
				$unModele=new JeuModele($requete,array($nom_m,$prenom_m,$datnais_m,$pseudo_m,$avatar_m,$dateincription));
				$stmt=$unModele->executer();
				
			}catch(Exception $e){
			}finally{
				unset($unModele);
			}
			
			try{
				
				$unModeledeux=new JeuModele();
				$requetedeux="INSERT INTO connexion(idm,courriel,motdepasse) VALUES ((SELECT idm from membres WHERE pseudo=?),?,?)";
				$unModeledeux=new JeuModele($requetedeux,array($pseudo_m,$courriel_m,$motdepasse_m));
				$stmtdeux=$unModeledeux->executer();

			}catch(Exception $e){
			}finally{
				unset($unModeledeux);
			}

			$tabRes['action']="enregistrer";
		}
	}

	function afficherMembres(){
		global $tabRes;
		$tabRes['action']="activerdesactivermembre";
		$requete = "Select idm, nom, prenom, pseudo, status, avatar from membres where role='UTILISATEUR'";
		try{
			$unModele=new JeuModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['Membre']=array();
			$tabRes['OK']=false;
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			   $tabRes['listeMembres'][]=$ligne;
			   $tabRes['OK']=true;
		   	}
	   }catch(Exception $e){
	   }finally{
		   unset($unModele);
	   }
	}

	function afficherUnMembre(){
		global $tabRes;
		$tabRes['action']="afficherunmembre";
		$identifiantmb = $_POST["numMb"];
		
		$requete = "Select idm, nom, prenom, pseudo, status, avatar from membres where idm=?";
		try{
			$unModele=new JeuModele($requete,array($identifiantmb));
			$stmt=$unModele->executer();
			$tabRes['Membre']=array();
			$tabRes['OK']=false;
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			   $tabRes['Membre']=$ligne;
			   $tabRes['OK']=true;
		   	}
	   }catch(Exception $e){
	   }finally{
		   unset($unModele);
	   }
	}

	function changerStatusMembre(){
		global $tabRes;
		$tabRes['action']="changerstatusmembre";

		if ($_POST['statusMembre'] == 0)
			$nouveauStatus = "désactivé";
		else  $nouveauStatus = "activé";

		$requete = "update membres set status=? where idm =?";
		try{
			$unModele=new JeuModele($requete,array($nouveauStatus,$_POST['identifiant']));
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

	function supprimerMembre(){
		global $tabRes;
		$tabRes['action']="supprimermembre";

		$requete = "delete from membres where idm=?";
		try{
			$unModele=new JeuModele($requete,array($_POST['identifiant']));
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

	
	function modifierMembre(){
		global $tabRes;
		$tabRes['action']="modifiermembre";
		
		$nom_mbr = $_POST["nom_m"];
		$prenom_mbr = $_POST["prenom_m"];
		$pseudo_mbr = $_POST["pseudo_m"];
		$ident_mbr = intval($_POST['identifiant']);
		//var_dump($_POST);
	
		$requete = "update membres set nom=?, prenom=?, pseudo=? where idm=?";
		try{
			$unModele=new JeuModele($requete,array($nom_mbr,$prenom_mbr,$pseudo_mbr,$ident_mbr));
			$stmt=$unModele->executer();
			$tabRes['OK']=false;
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			   $tabRes['OK']=true;
		   	}
	   }catch(Exception $e){
	   }finally{
		   unset($unModele);
	   }
	   
		try{
			
			if(!empty($_POST['nouvelavatarnom'])){
				$avatar_mbr=$_POST['nouvelavatarnom'];
				//echo $avatar_mbr;
				$unModeledeux=new JeuModele();
				//$unModeledeux->enleverFichier("avatar", $_POST['ancienavatar']);
				$avatar_m=$unModeledeux->verserFichier("avatar", "nouvelavatarimg", "mario.png",$avatar_mbr);
				$requetedeux = "update membres set avatar=? where idm=?";
				$unModeledeux=new JeuModele($requetedeux,array($avatar_m,$ident_mbr));
				$stmtdeux=$unModeledeux->executer();
				$tabRes['OKAvatar']=true;
			}

	   }catch(Exception $e){
	   }finally{
		   unset($unModeledeux);
	   }
	}

	//******************************************************
	//Contrôleur
	
	//$action  reçoit la valeur de action par membreRequetes.js

	
	$action = $_POST['action'];

	switch($action){
		case "enregistrermembre" :
			enregistrerMembre();
		break;
		case "affichermembres" :
			afficherMembres();
		break;
		case "changerstatusmembre" :
			changerStatusMembre();
		break;
		case "supprimermembre" :
		supprimerMembre();
		break;
		case "modifiermembre" :
		modifierMembre();
		break;
		case "afficherunmembre" :
		afficherUnMembre();
		break;
	}

    echo json_encode($tabRes,JSON_UNESCAPED_SLASHES);
?>