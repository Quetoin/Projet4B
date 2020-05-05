<?php

namespace Projet4B\src\controller;

class ErrorController extends Controller{
	
	public function errorNotFound(){

		return $this->view->render('error_404'); // Renvoie la vue lié à l'erreur 404

	}

	public function errorServer(){

		return $this->view->render('error_500'); // Renvoie la vue lié à l'erreur 500

	}
}