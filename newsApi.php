<?php
  require_once 'Api.php';
  require_once 'db/news/news.php';

  class NewsApi extends Api
  {
    public $apiName = 'news';

    /**
     * Метод GET
     * * Получение всех элементов
     * http://api2/api/news
     */
    public function indexAction()
    {
      $db = new News();
      $items = $db->getAll();
      if($items){
        return $this->response($items, 200);
      }
      return $this->response('Data not found', 404);
    }

    /**
     * Метод GET
     * * Получение одного элемента по id
     * http://api2/api/news/1
     */
    public function viewAction()
    {
      $id = array_shift($this->requestUri);

      if($id){
        $db = new News();
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
