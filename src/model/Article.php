<?php

namespace \Projet4B\src\model;


class Article{
	
	private $id;
	private $title;
	private $content;
	private $author;
	private $date_post;


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

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getDate(){
		return $this->date_post;
	}

	public function setDate($date_post){
		$this->date_post = $date_post;
	}

}