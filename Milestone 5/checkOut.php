<?php



include 'autoLoader.php';
include 'securePage.php';




        //opens connection
        $connection = new Connection();

        //intstantiates product operations class
        $productOperations = new ProductOperations($connection);

        //instiantiates account operations class
        $accountOperations = new AccountOperations($connection);


        //load cart items into array
        $cartOperations = new ShoppingCartOperations($connection);
        $cart = $cartOperations->loadCart($_SESSION['userID']);
        $cart_items = $cart->getCartItems($productOperations);

        //load account info into object
        $account = $accountOperations->getAccountAsAccount($_SESSION['userID']);

        //load cards into array
        $cards = $accountOperations->loadCreditCards($account->getUserId());

        //close connection
        $connection->getConnection()->close();


    //check if cart is empty
    if ($cart->getCount() == 0) {
        $error = "No items to buy!";
        include 'error.php';


    } else {
        include "checkOut.html";
    }



