<?php

namespace Projet4B\src\DAO;

use Projet4B\src\model\User;
use Projet4B\config\Parameter;

class UserDAO extends DAO{

	public function register(Parameter $post){

                $sql = "INSERT INTO users (user, password, role) VALUES (?,?,?)";
                $this->createQuery($sql,[$post->get("user"),password_hash($post->get("password"),PASSWORD_BCRYPT),"visitor"]);
        }
	

}