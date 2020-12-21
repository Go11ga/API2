<?php
  class Categories {
    /**
     * * Получение всех элементов
     */
    public function getAll () {
      $text  = file_get_contents('db/categories/categories.txt');
      $arr = json_decode($text);
      return $arr;
    }

    /**
     * * Получение одного элемента по id
     * @param { number } $id
     */
    public function getById ($id) {
      $text  = file_get_contents('db/categories/categories.txt');
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
     * @param { string } $title
     * @param { string } $categ
     */
    public function setCategory($title, $categ) {
      $text = file_get_contents('db/categories/categories.txt');
      $arr = json_decode($text);

      $currentId = 0;
      foreach($arr as $el){
        $array = (array) $el;
        if($array['id'] > $currentId){
          $currentId = $array['id'];
        }
      }

      $currentId++;

      $newEl = 
        [
          'id' => $currentId, 
          'cTitle' => $title, 
          'cCateg' => $categ,
          'cMetaDescription' => 'Мета описание',
          'cDesc' => 'Описание',
          'products' => []
        ];
      
      $object = (object) $newEl;

      $arr[$id] = $object;

      $arr2 = array_values($arr);
      $result = json_encode($arr2);
      file_put_contents('db/categories/categories.txt', $result);

      return true;
    }

    /**
     * * Обновление элемента по id
     * @param { number } $id
     * @param { string } $title
     * @param { string } $categ
     */
    public function updateById($id, $title, $categ) {
      $text = file_get_contents('db/categories/categories.txt');
      $arr = json_decode($text);

      $ind;
      foreach($arr as $key => $el) {
        $array = (array) $el;
        if($array['id'] == $id) {
          $ind = $key;
        }
      }

      $arr2 = (array) $arr[$ind];

      $arr2['cTitle'] = $title;
      $arr2['cCateg'] = $categ;

      $object = (object) $arr2;

      $arr[$ind] = $object;
      $arr2 = array_values($arr);
      $result = json_encode($arr2);
      file_put_contents('db/categories/categories.txt', $result);

      return true;
    }

    /**
     * * Удаление элемента по id
     * @param { number } $id
     */
    public function deleteById($id) {
      $text = file_get_contents('db/categories/categories.txt');
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

      file_put_contents('db/categories/categories.txt', $result);

      return true;
    }
  }
?>