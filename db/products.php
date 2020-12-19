<?php
  class Products {
    /**
     * * Получить все продукты
     */
    public function getAll () {
      $text  = file_get_contents('db/products.txt');
      $arr = json_decode($text);
      return $arr;
    }

    /**
     * * Получить продукт по id
     * @param { number } $id
     */
    public function getById ($id) {
      $text  = file_get_contents('db/products.txt');
      $arr = json_decode($text);

      $product;
      foreach($arr as $el) {
        $array = (array) $el;
        if($array['id'] == $id) {
          $product = $array;
        }
      }

      return $product;
    }
  }
?>