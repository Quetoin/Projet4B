<?php

namespace Projet4B\src\model;


class Comment{
	
	private $id;
	private $post_id;
	private $content;
	private $author;
	private $date_comment;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getPostId(){
		return $this->postId;
	}

	public function setPostId($post_id){
		$this->post_id = $post_id;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getDate(){
		return $this->date_comment;
	}

	public function setDate($date_comment){
		$this->date_comment = $date_comment;
	}

}