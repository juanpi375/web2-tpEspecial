<?php
require_once("Router.php");
require_once("api/apiCommentsController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("comments", "POST", "ApiCommentsController", "addComment");
// $router->addRoute("comments/:ID", "GET", "ApiCommentsController", "getComments");
$router->addRoute("models/:ID/comments", "GET", "ApiCommentsController", "getComments");

// comments    comments?id_modelo=4    =>  $idModel = $_GET['id_modelo'];
// models/:ID/comments 

// ORDEN   models/:ID/comments?order=asc


// Should add comment let you score one made by yourself??

$router->addRoute("comments/:ID", "DELETE", "ApiCommentsController", "deleteComment");
$router->addRoute("comments/:ID", "UPDATE", "ApiCommentsController", "updateComment");
// Update comment should put a score if the comment hadn't one, change it if it had, 
// and shouldn't allow to put a score if it was your own comment.. or it should???

// $router->addRoute("comments/:ID", "GET", "TareasApiController", "getTarea");

// rutea
$router->route($resource, $method);
