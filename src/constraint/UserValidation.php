<?php

namespace Projet4B\src\constraint;

use Projet4B\config\Parameter;

class UserValidation extends Validation{

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


        if ($name === 'user'){

            $error = $this->checkUser($name, $value);
            $this->addError($name, $error);
        }

        elseif($name === 'password'){

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

        if($this->constraint->notBlank($name, $value)){

            return $this->constraint->notBlank('user', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){

            return $this->constraint->minLength('user', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 50)){
            
            return $this->constraint->maxLength('user', $value, 50);
        }
    }



    private function checkPassword($name, $value){

        if($this->constraint->notBlank($name, $value)){

            return $this->constraint->notBlank('password', $value);
        }

        if($this->constraint->minLength($name, $value, 2)){

            return $this->constraint->minLength('password', $value, 2);
        }

        if($this->constraint->maxLength($name, $value, 20)){
            
            return $this->constraint->maxLength('password', $value, 20);
        }

        
    }
}