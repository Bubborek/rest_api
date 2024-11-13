<?php
header("Acces-Control-Allow-Origin: *");

$method = $_SERVER['REQUEST_METHOD'],

if ($method == 'GET'){
    echo "THIS IS A GET REQUEST"
}
elseif ($method == 'Post'){
    echo "THIS IS A POST REQUEST"
}
elseif ($method == 'PUT'){
    echo "THIS IS A PUT REQUEST"
}
elseif ($method == 'DELETE'){
    echo "THIS IS A DELETE REQUEST"
}