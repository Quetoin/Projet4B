<?php

namespace Projet4B\src\controller;

use Projet4B\src\DAO\ArticleDAO;
use Projet4B\src\DAO\CommentDAO;

use Projet4B\src\model\View;

class BackController{

	public function __construct(){

		$this->view = new View();

	}
	
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