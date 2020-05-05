<?php

namespace Projet4B\src\DAO;

use PDO;
use Exception;


// Classe parente pour gérer la connexion à la BDD
abstract class DAO{


	private $connection;


	private function checkConnection(){

		if($this->connection === null){ // S'il n'y a pas de connexion
			return $this->getConnection(); // On appelle la méthode pour se connecter à la BDD
		}

		return $this->connection; // Sinon, on renvoie la connexion (pas besoin d'en refaire une)
	}

	
	private function getConnection(){

		try{ // Connexion à la BDD avec les variables du fichier DEV.PHP

			$this->connection = new PDO(DB_HOST,DB_USER,DB_PASS);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $this->connection;
		}

		catch(Exception $errorConnection){

			die("Erreur de connection:".$errorConnection->getMessage());

		}
	}
	

	// Méthode qui permet de faciliter les requêtes SQL
	public function createQuery($sql,$parameters = null){

		if($parameters){
			// Si on envoie des paramètres à la requête, on va la préparer -> gain de temps et de sécurité
			$result = $this->checkConnection()->prepare($sql);
			$result->execute($parameters);
			return $result;
		}

		// Si pas de paramètre, on effectue la requête SQL simple
		$result = $this->checkConnection()->query($sql);
		return $result;

	}
}