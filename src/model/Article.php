<?php

namespace Projet4B\src\model;

// Objet Article avec uniquement des getters et des setters
// Cet objet est créé dans les DAO
class Article{
	
	private $id;
	private $title;
	private $content;
	private $user_id;
	private $date_post;
	private $nbComments;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
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
		return $this->date_post;
	}

	public function setDate($date_post){
		$this->date_post = $date_post;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getNbComments(){
		return $this->nbComments;
	}

	public function setNbComments($nbComments){
		$this->nbComments = $nbComments;
	}

}