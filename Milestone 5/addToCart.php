<?php

    //add to cart page

    require_once 'autoLoader.php';
    include 'securePage.php';



    //checks if form was submitted
    if (isset($_POST['id'], $_POST['quantity'])) {

        //initializes vars
        $productID = $_POST['id'];
        $quantity = $_POST['quantity'];


        //opens db connection
        $connection = new Connection();

        //intantiate cart operation
        $cartOperations = new ShoppingCartOperations($connection);

        //loads user card from db
        $cart = $cartOperations->loadCart($_SESSION['userID']);

        //check if cart is full already
        if ($cart->getItemCount($productID) + $quantity <= 5) {

            if ($cart->getItemCount($productID) > 0) {
                //updates quantity of item in cart
                $cartItem = new CartItem(-1, $productID, $quantity+$cart->getItemCount($productID), $_SESSION['userID']);
                $cartOperations->updateQuantity($cartItem);
            } else {
                //adds new item to cart
                $cartItem = new CartItem(-1, $productID, $quantity, $_SESSION['userID']);
                $cartOperations->addItem($cartItem);
            }
            $addedToCart = "Successfully added product to cart.";
        } else {
            $addedToCart = "<div class='error'>The max quantity you can have of an item is 5.</div>";
        }




    } else {
        $addedToCart = "Error adding product to cart.";
    }


    include "viewProduct.php";

?>


