<?php
    $response = file_get_contents('https://fakestoreapi.com/products');
    // product attributes: id, title, price, description, category, image, rating[rate, count]
    $data = json_decode($response, true);
    ?>
    