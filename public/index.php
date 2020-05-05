<?php

require '../config/dev.php'; //Récupère les variables de connexion à la BDD
require '../vendor/autoload.php'; // Lance composer

session_start(); // Lance la session

$router = new \Projet4B\config\Router();
$router->run(); // Démarre le routeur