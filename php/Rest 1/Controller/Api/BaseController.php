<?php
class BaseController
{
   public function __call($name, $arguments)
   {
       header("HTTP/1.1 404 Not Found");
       echo json_encode(["error" => "Method not found"]);
   }
   protected function getUriSegments()
   {
       return explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
   }
   protected function getQueryStringParams()
   {
       return parse_str($_SERVER['QUERY_STRING'], $query);
   }
   protected function sendOutput($data, $httpHeaders = [])
   {
       foreach ($httpHeaders as $header) {
           header($header);
       }
       echo $data;
   }
}