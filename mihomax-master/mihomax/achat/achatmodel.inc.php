<?php
require_once("../BD/connexion.inc.php");
class AchatModele{
		private $requete;
		private $params;
		private $connexion;
		
	function __construct($requete=null,$params=null){
			$this->requete=$requete;
			$this->params=$params;
	}
	
	function obtenirConnexion(){
		$maConnexion = new Connexion("localhost", "root", "", "db_films");
		$maConnexion->connecter();
		return $maConnexion->getConnexion();
	}
	
	function executer(){
			$this->connexion = $this->obtenirConnexion();
			$stmt = $this->connexion->prepare($this->requete);
			$stmt->execute($this->params);
			$this->deconnecter();
			return $stmt;
		}
	function executerAndGetId(){
		$this->connexion = $this->obtenirConnexion();
		$stmt = $this->connexion->prepare($this->requete);
		$stmt->execute($this->params);
		$id=$this->connexion->lastInsertId();
		$this->deconnecter();
		return $id;
	}
	function deconnecter(){
			unset($this->connexion);
	}
}
?>