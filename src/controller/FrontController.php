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


	public function flagComment($commentId,$articleId){

			$this->commentDAO->flagComment($commentId);

			header("Location:../public/index.php?route=post&articleId=".$articleId);

	}


	public function register(Parameter $post){

		
		if($post->get("submit")){

			$errors = $this->validation->validate($post,"User");

			if($this->userDAO->checkUser($post)){
				$errors["user"] = $this->userDAO->checkUser($post);
			}

			if(!$errors){

				$this->userDAO->register($post);
				$this->session->set("registration","Votre inscription est validée");
				header("Location:../public/index.php");
			}

			return $this->view->render("register",[

				"post" => $post,
				"errors" => $errors
			]);

			
		}

		return $this->view->render("register");


	}


	public function login(Parameter $post){

		if($post->get("submit")){

			$result = $this->userDAO->login($post);

			if($result && $result["isPasswordValid"]){

				$this->session->set("login","Content de vous revoir");
				$this->session->set("id",$result["result"]["id"]);
				$this->session->set("user",$post->get("user"));
				$this->session->set("role",$result["result"]["name"]);


				if($this->session->get("role") === "admin"){
					header("Location:../public/index.php?route=administration");
				}else{
					header("Location:../public/index.php");
				}

			}else{
				$this->session->set("error_login","Le pseudo ou le mot de passe sont incorrects");

				return $this->view->render("login",[
					"post" => $post
				]);
			}

		}

		return $this->view->render("login");
		
	}

}