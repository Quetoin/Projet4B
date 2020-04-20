<?php 

namespace Projet4B\src\DAO;

class ArticleDAO extends DAO{


	private function buildObjects($row){

		$article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setCreatedAt($row['createdAt']);

        return $article;
	}
	
	public function getArticles(){

		$sql = "SELECT * FROM posts ORDER BY id DESC";
		$result = $this->createQuery($sql);

		$articles = [];

		foreach($result as $row){
			$articleId = $row["id"];
			$articles[$articleId] = $this->buildObjects($row);
		}

		$result->closeCursor();

		return $articles;


	}

	public function getArticle($articleId){
		
		$sql = "SELECT * FROM posts WHERE id = ?";
		return $this->createQuery($sql,[$articleId]);
	}
}