<?php

namespace Projet4B\src\controller;

use Projet4B\config\Parameter;


class BackController extends Controller{
	


	private function checkLoggedIn(){

		// On vérifie qu'il y'a bien un utilisateur de connecté, sinon on renvoie vers la page de connexion
		if(!$this->session->get("user")){ 

			$this->session->set("need_login","Vous devez vous connecter pour accéder à cette page");
			header("Location:../index.php?route=login");

		}

		return true;
	}


	private function checkAdmin(){

		// On vérifie que le rôle de l'utilisateur est bien "admin", sinon, on renvoi à la page d'accueil
		if(!$this->session->get("role") === "admin"){

			$this->session->set("not_admin","Vous n'avez pas le droite d'accédez à cette page");
			header("Location:../index.php?route=home");

		}

		return true;
	}


	public function administration(){


		if($this->checkAdmin()){

			// Récupère les Objets Articles, Commentaires signalés et Utilisateurs via les DAO
			$articles = $this->articleDAO->getArticles();
			$comments = $this->commentDAO->getFlagComments();
			$users = $this->userDAO->getUsers();

			// renvoi à la page administration avec des tableaux d'objets
			return $this->view->render("administration",[
				"articles" => $articles,
				"comments" => $comments,
				"users" => $users
			]);

		}
		
	}


	public function addPost(Parameter $post){

		if($this->checkAdmin()){

			if($post->get("submit")){ // Si le Paramètre est bien de type post/"submit"

				// On stocke dans une variable les éventuelles erreurs en appellant la méthode validate de l'objet Validation
				// La méthode va tester si l'article répond aux critères
				$errors=$this->validation->validate($post,"Article");

				if(!$errors){ // Si pas d'erreurs, on l'ajoute à la BDD
				
					$this->articleDAO->addPost($post,$this->session->get("id"));
					$this->session->set("add_post","Bravo, nouvel article ajouté");

					header("Location:../public/index.php?route=administration"); // On renvoi à la vue administration
				}

				// Si erreurs, on renvoi à la vue add_post en affichant les erreurs.
				return $this->view->render("add_post",[
					"post" =>$post,
					"errors" => $errors
				]);
			}
			
			// Si on appelait juste la méthode pour aller vers la vue add_post, on l'affiche
			return $this->view->render("add_post");
		}
	}



	public function editPost(Parameter $post,$articleId){


		if($this->checkAdmin()){

			$article = $this->articleDAO->getArticle($articleId); // Stocke l'article dans une variable
			

			if($post->get("submit")){ // Si le Paramètre est bien de type post/"submit"

				// On stocke dans une variable les éventuelles erreurs en appellant la méthode validate de l'objet Validation
				// La méthode va tester si l'article répond aux critères
				$errors=$this->validation->validate($post,"Article");

				if(!$errors){

					$this->articleDAO->editPost($post,$articleId);
					$this->session->set("edit_post","Bravo, article modifié !");

					header("Location:../public/index.php?route=administration"); // On renvoi à la vue administration
					
				}

				// Si erreurs, on renvoi à la vue add_post en affichant les erreurs.
				return $this->view->render("edit_post", [
					"post" => $post,
					"errors" => $errors
				]);
			}

			// Si on appelait juste la méthode pour aller vers la vue edit_post, on l'affiche
			return $this->view->render("edit_post",[
				"article" => $article
			]);
		}
	}



	public function deletePost($articleId){

		if($this->checkAdmin()){

			$this->articleDAO->deletePost($articleId);
			$this->session->set('delete_post', 'L\' article a bien été supprimé');
			
			header("Location:../public/index.php?route=administration"); // On renvoi à la vue administration
		}
	}

	public function deleteComment($commentId){

		if($this->checkAdmin()){

			$this->commentDAO->deleteComment($commentId);

			header("Location:../public/index.php?route=administration"); // On renvoi à la vue administration
		}

	}


	public function unflagComment($commentId){ // Dé-signalé un commentaire

		if($this->checkAdmin()){

			$this->commentDAO->unflagComment($commentId);

			header("Location:../public/index.php?route=administration"); // On renvoi à la vue administration
		}

	}


	public function logout(){

		if($this->checkLoggedIn()){ // S'il y'a bien un user de connecté
			$this->session->stop(); // On stoppe la session pour déconnecté l'utilisateur
			$this->session->start(); // On en recommence une nouvelle, pour les annonces
			$this->session->set("logout","A bientôt");
		}
	}


	public function deleteUser($userId){

		if($this->checkAdmin()){
			$this->userDAO->deleteUser($userId);
			header("Location:../public/index.php?route=administration");
		}
	}

}