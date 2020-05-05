<?php

namespace Projet4B\src\model;

// Objet Comment avec uniquement des getters et des setters
// Cet objet est créé dans les DAO
class Comment{
	
	private $id;
	private $post_id;
	private $content;
	private $user_id;
	private $date_comment;
	private $flag;
	private $author;

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

	public function getUser_id(){
		return $this->user_id;
	}

	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}

	public function getDate(){
		return $this->date_comment;
	}

	public function setDate($date_comment){
		$this->date_comment = $date_comment;
	}

	public function isFlag(){
		return $this->flag;
	}

	public function setFlag($flag){
		$this->flag = $flag;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

}