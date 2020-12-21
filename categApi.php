<?php
  require_once 'Api.php';
  require_once 'db/categories/categories.php';

  class CategApi extends Api
  {
    public $apiName = 'categories';

    /**
     * Метод GET
     * * Получение всех элементов
     * http://api2/api/categories
     */
    public function indexAction()
    {
      
      $db = new Categories();
      $items = $db->getAll();
      if($items){
        return $this->response($items, 200);
      }
      return $this->response('Data not found', 404);
    }

    /**
     * Метод GET
     * * Получение одного элемента по id
     * http://api2/api/categories/1
     */
    public function viewAction()
    {
      $id = array_shift($this->requestUri);

      if($id){
        $db = new Categories();
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
     * http://api2/api/categories/add?add=1&param1=something&param2=anything
     */
    public function createAction()
    {
      // $title = $this->requestParams['param1'] ?? '';
      // $categ = $this->requestParams['param2'] ?? '';

      // if($title && $categ){
      //   $db = new Categories();
      //   $item = $db->setCategory($title, $categ);

      //   if($item){
      //     return $this->response('Data saved.', 200);
      //   }
      // }

      // return $this->response("Saving error", 500);
    }

    /**
     * Метод POST эмуляция PUT
     * * Обновление элемента по id
     * http://api2/api/categories/upd?upd=1&param1=new&param2=new
     */
    public function updateAction()
    {
      // $id = $this->requestParams['upd'] ?? '';
      // $title = $this->requestParams['param1'] ?? '';
      // $categ = $this->requestParams['param2'] ?? '';

      // $db = new Categories();
      // $item = $db->getById($id);

      // if(!$id || is_null($item)){
      //   return $this->response("Category with id=$id not found", 404);
      // }
      // if($title && $categ){
      //   if($db->updateById($id, $title, $categ)){
      //     return $this->response('Data updated.', 200);
      //   }
      // }
      // return $this->response("Update error", 400);
    }

    /**
     * Метод POST эмуляция DELETE
     * * Удаление элемента по id
     * http://api2/api/categories/del?del=1
     */
    public function deleteAction()
    {
      // $itemId = $this->requestParams['del'] ?? '';
    
      // $db = new Categories();
      // $item = $db->getById($itemId);
      
      // if(!$itemId || !$item){
      //   return $this->response("User with id=$itemId not found", 404);
      // }

      // if($db->deleteById($itemId)){
      //   return $this->response('Data deleted.', 200);
      // }
      // return $this->response("Delete error", 500);
    }

    public function deleteAllAction(){}
  }
?>
