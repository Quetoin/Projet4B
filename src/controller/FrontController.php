<?php

namespace Projet4B\src\controller;

use Projet4B\src\DAO\ArticleDAO;
use Projet4B\src\DAO\CommentDAO;


class FrontController{

	private $articleDAO;
	private $commentDAO;

	public function __construct(){

		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();

	}

	public function home(){

		$articles = $this->articleDAO->getArticles();
		require '../templates/home.php';

	}

	public function post($articleId){

    	$articles = $this->articleDAO->getArticle($articleId);

        $comments = $this->commentDAO->getCommentsFromArticle($articleId);

		require '../templates/post.php';

	}



}