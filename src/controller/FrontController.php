<?php

namespace Projet4B\src\controller;

use Projet4B\config\Parameter;


class FrontController extends Controller{


	public function home(){ // Renvoie à la vue "home"

		return $this->view->render("home");
	}


	public function about(){ // Renvoie à la vue "biographie"

		return $this->view->render("biographie");
	}


	public function contactForm(){ // Renvoie à la vue "contact"

		return $this->view->render("contact");
	}


	public function listPosts(){

		$articles = $this->articleDAO->getArticles(); // Récupère la liste des articles

		// Renvoie à la vue de la liste des articles, avec les objets articles en paramètre
		return $this->view->render("listPosts",[
			"articles" => $articles
		]);

	}


	public function post($articleId){

    	$article = $this->articleDAO->getArticle($articleId); // Récupère un article
        $comments = $this->commentDAO->getCommentsFromArticle($articleId); // Récupère les commentaires associés

        // Renvoie à la vue de l'article, avec les objets articles et commentaires en paramètre
        return $this->view->render("post",[
        	"article" => $article,
        	"comments" => $comments
        ]);

	}


	public function addComment(Parameter $post,$articleId){ // Méthode pour rajouter un commentaire

		                    

    	if($post->get("submit")){ // Si le Paramètre est bien de type post/"submit"

    		// On stocke dans une variable les éventuelles erreurs en appellant la méthode validate de l'objet Validation
			// La méthode va tester si l'article répond aux critères
    		$errors = $this->validation->validate($post,"Comment");

    		if(!$errors){ // Si pas d'erreurs, on l'ajoute à la BDD

    			if($this->session->get("id")){

    				$this->commentDAO->addComment($post,$articleId,$this->session->get("id"));
					$this->session->set("add_comment","Bravo, nouveau commentaire ajouté");
					header("Location:../public/index.php?route=post&articleId=".$articleId); // On renvoi à la vue administration

    			}else{

    				$this->session->set("add_comment_connecte","Vous devez être connecté pour pouvoir poster un commentaire");
					header("Location:../public/index.php?route=home"); // On renvoi à la vue administration
    			}	

    		}

    		// Si erreurs, on renvoi à la vue de l'article en affichant les erreurs.
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


	public function flagComment($commentId,$articleId){ // Signalement de commentaire

			$this->commentDAO->flagComment($commentId);

			header("Location:../public/index.php?route=post&articleId=".$articleId); // On renvoie à la vue de l'article

	}


	public function register(Parameter $post){ // Inscription

		
		if($post->get("submit")){ // Si le Paramètre est bien de type post/"submit"

			// On stocke dans une variable les éventuelles erreurs en appellant la méthode validate de l'objet Validation
			// La méthode va tester si les champs remplis par l'utilisateur répond aux critères
			$errors = $this->validation->validate($post,"User");

			if($this->userDAO->checkUser($post)){ // Si le nom d'utilisateur est déjà pris
				$errors["user"] = $this->userDAO->checkUser($post);
			}

			if(!$errors){

				if($post->get("password") === $post->get("password2")){ // On va tester les deux mots de passe rentrés.
					$this->userDAO->register($post);
					$this->session->set("registration","Votre inscription est validée");
					header("Location:../public/index.php?route=home"); // On renvoi à la page d'accueil
				}
			}

			// Si erreurs, on renvoi à la vue register en affichant les erreurs.
			return $this->view->render("register",[

				"post" => $post,
				"errors" => $errors
			]);

			
		}

		return $this->view->render("register");


	}


	public function login(Parameter $post){

		if($post->get("submit")){// Si le Paramètre est bien de type post/"submit"

			$result = $this->userDAO->login($post);
			
			if($result && $result["isPasswordValid"]){ // Si la connexion à la BDD est ok ET si le mot de passe est valide, on va set les variables de session.
				
				$this->session->set("login","Content de vous revoir");
				$this->session->set("id",$result["result"]["Id"]);
				$this->session->set("user",$post->get("user"));
				$this->session->set("role",$result["result"]["name"]);


				if($this->session->get("role") === "admin"){ // Si admin, on renvoie à la vue administration, sinon page d'accueil
					header("Location:../public/index.php?route=administration");
				}else{
					header("Location:../public/index.php?route=home");
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