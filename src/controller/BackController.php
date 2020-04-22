<?php

namespace Projet4B\src\controller;

use Projet4B\config\Parameter;


class BackController extends Controller{
	
	public function addPost(Parameter $post){

		if($post->get("submit")){

			$errors=$this->validation->validate($post,"Article");

			if(!$errors){
				$this->articleDAO->addPost($post);
				$this->session->set("add_post","Bravo, nouvel article ajouté");

				header("Location:../public/index.php");
			}

			return $this->view->render("add_post",[
				"post" =>$post,
				"errors" => $errors
			]);
		}
		
		return $this->view->render("add_post");
	}


	public function editPost(Parameter $post,$articleId){

		$article = $this->articleDAO->getArticle($articleId);

		if($post->get("submit")){

			$errors=$this->validation->validate($post,"Article");

			if(!$errors){

				$this->articleDAO->editPost($post,$articleId);
				$this->session->set("edit_post","Bravo, article modifié !");

				header("Location:../public/index.php");
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



	public function deletePost($articleId){

			$this->articleDAO->deletePost($articleId);
			$this->session->set('delete_post', 'L\' article a bien été supprimé');
			
			header("Location:../public/index.php");
	}

	public function deleteComment($commentId,$articleId){

			$this->commentDAO->deleteComment($commentId);

			header("Location:../public/index.php?route=post&articleId=".$articleId);

	}

	public function profile(){

		if($this->session->get("user")){
			return $this->view->render("profile");
		}
	}


	public function logout(){

		$this->deleteOrLogout("logout");
		

	}

	public function deleteAccount(){
		$this->userDAO->deleteAccount($this->session->get("user"));
		$this->deleteOrLogout("delete");
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


	public function updatePassword(Parameter $post){

		if($post->get("submit")){
			$this->userDAO->updatePassword($post, $this->session->get("user"));
			$this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
		}

		return $this->view->render("update_password");
	}


	

}