<?php
  class Cart {
    /**
     * * Получение всех элементов
     */
    public function getAll () {
      $text  = file_get_contents('db/cart/cart.txt');
      $arr = json_decode($text);
      return $arr;
    }

    /**
     * * Получение элемента по id
     * @param { number } $id
     */
    public function getById ($id) {
      $text  = file_get_contents('db/cart/cart.txt');
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

    /**
     * * Добавление нового элемента
     * @param { number } param1
     * @param { number } param2
     */
    public function setCategory($id, $qty) {
      $text = file_get_contents('db/cart/cart.txt');
      $arr = json_decode($text);

      $newEl = 
        [
          'id' => $id, 
          'qty' => $qty
        ];
      
      $object = (object) $newEl;

      array_push($arr, $object);

      $arr2 = array_values($arr);
      $result = json_encode($arr2);
      file_put_contents('db/cart/cart.txt', $result);

      return true;
    }

    /**
     * * Обновление элемента по id
     * @param { number } $id
     * @param { number } $qty
     */
    public function updateById($id, $qty) {
      $text = file_get_contents('db/cart/cart.txt');
      $arr = json_decode($text);

      $ind;
      foreach($arr as $key => $el) {
        $array = (array) $el;
        if($array['id'] == $id) {
          $ind = $key;
        }
      }

      $arr2 = (array) $arr[$ind];

      $arr2['qty'] = $qty;

      $object = (object) $arr2;

      $arr[$ind] = $object;
      $arr2 = array_values($arr);
      $result = json_encode($arr2);
      file_put_contents('db/cart/cart.txt', $result);

      return true;
    }

    /**
     * * Удаление элемента по id
     * @param { number } $id
     */
    public function deleteById($id) {
      $text = file_get_contents('db/cart/cart.txt');
      $arr = json_decode($text);

      $ind;
      foreach($arr as $key => $el) {
        $array = (array) $el;
        if($array['id'] == $id) {
          $ind = $key;
        }
      }

      unset($arr[$ind]);

      $arr2 = array_values($arr);
      $result = json_encode($arr2);

      file_put_contents('db/cart/cart.txt', $result);

      return true;
    }

    /**
     * * Удаление всех элементов
     */
    public function deleteAll(){
      file_put_contents('db/cart/cart.txt', '[]');
      return true;
    }
  }
?>