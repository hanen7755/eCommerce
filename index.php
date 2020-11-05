<?php
session_start();
require_once('./app/Router.php');
//appelle le router-> permetd'afficher en sécurité
$router = new Router();
//getPathh-> methodede routage
$router->getPath();