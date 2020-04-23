<?php 

namespace Projet4B\src\DAO;

use Projet4B\config\Parameter;
use Projet4B\src\model\Article;

class ArticleDAO extends DAO{


	private function buildObject($row){

		$article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setUser_id($row['user_id']);
        $article->setDate($row['date_post']);
        

        return $article;
	}
	
	public function getArticles(){

		$sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC';
		$result = $this->createQuery($sql);

		$articles = [];

		foreach($result as $row){
			$articleId = $row["id"];
			$articles[$articleId] = $this->buildObject($row);

			$sql = "SELECT user FROM users WHERE Id = ? ";
			$result = $this->createQuery($sql,[$articles[$articleId]->getUser_id()]);
			$user_name = $result->fetch();
			
			$articles[$articleId]->setAuthor($user_name["user"]);
		}

		$result->closeCursor();
		
		
		return $articles;
		

	}


	public function getArticle($articleId){
		
		$sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = ?';;
		$result = $this->createQuery($sql,[$articleId]);


		$article = $result->fetch();
		$result->closeCursor();

		$article = $this->buildObject($article);

		$sql = "SELECT user FROM users WHERE Id = ? ";
		$result = $this->createQuery($sql,[$article->getUser_id()]);
		$user_name = $result->fetch();

		$article->setAuthor($user_name["user"]);

		return $article;
	}

	public function addPost(Parameter $post,$userId){

		$sql = "INSERT INTO posts(date_post, title, content,user_id) VALUES (CURDATE(),?,?,?)";
		$this->createQuery($sql,[$post->get("title"),$post->get("content"),$userId]);
	}


	public function editPost($post, $articleId){

		$sql = "UPDATE posts SET title=:title, content=:content WHERE id=:articleId";
		$this->createQuery($sql,[
			"title" => $post->get("title"),
			"content" => $post->get("content"),
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