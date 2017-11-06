<?php


    require_once 'autoLoader.php';
    require_once 'securePage.php';


    //check if get form value passed
    if (isset($_GET["id"])) {

        //set id value
        $id = $_GET["id"];

        //create db connection
        $connection = new Connection();

        //create product operations class
        $productOperations = new ProductOperations($connection);

        //load product table from db
        $product_data = mysqli_fetch_array($productOperations->getProduct($id));

        //create product object with data
        $product = new Product($product_data['ID'], $product_data['type'], $product_data['name'], $product_data['description'],
            $product_data['price']);

        //close connection
        $connection->getConnection()->close();

    //check if var from last page isset
    } else if (isset($addedToCart)) {
        //create db connection
        $connection = new Connection();

        //create product operations class
        $productOperations = new ProductOperations($connection);

        //load product table from db
        $product_data = mysqli_fetch_array($productOperations->getProduct($productID));

        //create product object with data
        $product = new Product($product_data['ID'], $product_data['type'], $product_data['name'], $product_data['description'],
            $product_data['price']);

        //close connection
        $connection->getConnection()->close();
    }


    include "viewProduct.html";


?>


