<?php

class Comment extends Database{
	
	public function getCommentsFromArticle($articleId){
		$sql="SELECT * FROM comments WHERE post_id = ?";
		return $this->createQuery($sql,[$articleId]);
	}
}