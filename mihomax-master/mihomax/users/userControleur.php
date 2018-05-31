<?php
session_start();
$tabRes=array();
require_once("../includes/modele.inc.php");
function getUserFromSession(){
	global $tabRes;
	$tabRes['action']="userfromsession";
	if (isset($_SESSION['username'])){
		$tabRes['username'] = $_SESSION['username'];
	}else {
		$tabRes['username']="";
	}
}

function enregistrerUser(){
	global $tabRes;
	$tabRes['action']="enregistrer";
	$username = $_POST['username'];
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$datnais = $_POST['datnais'];
	$password1 = $_POST['password1'];
// 	$username="eege";
// 	$email="eee@ege.rr";
// 	$nom="eee";
// 	$prenom="eee";
// 	$datnais="2015-02-03";
// 	$password_1="eee";
	$password1 = md5($password1);
	try{
		$requete1 = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
		$unModel1= new generalModele($requete1, array($username,$email));
		$stmt1=$unModel1->executer();
		if(!$ligne1=$stmt1->fetch(PDO::FETCH_OBJ)){
			$requete2 = 'INSERT INTO membres (prenom, nom, datnais, datinsc) VALUES (?, ?, ?, ?)';
			$unModel2=new generalModele($requete2, array($prenom, $nom, $datnais, date('Y-m-d')));
			$idm = $unModel2->executerAndGetId();
			$requete3 = 'INSERT INTO users (username, email, password, idm) VALUES (?, ?, ?, ?)';
			$unModel3 = new generalModele($requete3, array($username, $email, $password1, $idm));
			$userId = $unModel3->executerAndGetId();
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $userId;
			$tabRes['error']="";

		}else{
			$tabRes['error']="Un utilisateur avec un tel nom d'utilisateur ou e-mail est deja existe";
		}
	}catch (Exception $e){
		$tabRes['e']=$e;
	}finally{		
		unset($unModele1);
		unset($unModele2);
		unset($unModele3);
	}
}

function login(){
	global $tabRes;
	$tabRes['action']="login";
	$username = $_POST['usernameL'];
	$password = $_POST['passwordL'];
	$password = md5($password);
	try{
		$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
		$unModele=new generalModele($query,array());
		$stmt=$unModele->executer();
		$ligne=$stmt->fetch(PDO::FETCH_OBJ);
		if ($stmt->rowCount() == 1) {
			$_SESSION['userid'] = $ligne->id;
			$_SESSION['username'] = $ligne->username;
			$tabRes['userid'] = $_SESSION['userid'];
			$tabRes['username'] = $_SESSION['username'];
			$tabRes['error']= "";
		}else {
			$tabRes['error']= "mauvaise Pseudo/Mot de passe";
		}
	}catch (Exception $e){
		$tabRes['e']=$e;
	}finally{		
		unset($unModele);

	}
}

function userLogout(){
	global $tabRes;
	unset($_SESSION['username']);
	unset($_SESSION['userid']);
	unset($_SESSION['panier']);
	$_SESSION = array();
	session_destroy();
	$tabRes['action']="logout";
}


$action=$_POST['action'];
	switch($action){
		case "registration" :
			enregistrerUser();
		break;
		
		case "connection" :
			login();
		break;
		
		case "logout" :
			userLogout();
		break;
		
		case "getuser" :
			getUserFromSession();
		break;
		
		}
    echo json_encode($tabRes);

?>