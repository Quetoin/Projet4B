<?php

namespace Projet4B\src\constraint;

// Classe qui va permettre d'appeler la bonne validation en fonction de l'objet à valider
// et va renvoyer les erreurs s'il y'en a.
class Validation{

    public function validate($data, $name){

        if($name === 'Article'){

            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;

        }

        elseif($name === 'Comment'){

            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
            return $errors;

        }

        elseif($name === 'User'){

            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;

        }
    }
}