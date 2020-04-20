<?php

namespace Projet4B\src\controller;


class FrontController extends Controller{


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