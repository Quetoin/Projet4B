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

}