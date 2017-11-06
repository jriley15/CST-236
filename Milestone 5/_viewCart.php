<?php

    //viewcart php navbar link fragment


    //checks if user is on viewCart already
    if ($_SERVER["PHP_SELF"] != '/Milestone/viewCart.php') {

        //instantiate database connection
        $connection = new Connection();

        //instantiate cart operation class
        $cartOperations = new ShoppingCartOperations($connection);

        //initialize cart var
        $cart = $cartOperations->loadCart($_SESSION['userID']);

        //close connection
        $connection->getConnection()->close();

        //html view cart link with count of cart items
        ?>
        <li ><a href = 'viewCart.php' > VIEW CART (<?php echo $cart->getCount(); ?>)</a ></li >

        <?php
    }

?>