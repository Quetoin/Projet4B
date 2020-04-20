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


    public function __construct(){

        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();

    }


    public function run(){

        try{

            if(isset($_GET['route'])){

                if($_GET['route'] === 'post'){

                    $this->frontController->post($_GET['articleId']);

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