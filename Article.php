<?php 

class Article extends Database{
	
	public function getArticles(){

		$sql = "SELECT * FROM posts ORDER BY id DESC";
		return $this->createQuery($sql);

	}

	public function getArticle($articleId){
		
		$sql = "SELECT * FROM posts WHERE id = ?";
		return $this->createQuery($sql,[$articleId]);
	}
}