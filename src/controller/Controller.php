<?php

namespace Projet4B\src\controller;

use Projet4B\config\Request;
use Projet4B\src\DAO\ArticleDAO;
use Projet4B\src\DAO\CommentDAO;
use Projet4B\src\model\View;

abstract class Controller{

	protected $articleDAO;
	protected $commentDAO;
	protected $view;

	private $request;

	protected $get;
	protected $post;
	protected $session;

	public function __construct(){

		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();
		$this->view = new View();
		$this->request = new Request();

		$this->get = $this->request->getGet();
		$this->post = $this->request->getPost();
		$this->session = $this->request->getSession();


	}
	
}