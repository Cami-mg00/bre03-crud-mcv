<?php

// Inclure l'autoload
require_once 'config/autoload.php';

use Config\Router;

// Instancier le routeur
$router = new Router();

// Gérer la requête
$router->handleRequest($_GET);

?>