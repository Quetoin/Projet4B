<?php 

namespace Projet4B\config;


// Classe permettant de gérer les requêtes des variables superglobales
// GET, POST et SESSION

class Request{

	private $get;
	private $post;
	private $session;

	public function __construct(){
		$this->get = new Parameter($_GET);
		$this->post = new Parameter($_POST);
		$this->session = new Session($_SESSION);
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