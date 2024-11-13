<?php
require_once "inc/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
if (isset($uri[2]) && $uri[2] === 'user') {
   require_once PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
   $objUserController = new UserController();
   $methodName = $uri[3] ?? '';
   if (method_exists($objUserController, $methodName . 'Action')) {
       $objUserController->{$methodName . 'Action'}();
   } else {
       header("HTTP/1.1 404 Not Found");
   }
} else {
   header("HTTP/1.1 404 Not Found");
}