<?php

namespace Projet4B\config;


// Class permettant de récupérer les paramètres GET et POST

class Parameter{
	
	private $parameter;

	public function __construct($parameter){

		$this->parameter = $parameter;

	}


	public function get($name){

		if(isset($this->parameter[$name])){

			return $this->parameter[$name];

		}
	}


	public function set($name,$value){

		$this->parameter[$name] = $value;
	}


	public function all(){

        return $this->parameter;

    }
}