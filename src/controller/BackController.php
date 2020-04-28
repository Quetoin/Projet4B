<?php

namespace Projet4B\src\controller;

use Projet4B\config\Parameter;


class BackController extends Controller{
	


	private function checkLoggedIn(){

		if(!$this->session->get("user")){

			$this->session->set("need_login","Vous devez vous connecter pour accéder à cette page");
			header("Location:../index.php?route=login");

		}

		return true;
	}


	private function checkAdmin(){

		if(!$this->session->get("role") === "admin"){

			$this->session->set("not_admin","Vous n'avez pas le droite d'accédez à cette page");
			header("Location:../index.php?route=profile");

		}

		return true;
	}


	public function administration(){

		if($this->checkAdmin()){

			$articles = $this->articleDAO->getArticles();
			$comments = $this->commentDAO->getFlagComments();
			$users = $this->userDAO->getUsers();

			return $this->view->render("administration",[
				"articles" => $articles,
				"comments" => $comments,
				"users" => $users
			]);

		}
		
	}


	public function addPost(Parameter $post){

		if($this->checkAdmin()){

			if($post->get("submit")){

				$errors=$this->validation->validate($post,"Article");

				if(!$errors){
					$this->articleDAO->addPost($post,$this->session->get("id"));
					$this->session->set("add_post","Bravo, nouvel article ajouté");

					header("Location:../public/index.php?route=administration");
				}

				return $this->view->render("add_post",[
					"post" =>$post,
					"errors" => $errors
				]);
			}
			
			return $this->view->render("add_post");
		}
	}


	public function editPost(Parameter $post,$articleId){


		if($this->checkAdmin()){

			$article = $this->articleDAO->getArticle($articleId);
			

			if($post->get("submit")){

				$errors=$this->validation->validate($post,"Article");

				if(!$errors){

					$this->articleDAO->editPost($post,$articleId);
					$this->session->set("edit_post","Bravo, article modifié !");

					header("Location:../public/index.php?route=administration");
					
				}

				return $this->view->render("edit_post", [
					"post" => $post,
					"errors" => $errors
				]);
			}

			return $this->view->render("edit_post",[
				"article" => $article
			]);
		}
	}



	public function deletePost($articleId){

		if($this->checkAdmin()){

			$this->articleDAO->deletePost($articleId);
			$this->session->set('delete_post', 'L\' article a bien été supprimé');
			
			header("Location:../public/index.php?route=administration");
		}
	}

	public function deleteComment($commentId){

		if($this->checkAdmin()){

			$this->commentDAO->deleteComment($commentId);

			header("Location:../public/index.php?route=administration");
		}

	}


	public function unflagComment($commentId){

		if($this->checkAdmin()){

			$this->commentDAO->unflagComment($commentId);

			header("Location:../public/index.php?route=administration");
		}

	}


	public function profile(){

		if($this->checkLoggedIn()){
			return $this->view->render("profile");
		}
	}


	public function updatePassword(Parameter $post){

		if($post->get("submit")){

			if($post->get("password") === $post->get("password2")){
				$result = $this->userDAO->updatePassword($post, $this->session->get("user"));
			}else{
				$result = false;
			}
			
			if($result){
				$this->session->set('update_password', 'Le mot de passe a été mis à jour');
            	header('Location: ../public/index.php?route=profile');
			}else{
				$this->session->set('update_password_false', "Le mot de passe n'est pas valide");
            	header('Location: ../public/index.php?route=profile');
			}

			
		}

		return $this->view->render("update_password");
	}


	public function logout(){

		if($this->checkLoggedIn()){
			$this->deleteOrLogout("logout");
		}
	}


	public function deleteAccount(){

		if($this->checkLoggedIn()){
			$this->userDAO->deleteAccount($this->session->get("user"));
			$this->deleteOrLogout("delete");
		}
	}


	public function deleteUser($userId){

		if($this->checkAdmin()){
			$this->userDAO->deleteUser($userId);
			header("Location:../public/index.php?route=administration");
		}
	}


	public function deleteOrLogout($param){

		$this->session->stop();
		$this->session->start();
		if($param == "logout"){
			$this->session->set("logout","A bientôt");
		}else{
			$this->session->set("delete_account","Votre compte a bien été supprimé");
		}
		
		header("Location:../public/index.php");
	}

}