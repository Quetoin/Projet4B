<?php

namespace Projet4B\src\constraint;

use Projet4B\config\Parameter;


// Classe qui va vérifier tous les paramètres lors de la création d'un utilisateur
class UserValidation extends Validation{

    private $errors = [];
    private $constraint;


    public function __construct(){

        $this->constraint = new Constraint();

    }



    public function check(Parameter $post){

        foreach ($post->all() as $key => $value){ // Récupère les clés et leurs valeurs de la requête $_POST

            $this->checkField($key, $value); 

        }

        return $this->errors;
    }



    private function checkField($name, $value){


        if ($name === 'user'){ // Pour la case user, on appelle la méthode qui va vérifier les contraintes

            $error = $this->checkUser($name, $value);
            $this->addError($name, $error);
        }

        elseif($name === 'password'){ // Pour la case password, on appelle la méthode qui va vérifier les contraintes

            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
    }



    private function addError($name, $error){

        if($error){

            $this->errors += [
                $name => $error
            ];

        }
    }



    private function checkUser($name, $value){

        if($this->constraint->notBlank($name, $value)){ // Vérifie que le champ n'est pas vide

            return $this->constraint->notBlank('user', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){ // Vérifie que le champ a une longueur d'au moins 2 caractères

            return $this->constraint->minLength('user', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 50)){ // Vérifie que le champ a une longueur de maximum 50 caractères
            
            return $this->constraint->maxLength('user', $value, 50);
        }
    }



    private function checkPassword($name, $value){

        if($this->constraint->notBlank($name, $value)){ // Vérifie que le champ n'est pas vide

            return $this->constraint->notBlank('password', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){ // Vérifie que le champ a une longueur d'au moins 2 caractères

            return $this->constraint->minLength('password', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 20)){ // Vérifie que le champ a une longueur de maximum 20 caractères
            
            return $this->constraint->maxLength('password', $value, 20);
        }

        
    }
}