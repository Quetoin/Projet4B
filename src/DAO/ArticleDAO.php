<?php 

namespace Projet4B\src\DAO;

use App\config\Parameter;
use Projet4B\src\model\Article;

class ArticleDAO extends DAO{


	private function buildObject($row){

		$article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setDate($row['date_post']);

        return $article;
	}
	
	public function getArticles(){

		$sql = "SELECT * FROM posts ORDER BY id DESC";
		$result = $this->createQuery($sql);

		$articles = [];

		foreach($result as $row){
			$articleId = $row["id"];
			$articles[$articleId] = $this->buildObject($row);
		}

		$result->closeCursor();

		return $articles;


	}

	public function getArticle($articleId){
		
		$sql = "SELECT * FROM posts WHERE id = ?";
		$result = $this->createQuery($sql,[$articleId]);

		$article = $result->fetch();
		$result->closeCursor();

		return $this->buildObject($article);
	}

	public function addPost($post){

		$sql = "INSERT INTO posts(date_post, author, title, content) VALUES (CURDATE(),?,?,?)";
		$this->createQuery($sql,[$post->get("author"),$post->get("title"),$post->get("content")]);
	}


	public function editPost($post, $articleId){

		$sql = "UPDATE posts SET title=:title, content=:content, author=:author WHERE id=:articleId";
		$this->createQuery($sql,[
			"title" => $post->get("title"),
			"content" => $post->get("content"),
			"author" => $post->get("author"),
			"articleId" => $articleId
		]);
	}


	public function deletePost($articleId){

		$sql = "DELETE FROM posts WHERE id = ?";
		$this->createQuery($sql,[$articleId]);

		$sql = "DELETE FROM comments WHERE post_id = ?";
		$this->createQuery($sql,[$articleId]);
	}
}