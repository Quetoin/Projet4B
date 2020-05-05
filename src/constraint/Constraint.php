<?php

namespace Projet4B\src\constraint;

// Classe qui définit les 3 contraintes qui vont permettre de valider ou non un contenu avant son envoi en BDD 
class Constraint{


    public function notBlank($name, $value){

        if(empty($value)){

            return '<p>Le champ '.$name.' saisi est vide</p>';

        }
    }


    public function minLength($name, $value, $minSize){

        if(strlen($value) < $minSize){

            return '<p>Le champ '.$name.' doit contenir au moins '.$minSize.' caractères</p>';

        }
    }


    public function maxLength($name, $value, $maxSize){

        if(strlen($value) > $maxSize){

            return '<p>Le champ '.$name.' doit contenir au maximum '.$maxSize.' caractères</p>';
        }
    }
}