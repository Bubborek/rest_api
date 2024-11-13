<?php
class UserController extends BaseController
{
   public function listAction()
   {
       $requestMethod = $_SERVER["REQUEST_METHOD"];
       if (strtoupper($requestMethod) == "GET") {
           try {
               $userModel = new UserModel();
               $users = $userModel->getUsers(10); // Limit to 10 users
               $this->sendOutput(
                   json_encode($users),
                   ["Content-Type: application/json", "HTTP/1.1 200 OK"]
               );
           } catch (Exception $e) {
               $this->sendOutput(
                   json_encode(["error" => $e->getMessage()]),
                   ["Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"]
               );
           }
       } else {
           $this->sendOutput(
               json_encode(["error" => "Method not allowed"]),
               ["Content-Type: application/json", "HTTP/1.1 405 Method Not Allowed"]
           );
       }
   }
}