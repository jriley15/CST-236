
<?php




    require_once 'autoLoader.php';
    include 'securePage.php';


    //initialize connection object
    $connection = new Connection();

    //create product operations class
    $productOperations = new ProductOperations($connection);

    //load products into product object array
    $products = $productOperations->getProducts();

    //close db connection
    $connection->getConnection()->close();


    include "viewProducts.html";

?>





