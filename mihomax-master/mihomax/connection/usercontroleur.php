<?php
	require_once("../includes/modele.inc.php");
	$tabRes=array();
	function enregistrer(){
		global $tabRes;	
		$username = $_POST['username'];
		$email = $_POST['email'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$datnais = $_POST['datnais'];
		$password_1 = $_POST['password_1'];
		$password_1 = md5($password_1);
		$unModel; 
		$userId;
		try{
			$requete = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
			$unModel= new generalModele($requete, array($username,$email));
			$stmt=$unModel->executer();
			if(!$ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$requete = 'INSERT INTO membres (prenom, nom, datnais, datinsc) VALUES (?, ?, ?, ?)';
				$unModel=new generalModele($requete, array($prenom, $nom, $datnais,date('Y-m-d')));
				$idm = $unModel->executerAndGetId();
				$requete = 'INSERT INTO users (username, email, password, idm) VALUES (?, ?, ?, ?)';
				$unModel = new generalModele($requete, array($username, $email, $password_1, $idm));
				$userId = $unModel->executerAndGetId();
				$_SESSION['username'] = $username;
				$_SESSION['userId'] = $userId;
				$tabRes['action']="enregistrer";
				$tabRes['msg']="Registration a été réussie";
				
			}else{
				$tabRes['action']="enregistrer";
				$tabRes['msg']="Un utilisateur avec un tel nom d'utilisateur ou e-mail est deja existe";
			}
		}catch (Exception $e){
			echo $e;
		}finally{
			unset($unModele);
		}
	}
	
	function login(){
		global $tabRes;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);
		try{
			$requete = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$unModele = new generalModele($requete, array($username, $password));
			$stmt = $unModele->executer();
			if ($stmt->rowCount() == 1){
				$line=$stmt->fetch(PDO::FETCH_OBJ);
				$_SESSION['userId'] = $line->id;
				$_SESSION['username'] = $username;
				$tabRes['action']="enregistrer";
				$tabRes['msg']="Login a été réussie";
			}else {
				$tabRes['action']="enregistrer";
				$tabRes['msg']="mauvaise Pseudo/Mot de passe";
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
		case "enregistrer" :
			enregistrer();
		break;
		case "login" :
			login();
		break;
		case "logout" :
			userLogout();
		break;
		}
    echo json_encode($tabRes);
?>