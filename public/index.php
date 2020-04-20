<?php

require '../config/dev.php';
require '../vendor/autoload.php';

session_start();

$router = new \Projet4B\config\Router();
$router->run();