<?php

  require_once 'categApi.php';
  require_once 'productApi.php';
  require_once 'cartApi.php';

  $requestUri = explode('/', trim($_SERVER['REQUEST_URI'],'/'));

  try {
    if($requestUri[1] === 'categories'){
      $categoriesApi = new CategApi();
      echo $categoriesApi->run();
    }

    if($requestUri[1] === 'products'){
      $productApi = new ProductApi();
      echo $productApi->run();
    }

    if($requestUri[1] === 'cart'){
      $cartApi = new CartApi();
      echo $cartApi->run();
    }
      
  } catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
  }

?>