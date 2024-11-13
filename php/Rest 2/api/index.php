<?php
require 'vendor/autoload.php'; // Slim Framework autoload
require 'config/database.php';
require 'models/item.php';
require 'controllers/itemController.php';
$app = new \Slim\App();
// API végpontok
$app->get('/items', ItemController::class . ':getAllItems');
$app->get('/items/{id}', ItemController::class . ':getItemById');
$app->post('/items', ItemController::class . ':createItem');
$app->put('/items/{id}', ItemController::class . ':updateItem');
$app->delete('/items/{id}', ItemController::class . ':deleteItem');
$app->run();