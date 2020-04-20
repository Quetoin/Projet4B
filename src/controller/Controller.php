<?php

namespace Projet4B\src\controller;

use Projet4B\src\DAO\ArticleDAO;
use Projet4B\src\DAO\CommentDAO;
use Projet4B\src\model\View;

abstract class Controller{

	protected $articleDAO;
	protected $commentDAO;
	protected $view;

	public function __construct(){

		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();
		$this->view = new View();

	}
	
}