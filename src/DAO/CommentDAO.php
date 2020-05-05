<?php

namespace Projet4B\src\DAO;

use Projet4B\src\model\Comment;
use Projet4B\config\Parameter;


// Class fille pour gérer toutes les requêtes en lien avec les commentaires

class CommentDAO extends DAO{

	// Méthode pour créer les objets Commentaires
	private function buildObject($row){

		$comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPostId($row['post_id']);
        $comment->setContent($row['content']);
        $comment->setUser_id($row['user_id']);
        $comment->setDate($row['date_comment']);
        $comment->setFlag($row['flag']);

        return $comment;
	}
	

	// Méthode pour récupérer les commentaires associés à un article
	public function getCommentsFromArticle($articleId){

		$sql="SELECT * FROM comments WHERE post_id = ?";
		$result = $this->createQuery($sql,[$articleId]);

		$comments = [];

		foreach($result as $row){ // Boucle permettant de créer un objet Commentaire 
			$commentId = $row["id"];
			$comments[$commentId] = $this->buildObject($row);

			// requête pour set l'auteur du commentaire en fonction de son ID
			$sql = "SELECT user FROM users WHERE Id = ? ";
			$result = $this->createQuery($sql,[$comments[$commentId]->getUser_id()]);
			$user_name = $result->fetch();
			
			$comments[$commentId]->setAuthor($user_name["user"]);
		}

		$result->closeCursor();

		return $comments;
	}


	public function addComment(Parameter $post, $articleId,$userId){ // Ajout d'un commentaire dans la BDD

		$sql = "INSERT INTO comments(date_comment, user_id, content, post_id, flag) VALUES (NOW(),?,?,?,?)";
		$this->createQuery($sql,[$userId,$post->get("content"),$articleId,0]);

	}


	public function flagComment($commentId){ // Signalement de commentaire

		$sql = "UPDATE comments SET flag =? WHERE id = ?";
		$this->createQuery($sql,[1,$commentId]);

	}


	public function unflagComment($commentId){ // Dé-signaler un commentaire

		$sql = "UPDATE comments SET flag =? WHERE id = ?";
		$this->createQuery($sql,[0,$commentId]);

	}


	public function deleteComment($commentId){ // Suppression d'un commentaire

		$sql = "DELETE FROM comments WHERE id = ?";
		$this->createQuery($sql,[$commentId]);
	}


	public function getFlagComments(){ // Récupère les commentaires signalés pour administration

		$sql = "SELECT * FROM comments WHERE flag = ? ORDER BY date_comment DESC";
		$result = $this->createQuery($sql,[1]);

		$comments = [];

		foreach($result as $row){ // Création des objets Commentaires
			$commentId = $row["id"];
			$comments[$commentId] = $this->buildObject($row);

			$sql = "SELECT user FROM users WHERE Id = ? ";
			$result = $this->createQuery($sql,[$comments[$commentId]->getUser_id()]);
			$user_name = $result->fetch();
			
			$comments[$commentId]->setAuthor($user_name["user"]);
		}

		$result->closeCursor();

		return $comments;

	}
}