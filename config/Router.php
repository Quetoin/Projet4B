<?php

namespace Projet4B\config;

use Projet4B\src\controller\FrontController;
use Projet4B\src\controller\BackController;
use Projet4B\src\controller\ErrorController;

use Exception;


// Router qui permet de rediriger en fonction des requêtes
class Router{

    private $frontController;
    private $errorController;
    private $backController;
    private $request;


    public function __construct(){

        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }


    public function run(){

        $route = $this->request->getGet()->get("route"); // Récupère la route en appellant la Classe Requête, sa méthode getGet et la méthode de Parameter get.

        try{ // Si pas d'erreurs

            if(isset($route)){

                // Toutes les méthodes du FRONT CONTROLLER

                if($route === 'post'){

                    $this->frontController->post($this->request->getGet()->get("articleId"));

                }elseif($route === "home"){

                    $this->frontController->home();
                    
                }elseif($route === "about"){

                    $this->frontController->about();
                    
                }elseif($route === "contactForm"){

                    $this->frontController->contactForm();
                    
                }elseif($route === "listPosts"){

                    $this->frontController->listPosts();
                    
                }


                // COMMENTAIRES

                elseif($route === "addComment"){

                    $this->frontController->addComment($this->request->getPost(),$this->request->getGet()->get("articleId"));
                    
                }elseif($route === "flagComment"){
                    
                    $this->frontController->flagComment($this->request->getGet()->get("commentId"),$this->request->getGet()->get("articleId"));
                    
                }


                // UTILISATEURS

                elseif($route === "register"){
                    
                    $this->frontController->register($this->request->getPost());
                    
                }elseif($route === "login"){
                    
                    $this->frontController->login($this->request->getPost());
                    
                }



                // Toutes les méthodes du BACK CONTROLLER


                //Comments
                elseif($route === "unflagComment"){
                    
                    $this->backController->unflagComment($this->request->getGet()->get("commentId"));
                    
                }elseif($route === "deleteComment"){
                    
                    $this->backController->deleteComment($this->request->getGet()->get("commentId"));
                    
                }


                //Posts
                elseif($route === "editPost"){
                    
                    $this->backController->editPost($this->request->getPost(),$this->request->getGet()->get("articleId"));
                    
                }elseif($route === "deletePost"){
                    
                    $this->backController->deletePost($this->request->getGet()->get("articleId"));
                    
                }elseif($route === "addPost"){

                    $this->backController->addPost($this->request->getPost());

                }


                //Utilisateurs et administration
                elseif($route === "logout"){
                    
                    $this->backController->logout();
                    
                }elseif($route === "deleteUser"){
                    
                    $this->backController->deleteUser($this->request->getGet()->get("userId"));
                    
                }elseif($route === "administration"){
                    
                    $this->backController->administration();
                    
                }else{

                    $this->errorController->errorNotFound();

                }

            }else{ // Si la route n'est pas défini, on revient à la page d'accueil

                $this->frontController->home();

            }

        }catch (Exception $e){ // Si erreur lors de la requête

            $this->errorController->errorServer();

        }
    }
}