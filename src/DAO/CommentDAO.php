<?php

namespace Projet4B\src\DAO;

class CommentDAO extends DAO{
	
	public function getCommentsFromArticle($articleId){
		$sql="SELECT * FROM comments WHERE post_id = ?";
		return $this->createQuery($sql,[$articleId]);
	}
}