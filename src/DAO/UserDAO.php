<?php

namespace Projet4B\src\DAO;

use Projet4B\src\model\User;
use Projet4B\config\Parameter;

class UserDAO extends DAO{


	public function register(Parameter $post){

                $sql = "INSERT INTO users (user, password, role) VALUES (?,?,?)";
                $this->createQuery($sql,[$post->get("user"),password_hash($post->get("password"),PASSWORD_BCRYPT),"visitor"]);
        }


        public function checkUser(Parameter $post){

                $sql = "SELECT COUNT(user) FROM users WHERE user = ?";
                $result = $this->createQuery($sql,[$post->get("user")]);
                $isUnique = $result->fetchColumn();

                if($isUnique){
                        return "<p>Le pseudo existe déjà </p>";
                }
        }


        public function login(Parameter $post){

                $sql = "SELECT id, password FROM users WHERE user = ?";
                $data = $this->createQuery($sql,[$post->get("user")]);
                $result = $data->fetch();
                $isPasswordValid = password_verify($post->get("password"), $result["password"]);

                return[
                        "result" => $result,
                        "isPasswordValid" => $isPasswordValid
                ];
                
        }


        public function updatePassword(Parameter $post,$user){

                $sql = "UPDATE users SET password = ? WHERE user = ?";
                $this->createQuery($sql,[password_hash($post->get("password"), PASSWORD_BCRYPT),$user]);

        }
	

}