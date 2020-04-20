<?php 

namespace Projet4B\config;

class Request{

	private $get;
	private $post;
	private $session;

	public function __construct(){
		$this->get = new Parameter($_GET);
		$this->post = new Parameter($_POST);
		$this->session = $_SESSION;
	}

	public function getGet(){
		return $this->get;
	}


	public function getPost(){
		return $this->post;
	}


	public function getSession(){
		return $this->session;
	}

}