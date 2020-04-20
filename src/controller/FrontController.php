<?php

namespace Projet4B\src\controller;

use Projet4B\src\DAO\ArticleDAO;
use Projet4B\src\DAO\CommentDAO;

use Projet4B\src\model\View;


class FrontController{

	private $articleDAO;
	private $commentDAO;

	public function __construct(){

		$this->articleDAO = new ArticleDAO();
		$this->commentDAO = new CommentDAO();
		$this->view = new View();

	}

	public function home(){

		$articles = $this->articleDAO->getArticles();

		return $this->view->render("home",[
			"articles" => $articles
		]);

	}


	public function post($articleId){

    	$article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);

        return $this->view->render("post",[
        	"article" => $article,
        	"comments" => $comments
        ]);

	}

}