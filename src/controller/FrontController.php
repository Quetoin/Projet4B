<?php

namespace Projet4B\src\controller;

use Projet4B\config\Parameter;


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


	public function addComment(Parameter $post,$articleId){

    	if($post->get("submit")){

    		$errors = $this->validation->validate($post,"Comment");

    		if(!$errors){

    			$this->commentDAO->addComment($post,$articleId);
				$this->session->set("add_comment","Bravo, nouveau commentaire ajouté");
				header("Location:../public/index.php?route=post&articleId=".$articleId);

    		}

			$article = $this->articleDAO->getArticle($articleId);
			$comments = $this->commentDAO->getCommentsFromArticle($articleId);

			return $this->view->render("post",[
				"article" => $article,
				"comments" => $comments,
				"post" => $post,
				"errors" => $errors
			]);

		}

	}



}