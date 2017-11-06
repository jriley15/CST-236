<?php


    require_once 'autoLoader.php';
    require_once 'securePage.php';



    //create db connection
    $connection = new Connection();

    //create cart/product operation class
    $productOperations = new ProductOperations($connection);
    $cartOperations = new ShoppingCartOperations($connection);

    //load cart
    $cart = $cartOperations->loadCart($_SESSION['userID']);
    $cart_items = $cart->getCartItems($productOperations);

    //close connection
    $connection->getConnection()->close();



    include "viewCart.html";


?>


