<?php

namespace Projet4B\src\constraint;

use Projet4B\config\Parameter;

class CommentValidation extends Validation{

    private $errors = [];
    private $constraint;


    public function __construct(){

        $this->constraint = new Constraint();

    }



    public function check(Parameter $post){

        foreach ($post->all() as $key => $value){

            $this->checkField($key, $value);

        }

        return $this->errors;
    }



    private function checkField($name, $value){


        if ($name === 'content'){

            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }

        elseif($name === 'author'){

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

        if($this->constraint->notBlank($name, $value)){

            return $this->constraint->notBlank('contenu', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){

            return $this->constraint->minLength('contenu', $value, 2);
        }
    }



    private function checkAuthor($name, $value){

        if($this->constraint->notBlank($name, $value)){

            return $this->constraint->notBlank('auteur', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){

            return $this->constraint->minLength('auteur', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 255)){
            
            return $this->constraint->maxLength('auteur', $value, 255);
        }
    }
}