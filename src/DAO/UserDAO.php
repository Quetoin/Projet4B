<?php

namespace Projet4B\src\DAO;

use Projet4B\src\model\User;
use Projet4B\config\Parameter;


// Class fille pour gérer toutes les requêtes en lien avec les utilisateurs
class UserDAO extends DAO{

        // Méthode pour créer les objets User
        private function buildObject($row){

                $user = new User();
                $user->setId($row['Id']);
                $user->setUser($row['user']);
                $user->setRole($row['role_id']);
                

                return $user;
        }


        public function getUsers(){ // Récupère la liste des utilisateurs

                $sql = "SELECT * FROM users";
                $result = $this->createQuery($sql);

                $users = [];

                foreach($result as $row){ // Boucle permettant de créer un objet User

                        $userId = $row["Id"];
                        $users[$userId] = $this->buildObject($row);

                }

                $result->closeCursor();
                
                return $users;
        }


	public function register(Parameter $post){ // Inscription avec encryptage du password

                $sql = "INSERT INTO users (user, password, role_id) VALUES (?,?,?)";
                $this->createQuery($sql,[$post->get("user"),password_hash($post->get("password"),PASSWORD_BCRYPT),2]);
        }


        public function checkUser(Parameter $post){ // Va vérifier si le nom d'utilisateur n'est pas déjà pris

                $sql = "SELECT COUNT(user) FROM users WHERE user = ?";
                $result = $this->createQuery($sql,[$post->get("user")]);
                $isUnique = $result->fetchColumn();

                if($isUnique){
                        return "<p>Le pseudo existe déjà </p>";
                }
        }


        public function login(Parameter $post){ // Connexion, vérification du mot de passe.

                $sql = 'SELECT users.Id, users.role_id, users.password, role.name FROM users INNER JOIN role ON role.id = users.role_id WHERE user = ?';

                $data = $this->createQuery($sql,[$post->get("user")]);
                $result = $data->fetch();
                $isPasswordValid = password_verify($post->get("password"), $result["password"]);

                return[
                        "result" => $result,
                        "isPasswordValid" => $isPasswordValid
                ];
                
        }


        public function deleteUser($userId){ // Suppression d'un utilisateur par l'administrateur

                $sql = "DELETE FROM users WHERE Id = ?";
                $this->createQuery($sql,[$userId]);

        }

	

}