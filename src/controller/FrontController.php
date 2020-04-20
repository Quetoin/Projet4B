<?php

namespace Projet4B\src\controller;


class FrontController extends Controller{


	public function home(){
		return $this->view->render("home");
	}

	public function about(){
		return $this->view->render("biographie");
	}

	public function contactForm(){
		return $this->view->render("contact");
	}


	public function listPosts(){

		$articles = $this->articleDAO->getArticles();

		return $this->view->render("listPosts",[
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