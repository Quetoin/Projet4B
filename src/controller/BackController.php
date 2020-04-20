<?php

namespace Projet4B\src\controller;


class BackController extends Controller{
	
	public function addPost($post){


		if(isset($post["submit"])){

			$articleDAO = new ArticleDAO();
            $articleDAO->addPost($post);

			header("Location:../public/index.php");

		}
		
		return $this->view->render("add_post",[
			"post" => $post
		]);

	}
}