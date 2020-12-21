<?php
  class News {
    /**
     * * Получение всех элементов
     */
    public function getAll () {
      $text  = file_get_contents('db/news/news.txt');
      $arr = json_decode($text);
      return $arr;
    }

    /**
     * * Получение одного элемента по id
     * @param { number } $id
     */
    public function getById ($id) {
      $text  = file_get_contents('db/news/news.txt');
      $arr = json_decode($text);

      $item;
      foreach($arr as $el) {
        $array = (array) $el;
        if($array['id'] == $id) {
          $item = $array;
        }
      }

      return $item;
    }
  }
?>