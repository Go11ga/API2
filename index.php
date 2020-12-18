<?php

require_once 'categApi.php';

try {
    $categoriesApi = new CategApi();
    echo $categoriesApi->run();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}

?>