<?php

namespace Projet4B\src\DAO;

use Projet4B\src\model\User;
use Projet4B\config\Parameter;

class UserDAO extends DAO{


        private function buildObject($row){

                $user = new User();
                $user->setId($row['Id']);
                $user->setUser($row['user']);
                $user->setRole($row['role_id']);
                

                return $user;
        }


        public function getUsers(){

                $sql = "SELECT * FROM users";
                $result = $this->createQuery($sql);

                $users = [];

                foreach($result as $row){

                        $userId = $row["Id"];
                        $users[$userId] = $this->buildObject($row);

                }

                $result->closeCursor();
                
                return $users;
        }


	public function register(Parameter $post){

                $sql = "INSERT INTO users (user, password, role_id) VALUES (?,?,?)";
                $this->createQuery($sql,[$post->get("user"),password_hash($post->get("password"),PASSWORD_BCRYPT),2]);
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

                $sql = 'SELECT users.Id, users.role_id, users.password, role.name FROM users INNER JOIN role ON role.id = users.role_id WHERE user = ?';

                $data = $this->createQuery($sql,[$post->get("user")]);
                $result = $data->fetch();
                $isPasswordValid = password_verify($post->get("password"), $result["password"]);

                return[
                        "result" => $result,
                        "isPasswordValid" => $isPasswordValid
                ];
                
        }


        public function updatePassword(Parameter $post,$user){

                $sql = "SELECT * FROM users WHERE user = ?";
                $data = $this->createQuery($sql,$user);
                $result = $data->fetch();
                $isPasswordValid = password_verify($post->get("oldPassword"), $result["password"]);

                if($isPasswordValid){
                        $sql = "UPDATE users SET password = ? WHERE user = ?";
                        $this->createQuery($sql,[password_hash($post->get("password"), PASSWORD_BCRYPT),$user]);
                        
                }

                return $isPasswordValid;

        }


        public function deleteAccount($user){

                $sql = "DELETE FROM users WHERE user = ?";
                $this->createQuery($sql,[$user]);

        }


        public function deleteUser($userId){

                $sql = "DELETE FROM users WHERE Id = ?";
                $this->createQuery($sql,[$userId]);

        }

	

}