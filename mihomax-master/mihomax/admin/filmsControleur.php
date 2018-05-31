<?php
	require_once("../includes/modele.inc.php");
	session_start();
	$tabRes=array();
	function enregistrer(){
		global $tabRes;	
		$titre=$_POST['titre'];
		$duree=$_POST['duree'];
		$res=$_POST['res'];
		$genres=$_POST['genres'];
		$pays=$_POST['pays'];
		$prix=$_POST['prix'];
		$trailer=$_POST['trailer'];
		$rating=$_POST['rating'];
		$descr=$_POST['descr'];
		try{
			$unModele=new generalModele();
			$pochete=$unModele->verserFichier("pochettes", "pochette", "avatar.jpg",$titre);
						
			$requete="INSERT INTO films VALUES(0,?,?,?,?,?,?,?,?,?)";
			$unModele=new generalModele($requete,array($titre,$duree,$res,$pays,$prix,$trailer,$pochete,$rating,$descr));
			$filmId=$unModele->executerAndGetId();
			foreach ($genres as $genre){
				$requete = "INSERT INTO films_genres VALUES (0,?,?)";
				$unModele = new generalModele($requete, array ($filmId,$genre));
				$unModele->executer();
			}
			$tabRes['action']="enregistrer";
			$tabRes['msg']="Film bien enregistre";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function listerInAdminPage(){
		global $tabRes;
		$tabRes['action']="lister";
		$requete="SELECT films.idf, titre, prix, pochette, rating, res, duree, pays, descr, trailer, GROUP_CONCAT(`nom`) as `genres` FROM films, films_genres, genres WHERE films.idf=films_genres.idf AND genres.idgen=films_genres.idgen GROUP BY films.idf";
		try{
			 $unModele=new generalModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeFilms']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeFilms'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function enlever(){
		global $tabRes;	
		$idf=$_POST['idf'];
		try{
			$requete="SELECT * FROM films WHERE idf=?";
			$unModele=new generalModele($requete,array($idf));
			$stmt=$unModele->executer();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$requete="DELETE FROM films_genres WHERE idf=?";
				$unModele = new generalModele($requete, array($idf));
				$unModele->executer();
				
				$unModele->enleverFichier("pochettes",$ligne->pochette);
				$requete="DELETE FROM films WHERE idf=?";
				$unModele=new generalModele($requete,array($idf));
				$stmt=$unModele->executer();
				$tabRes['action']="enlever";
				$tabRes['msg']="Film ".$idf." bien enleve";
			}
			else{
				$tabRes['action']="enlever";
				$tabRes['msg']="Film ".$idf." introuvable";
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function fiche(){
		global $tabRes;
		$idf=$_POST['idf'];
		$tabRes['action']="fiche";
		$requete="SELECT * FROM( SELECT films.idf, titre, prix, pochette, rating, res, duree, pays, descr, trailer, GROUP_CONCAT(genres.idgen) as `genres` FROM films, films_genres, genres WHERE films.idf=films_genres.idf AND genres.idgen=films_genres.idgen GROUP BY films.idf ) AS newtable WHERE idf=?";
		try{
			 $unModele=new generalModele($requete,array($idf));
			 $stmt=$unModele->executer();
			 $tabRes['fiche']=array();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['fiche']=$ligne;
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
	
	function getFilmForDescription(){
		global $tabRes;
		$idf=$_POST['idf'];
		$tabRes['action']="description";
		if (isset($_SESSION['username'])){
			$tabRes['user']="1";
		}else {
			$tabRes['user']="0";
		}
		$requete="SELECT * FROM( SELECT films.idf, titre, prix, pochette, rating, res, duree, pays, descr, trailer, GROUP_CONCAT(`nom`) as `genres` FROM films, films_genres, genres WHERE films.idf=films_genres.idf AND genres.idgen=films_genres.idgen GROUP BY films.idf ) AS newtable WHERE idf=?";
		try{
			$unModele=new generalModele($requete,array($idf));
			$stmt=$unModele->executer();
			$tabRes['fiche']=array();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['fiche']=$ligne;
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
	
	function filtrer(){
		global $tabRes;
		if (isset($_SESSION['username'])){
			$tabRes['user']="1";
		}else {
			$tabRes['user']="0";
		}
		$tabRes['action']="filtrer";
		$genre="";
		if (isset($_POST["genre"]) && !empty($_POST["genre"])) {
			$genre=$_POST['genre'];
		}
		$nom="";
		if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
			$nom=$_POST['nom'];
		}
		$pays="";
		if (isset($_POST["pays"]) && !empty($_POST["pays"])) {
			$pays=$_POST['pays'];
		}
		$params=array();
		$requete="SELECT films.idf, titre, prix, pochette, rating, GROUP_CONCAT(`nom`) as `genres` FROM films, films_genres, genres WHERE films.idf=films_genres.idf AND genres.idgen=films_genres.idgen";
		if ($nom !=""){
			$requete.=" AND titre LIKE ?";
			$params[]="%".$nom."%";
		}
		if ($genre != ""){
			$requete.=" AND nom=?";
			$params[]=$genre;
		}
		if ($pays != ""){
			$requete.=" AND pays=?";
			$params[]=$pays;
		}
		$requete.=" GROUP BY films.idf";
		try{
			$unModele=new generalModele($requete,$params);
			$stmt=$unModele->executer();
			$tabRes['listeFilms']=array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['listeFilms'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function modifier(){
		global $tabRes;	
		
		$genre=$_POST['genre'];
		$pays=$_POST['pays'];
		$titre=$_POST['titre'];
		$duree=$_POST['duree'];
		$res=$_POST['res'];
		$prix=$_POST['prix'];
		$trailer=$_POST['trailer'];
		$rating=$_POST['rating'];
		$descr=$_POST['descr'];
		$idf=$_POST['idf'];  
		try{
			//Recuperer ancienne pochette
			$requette="SELECT pochette FROM films WHERE idf=?";
			$unModele=new generalModele($requette,array($idf));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$anciennePochette=$ligne->pochette;
			$pochette=$unModele->verserFichier("pochettes", "pochette",$anciennePochette,$titre);	
			$requete="UPDATE films SET titre=?,duree=?, res=?, pays=?, prix=?,trailer=?,pochette=?,rating=?,descr=? WHERE idf=?";
			$unModele=new generalModele($requete,array($titre,$duree,$res,$pays,$prix,$trailer,$pochette,$rating,$descr,$idf));
			$stmt=$unModele->executer(); 
			
		
			
			$requete="SELECT idfgen,idgen FROM films_genres WHERE idf=?";
			$unModele=new generalModele($requete,array($idf));
			$stmt=$unModele->executer();
			$tabGenres=array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabGenres[]=$ligne;
			}
			
			$tabDelete=array();
			$tabAdd=array();
			foreach ($tabGenres as $gen){
				if (!in_array($gen->idgen,$genre)){
					$tabDelete[]=$gen->idfgen;
				}
			}
			foreach ($genre as $g){
				$result=false;
				for ($i=0; $i<count($tabGenres); $i++){
					if ($g == $tabGenres[$i]->idgen){
						$result=true;
					}
				}
				if (!$result){
					$tabAdd[]=$g;
				}
			}
			if (count($tabDelete)>0){
				$requeteDelete="DELETE FROM films_genres WHERE idfgen IN (?";
				for ($j=1; $j<count($tabDelete); $j++){
					$requeteDelete.=", ?";
				}
				$requeteDelete.=");";
				$unModele=new generalModele($requeteDelete,$tabDelete);
				$stmt=$unModele->executer();
			}
			if (count($tabAdd)>0){
				$requeteAdd="INSERT INTO films_genres (idf, idgen) VALUES (".$idf.",?)";
				for ($k=1; $k<count($tabAdd); $k++){
					$requeteAdd.=",(".$idf.",?)";	
				}
				$unModele=new generalModele($requeteAdd,$tabAdd);
				$stmt=$unModele->executer();
			}
			
			$tabRes['action']="modifier";
			$tabRes['msg']="Film $idf bien modifie";
		}catch(Exception $e){
			$tabRes['e']=$e;
		}finally{
			unset($unModele);
		}
	}
	
	function getTopFilms(){
		global $tabRes;
		$tabRes['action']="topfilms";
		if (isset($_SESSION['username'])){
			$tabRes['user']="1";
		}else {
			$tabRes['user']="0";
		}
		$requete="SELECT films.idf, titre, prix, pochette, rating, GROUP_CONCAT(`nom`) as `genres` FROM films, films_genres, genres WHERE films.idf=films_genres.idf AND genres.idgen=films_genres.idgen GROUP BY films.idf ORDER BY `films`.`rating` DESC LIMIT 12";
		try{
			$unModele=new generalModele($requete,array());
			$stmt=$unModele->executer();
			$tabRes['listeFilms']=array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['listeFilms'][]=$ligne;
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
			listerInAdminPage();
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
		case "topfilms" :
			getTopFilms();
		break;
		case "description" :
			getFilmForDescription();
		break;
		case "filtrer" :
			filtrer();
		break;
	}
    echo json_encode($tabRes);
?>