<?php
session_start();
$tabRes=array();
function creationPanier(){
	if (!isset($_SESSION['panier'])){
		$_SESSION['panier']=array();
		$_SESSION['panier']['idProduit'] = array();
		$_SESSION['panier']['pochetteProduit'] = array();
		$_SESSION['panier']['libelleProduit'] = array();
		$_SESSION['panier']['qteProduit'] = array();
		$_SESSION['panier']['prixProduit'] = array();
		$_SESSION['panier']['verrou'] = false;
	}
	return true;
}

function nombreFilmsEnPanier(){
	global $tabRes;
	creationPanier();
	$length=sizeof($_SESSION['panier']['idProduit']);
	$tabRes['action'] = "nombre";
	if (isset($_SESSION['username'])){
		$tabRes['nombre'] = $length;
	}else{
		$tabRes['nombre'] = -1;
	}
	
}
function ajouterFilm(){
	global $tabRes;
	$tabRes['action']="ajouter";
	$idProduit=$_POST['idProduit'];
	$pochetteProduit=$_POST['pochetteProduit'];
	$libelleProduit=$_POST['libelleProduit'];
	$qteProduit=$_POST['qteProduit'];
	$prixProduit=$_POST['prixProduit'];

	
	if (creationPanier())
	{
		//Si le produit existe déjà on ajoute seulement la quantité
		$positionProduit = array_search($idProduit,  $_SESSION['panier']['idProduit']);
	
		if ($positionProduit !== false)
		{
			$_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
		}
		else
		{
			//Sinon on ajoute le produit
			array_push( $_SESSION['panier']['idProduit'],$idProduit);
			array_push( $_SESSION['panier']['pochetteProduit'],$pochetteProduit);
			array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
			array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
			array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
		}
		$tabRes['error']="";
	}
	else
		$tabRes['error']="Un problème est survenu veuillez contacter l'administrateur du site.";
}

function contenuPanier(){
	global $tabRes;
	creationPanier();
	$length=sizeof($_SESSION['panier']['idProduit']);
	$tabRes['action'] = "contenu";
	$tabRes['panier']=array();
	$tabRes['size']=$length;
	for ($i=0; $i<$length; $i++){
		$tmp=array();
		$tmp['idProduit']=$_SESSION['panier']['idProduit'][$i];
		$tmp['pochetteProduit']=$_SESSION['panier']['pochetteProduit'][$i];
		$tmp['libelleProduit']=$_SESSION['panier']['libelleProduit'][$i];
		$tmp['qteProduit']=$_SESSION['panier']['qteProduit'][$i];
		$tmp['prixProduit']=$_SESSION['panier']['prixProduit'][$i];
		$tabRes['panier'][]=$tmp;
	}
}

function enleverDePanier(){
	global $tabRes;
	$idProduit=$_POST['idf'];
	//Si le panier existe
	$tabRes['action'] = "enlever";
	$panier=$_SESSION['panier'];
	$length=sizeof($_SESSION['panier']['idProduit']);
	if (creationPanier())
	{
		//Nous allons passer par un panier temporaire
		$tmp=array();
		$tmp['idProduit'] = array();
		$tmp['pochetteProduit'] = array();
		$tmp['libelleProduit'] = array();
		$tmp['qteProduit'] = array();
		$tmp['prixProduit'] = array();

	
		for($i = 0; $i < $length=sizeof($_SESSION['panier']['idProduit']); $i++)
		{
			if ($_SESSION['panier']['idProduit'][$i] !== $idProduit)
			{
				array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
				array_push( $tmp['pochetteProduit'],$_SESSION['panier']['pochetteProduit'][$i]);
				array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
				array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
				array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
			}
	
		}
		//On remplace le panier en session par notre panier temporaire à jour
		$_SESSION['panier'] =  $tmp;
		//On efface notre panier temporaire
		unset($tmp);
	}

	
}
function changerQuantite(){
	global $tabRes;
	$tabRes['action'] = "changerQuantite";
	$idProduit=$_POST['idf'];
	$qteProduit=$_POST['qte'];
	if (creationPanier())
	{
		//Recharche du produit dans le panier
		$positionProduit = array_search($idProduit,  $_SESSION['panier']['idProduit']);
		if ($positionProduit !== false)
		{
			$_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
		}
	}
}

//******************************************************
//Contr�leur
$action=$_POST['action'];
switch($action){
	case "contenu" :
		contenuPanier();
	break;
	case "nombre" :
		nombreFilmsEnPanier();
	break;
	case "ajouter" :
		ajouterFilm();
	break;
	case "enlever" :
		enleverDePanier();
	break;
	case "changerQuantite" :
		changerQuantite();
	break;
}
echo json_encode($tabRes);
?>