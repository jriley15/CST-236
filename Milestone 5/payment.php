<?php


    require_once 'autoLoader.php';
    include 'securePage.php';




        //create db connection object
        $connection = new Connection();

        //create cart operations class
        $cartOperations = new ShoppingCartOperations($connection);
        //remove items from cart
        $cartOperations->removeCart($_SESSION['userID']);

        //close db connection
        $connection->getConnection()->close();

        //set msg for home page
        $msg = "<div class='op'>Purchase complete!</div><br><br>";

        include "index.php";

