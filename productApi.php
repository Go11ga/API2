<?php
  require_once 'Api.php';
  require_once 'db/products/products.php';

  class ProductApi extends Api
  {
    public $apiName = 'products';

    /**
     * Метод GET
     * * Получение всех элементов
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
     * * Получение одного элемента по id
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

    public function createAction(){}
    public function updateAction(){}
    public function deleteAction(){}
    public function deleteAllAction(){}
  }
?>
