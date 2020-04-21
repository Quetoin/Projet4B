<?php

namespace Projet4B\config;

use Projet4B\src\controller\FrontController;
use Projet4B\src\controller\BackController;
use Projet4B\src\controller\ErrorController;

use Exception;

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

        $route = $this->request->getGet()->get("route");

        try{

            if(isset($route)){

                if($route === 'post'){

                    $this->frontController->post($this->request->getGet()->get("articleId"));

                }elseif($route === "addPost"){

                    $this->backController->addPost($this->request->getPost());

                }elseif($route === "home"){

                    $this->frontController->home();
                    
                }elseif($route === "about"){

                    $this->frontController->about();
                    
                }elseif($route === "contactForm"){

                    $this->frontController->contactForm();
                    
                }elseif($route === "listPosts"){

                    $this->frontController->listPosts();
                    
                }elseif($route === "editPost"){
                    
                    $this->backController->editPost($this->request->getPost(),$this->request->getGet()->get("articleId"));
                    
                }elseif($route === "deletePost"){
                    
                    $this->backController->deletePost($this->request->getGet()->get("articleId"));
                    
                }elseif($route === "addComment"){
                    
                    $this->frontController->addComment($this->request->getPost(),$this->request->getGet()->get("articleId"));
                    
                }else{

                    $this->errorController->errorNotFound();

                }
            }else{

                $this->frontController->home();

            }

        }catch (Exception $e){

            $this->errorController->errorServer();

        }
    }
}