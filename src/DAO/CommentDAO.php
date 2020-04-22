<?php

namespace Projet4B\src\DAO;

use Projet4B\src\model\Comment;
use Projet4B\config\Parameter;

class CommentDAO extends DAO{


	private function buildObject($row){

		$comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPostId($row['post_id']);
        $comment->setContent($row['content']);
        $comment->setAuthor($row['author']);
        $comment->setDate($row['comment_date']);
        $comment->setFlag($row['flag']);

        return $comment;
	}
	
	public function getCommentsFromArticle($articleId){
		$sql="SELECT * FROM comments WHERE post_id = ?";
		$result = $this->createQuery($sql,[$articleId]);

		$comments = [];

		foreach($result as $row){
			$commentId = $row["id"];
			$comments[$commentId] = $this->buildObject($row);
		}

		$result->closeCursor();

		return $comments;
	}

	public function addComment(Parameter $post, $articleId){

		$sql = "INSERT INTO comments(date_comment, author, content, post_id, flag) VALUES (CURDATE(),?,?,?,?)";
		$this->createQuery($sql,[$post->get("author"),$post->get("content"),$articleId],0);

	}

	public function flagComment($commentId){

		$sql = "UPDATE comments SET flag =? WHERE id = ?";
		$this->createQuery($sql,[1,$commentId]);

	}

	public function deleteComment($commentId){

		$sql = "DELETE FROM comments WHERE id = ?";
		$this->createQuery($sql,[$commentId]);
	}
}