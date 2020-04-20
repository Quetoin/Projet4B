<?php

namespace Projet4B\src\controller;

use Projet4B\config\Parameter;


class BackController extends Controller{
	
	public function addPost(Parameter $post){

		if($post->get("submit")){

			$this->articleDAO->addPost($post);
			$this->session->set("add_post","Bravo, nouvel article ajouté");

			header("Location:../public/index.php");

		}
		
		return $this->view->render("add_post",[
			"post" => $post
		]);

	}
}