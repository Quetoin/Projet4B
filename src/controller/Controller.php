<?php

namespace Projet4B\src\controller;

use Projet4B\config\Request;
use Projet4B\src\constraint\Validation;
use Projet4B\src\DAO\ArticleDAO;
use Projet4B\src\DAO\UserDAO;
use Projet4B\src\DAO\CommentDAO;
use Projet4B\src\model\View;


// Classe parente pour gérer les controlleurs

abstract class Controller{

	protected $articleDAO;
	protected $commentDAO;
	protected $userDAO;
	protected $view;

	private $request;

	protected $get;
	protected $post;
	protected $session;
	protected $validation;

	public function __construct(){

		// Instanciation DAO et autres objets pour les avoir dans tous les controlleurs
		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();
		$this->userDAO = new UserDAO();
		$this->view = new View();
		$this->request = new Request();
		$this->validation = new Validation();

		// Raccourci pour les requêtes
		$this->get = $this->request->getGet();
		$this->post = $this->request->getPost();
		$this->session = $this->request->getSession();


	}
	
}