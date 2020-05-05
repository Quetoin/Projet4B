<?php 

namespace Projet4B\src\DAO;

use Projet4B\config\Parameter;
use Projet4B\src\model\Article;


// Class fille pour gérer toutes les requêtes en lien avec les articles
class ArticleDAO extends DAO{

	// Méthode pour créer les objets Article
	private function buildObject($row){

		$article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setUser_id($row['user_id']);
        $article->setDate($row['date_post']);
        
        return $article;
	}
	

	public function getArticles(){ // Récupère la liste des articles

		$sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC';
		$result = $this->createQuery($sql);

		$articles = [];

		foreach($result as $row){ // Boucle permettant de créer un objet Article pour chaque article
			$articleId = $row["id"];
			$articles[$articleId] = $this->buildObject($row);

			// requête pour set l'auteur de l'article en fonction de son ID
			$sql = "SELECT user FROM users WHERE Id = ? ";
			$result = $this->createQuery($sql,[$articles[$articleId]->getUser_id()]);
			$user_name = $result->fetch();

			// requête pour set le nombre de commentaires de l'article
			$sql = "SELECT COUNT(id) FROM comments WHERE post_id = ? ";
			$result = $this->createQuery($sql,[$articles[$articleId]->getId()]);
			$nbComments = $result->fetch();
			
			$articles[$articleId]->setAuthor($user_name["user"]);
			$articles[$articleId]->setNbComments($nbComments[0]);
		}

		$result->closeCursor();
		
		
		return $articles;
		

	}


	public function getArticle($articleId){ // Récupère un article
		
		$sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = ?';;
		$result = $this->createQuery($sql,[$articleId]);
		$article = $result->fetch();
		$result->closeCursor();

		$article = $this->buildObject($article); // Création de l'objet Article, qu'on va stocker dans une variable

		// requête pour set l'auteur de l'article en fonction de son ID
		$sql = "SELECT user FROM users WHERE Id = ? ";
		$result = $this->createQuery($sql,[$article->getUser_id()]);
		$user_name = $result->fetch();

		$article->setAuthor($user_name["user"]);

		return $article;
	}

	public function addPost(Parameter $post,$userId){ // Ajout d'un article dans la BDD

		$sql = "INSERT INTO posts(date_post, title, content,user_id) VALUES (NOW(),?,?,?)";
		$this->createQuery($sql,[htmlspecialchars($post->get("title")),htmlspecialchars($post->get("content")),$userId]);
	}


	public function editPost($post, $articleId){ // Modification d'un article

		$sql = "UPDATE posts SET content=:content WHERE id=:articleId";
		$this->createQuery($sql,[
			"content" => htmlspecialchars($post->get("content")),
			"articleId" => $articleId
		]);
	}


	public function deletePost($articleId){ // Suppression d'un article et de ses commentaires associés

		$sql = "DELETE FROM posts WHERE id = ?";
		$this->createQuery($sql,[$articleId]);

		$sql = "DELETE FROM comments WHERE post_id = ?";
		$this->createQuery($sql,[$articleId]);
	}
}