<?php

namespace Projet4B\src\constraint;

use Projet4B\config\Parameter;


// Classe qui va vérifier tous les paramètres lors de la création d'un commentaire
class CommentValidation extends Validation{

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


        if ($name === 'content'){ // Pour la case contenu, on appelle la méthode qui va vérifier les contraintes

            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }

        elseif($name === 'author'){ // Pour la case auteur, on appelle la méthode qui va vérifier les contraintes

            $error = $this->checkAuthor($name, $value);
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



    private function checkContent($name, $value){

        if($this->constraint->notBlank($name, $value)){ // Vérifie que le champ n'est pas vide

            return $this->constraint->notBlank('contenu', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){ // Vérifie que le champ a une longueur d'au moins 2 caractères

            return $this->constraint->minLength('contenu', $value, 2);
        }
        
        if($this->constraint->maxLength($name, $value, 255)){ // Vérifie que le champ a une longueur de maximum 255 caractères
            
            return $this->constraint->maxLength('auteur', $value, 255);
        }
    }



    private function checkAuthor($name, $value){

        if($this->constraint->notBlank($name, $value)){ // Vérifie que le champ n'est pas vide

            return $this->constraint->notBlank('auteur', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){ // Vérifie que le champ a une longueur d'au moins 2 caractères

            return $this->constraint->minLength('auteur', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 50)){ // Vérifie que le champ a une longueur de maximum 20 caractères
            
            return $this->constraint->maxLength('auteur', $value, 50);
        }
    }
}