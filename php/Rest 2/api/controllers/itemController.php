<?php
require_once 'models/item.php';
class ItemController
{
   private $db;
   private $item;
   public function __construct()
   {
       global $db;
       $this->db = $db;
       $this->item = new Item($this->db);
   }
   public function getAllItems($request, $response)
   {
       $items = $this->item->getAllItems();
       return $response->withJson($items);
   }
   public function getItemById($request, $response, $args)
   {
       $id = $args['id'];
       $item = $this->item->getItemById($id);
       return $response->withJson($item);
   }
   public function createItem($request, $response)
   {
       $data = $request->getParsedBody();
       $name = $data['name'];
       $description = $data['description'];
       $this->item->createItem($name, $description);
       return $response->withJson(['message' => 'Item created successfully']);
   }
   public function updateItem($request, $response, $args)
   {
       $id = $args['id'];
       $data = $request->getParsedBody();
       $name = $data['name'];
       $description = $data['description'];
       $this->item->updateItem($id, $name, $description);
       return $response->withJson(['message' => 'Item updated successfully']);
   }
   public function deleteItem($request, $response, $args)
   {
       $id = $args['id'];
       $this->item->deleteItem($id);
       return $response->withJson(['message' => 'Item deleted successfully']);
   }
}
?>