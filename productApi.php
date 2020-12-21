<?php
  require_once 'Api.php';
  require_once 'db/products.php';

  class ProductApi extends Api
  {
    public $apiName = 'products';

    /**
     * Метод GET
     * * Вывод списка всех записей
     * http://api2/api/products
     */
    public function indexAction()
    {
      $db = new Products();
      $items = $db->getAll();
      if($items){
        return $this->response($items, 200);
      }
      return $this->response('Data not found', 404);
    }

    /**
     * Метод GET
     * * Просмотр отдельной записи по id
     * http://api2/api/products/1
     */
    public function viewAction()
    {
      $id = array_shift($this->requestUri);

      if($id){
        $db = new Products();
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
     */
    public function createAction(){}
   
    /**
     * Метод POST эмуляция DELETE
     * * Удаление отдельной записи по id
     */
    public function deleteAction(){}
  
    /**
     * Метод POST эмуляция PUT
     * * Обновление отдельной записи по id
     */
    public function updateAction(){}

    public function deleteAllAction(){}
  }
?>
