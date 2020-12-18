<?php
  require_once 'Api.php';
  require_once 'db/categories.php';

  class CategApi extends Api
  {
    public $apiName = 'categories';

    /**
     * Метод GET
     * * Вывод списка всех записей
     * http://ДОМЕН/categories
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
     * * Просмотр отдельной записи по id
     * http://ДОМЕН/categories/1
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
     * * Создание новой записи
     * http://ДОМЕН/categories + параметры запроса title, categ
     * http://api2/api/categories/title?title=sdfg&categ=12345
     */
    public function createAction()
    {
      $title = $this->requestParams['title'] ?? '';
      $categ = $this->requestParams['categ'] ?? '';

      if($title && $categ){
        $db = new Categories();
        $item = $db->setCategory($title, $categ);

        if($item){
          return $this->response('Data saved.', 200);
        }
      }

      return $this->response("Saving error", 500);
    }

    /**
     * Метод POST эмуляция DELETE
     * * Удаление отдельной записи по id
     * http://ДОМЕН/categories/1
     * http://api2/api/categories/del?del=1
     */
    public function deleteAction()
    {
      $itemId = $this->requestParams['del'] ?? '';
    
      $db = new Categories();
      $item = $db->getById($itemId);
      
      if(!$itemId || !$item){
        return $this->response("User with id=$itemId not found", 404);
      }

      if($db->deleteById($itemId)){
        return $this->response('Data deleted.', 200);
      }
      return $this->response("Delete error", 500);
    }

    /**
     * Метод POST эмуляция PUT
     * * Обновление отдельной записи по id
     * http://ДОМЕН/categories/1 + параметры запроса title, categ
     * http://api2/api/categories/upd?upd=2&newtitle=sdfg&newcateg=12345
     */
    public function updateAction()
    {
      $itemId = $this->requestParams['upd'] ?? '';
      $title = $this->requestParams['newtitle'] ?? '';
      $categ = $this->requestParams['newcateg'] ?? '';

      $db = new Categories();
      $item = $db->getById($itemId);

      if(!$itemId || is_null($item)){
        return $this->response("Category with id=$itemId not found", 404);
      }
      if($title && $categ){
        if($db->updateById($itemId, $title, $categ)){
          return $this->response('Data updated.', 200);
        }
      }
      return $this->response("Update error", 400);
    }
  }
?>
