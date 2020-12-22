<?php
  require_once 'Api.php';
  require_once 'db/cart/cart.php';

  class CartApi extends Api
  {
    public $apiName = 'cart';

    /**
     * Метод GET
     * * Получение всех элементов
     * http://api2/api/cart
     */
    public function indexAction()
    {
      $db = new Cart();
      $items = $db->getAll();
      
      return $this->response($items, 200);
    }

    /**
     * Метод GET
     * * Получение одного элемента по id
     * http://api2/api/cart/1
     */
    public function viewAction()
    {
      $id = array_shift($this->requestUri);

      if($id){
        $db = new Cart();
        $item = $db->getById($id);
        
        if($item){
          return $this->response($item, 200);
        }
        return $this->response('Data not found', 404);
      }
    }

    /**
     * Метод POST
     * * Добавление нового элемента
     * http://api2/api/cart/add?add=1&param1=2
     */
    public function createAction()
    {
      $id = $this->requestParams['add'] ?? '';
      $qty = $this->requestParams['param1'] ?? '';

      $db = new Cart();
      $item = $db->getById($id);

      if(!$id || !is_null($item)){
        return $this->response("Item with id=$id already exists", 404);
      }

      if($id && $qty){
        $item = $db->setCategory($id, $qty);

        if($item){
          return $this->response('Data saved.', 200);
        }
      }
      return $this->response("Saving error", 500);
    }

    /**
     * Метод POST эмуляция PUT
     * * Обновление элемента по id
     * http://api2/api/cart/upd?upd=1&param1=100
     */
    public function updateAction()
    {
      $id = $this->requestParams['upd'] ?? '';
      $qty = $this->requestParams['param1'] ?? '';

      $db = new Cart();
      $item = $db->getById($id);

      if(!$id || is_null($item)){
        return $this->response("Item with id=$id not found", 404);
      }
      if($id && $qty){
        if($db->updateById($id, $qty)){
          return $this->response('Data updated.', 200);
        }
      }
      return $this->response("Update error", 400);
    }

    /**
     * Метод POST эмуляция DELETE
     * * Удаление элемента по id
     * http://api2/api/cart/del?del=1
     */
    public function deleteAction()
    {
      $itemId = $this->requestParams['del'] ?? '';
    
      $db = new Cart();
      $item = $db->getById($itemId);
      
      if(!$itemId || !$item){
        return $this->response("Item with id=$itemId not found", 404);
      }

      if($db->deleteById($itemId)){
        return $this->response('Item deleted.', 200);
      }
      return $this->response("Delete error", 500);
    }

    /**
     * Метод POST эмуляция DELETE
     * * Удаление всех элементов
     * http://api2/api/cart/delall?delall=1
     */
    public function deleteAllAction()
    {
      $db = new Cart();
      if($db->deleteAll()){
        return $this->response('Items deleted.', 200);
      }
      return $this->response("Delete error", 500);
    } 
  }
?>