<?php

    require_once 'autoLoader.php';
    include 'securePage.php';

    if (isset($_POST['id'], $_POST['quantity'])) {

        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        $connection = new Connection();
        $cartOperations = new ShoppingCartOperations($connection);

        if ($_POST['action']=="Update") {

            if ($quantity > 5) {
                $error = "The max quantity you can have of an item is 5.";
            } else if ($quantity > 0) {

                $cartItem = new CartItem(-1, $id, $quantity, $_SESSION['userID']);
                $cartOperations->updateQuantity($cartItem);

                $operation = "Succesfully updated cart";
            }

        } else if ($_POST['action']=="Remove") {
            $operation = "Succesfully removed item from cart.";

            $cartOperations->removeItem($_SESSION['userID'], $id);


        }



        $connection->getConnection()->close();


    }


    require_once "viewCart.php";

?>






