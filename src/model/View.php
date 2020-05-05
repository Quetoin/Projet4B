<?php

namespace Projet4B\src\model;

use Projet4B\config\Request;

// Objet View permettant de simplifier l'appel des différentes vues.

class View{

	private $file;
	private $title;
	private $request;
	private $session;

	public function __construct(){

		$this->request = new Request();
		$this->session = $this->request->getSession(); // Récupère toutes les variables de session

	}


	public function render($template,$data = []){

		$this->file = "../templates/".$template.".php"; // Récupère le chemin d'accès en fonction du paramètre (nom du fichier)
		$content = $this->renderFile($this->file,$data); // La méthode renderFile est contenu dans une variable
		$view = $this->renderFile("../templates/base.php", [
			"title" => $this->title,
			"content" => $content,
			"session" => $this->session
		]);

		echo $view;

	}

	//Méthode permettant d'extraire le contenu de toute la vue pour ensuite le rajouter au template BASE
	private function renderFile($file,$data){

		if(file_exists($file)){ // Si le fichier existe

			extract($data); // On extrait les données
			ob_start();
			require $file;
			return ob_get_clean();

		}

		header("Location:index.php?route=notFound");
	}
	
}