<?php include 'session.php'; ?>
<!DOCTYPE html>

<html lang="en">
    <LINK REL=StyleSheet HREF="css/index.css?<?php echo time(); ?>">

    <img src="css/images/logonew.png" width="300px" height="200px">



    <!--

        Navigation bar display
        Uses if statements to ensure user is logged in for certain
        nav buttons to be shown and also makes sure user isn't already
        on page before displaying button

     -->

    <nav>
        <ul>
            <?php
            if ($_SERVER["PHP_SELF"] != '/Milestone/index.php') { ?>
                <li><a href="index.php">HOME</a></li>
            <?php } ?>




            <?php


            if (isset($_SESSION["principle"])) {?>

                <?php if ($_SESSION["rights"] > 0 && $_SERVER["PHP_SELF"] != '/Milestone/editProducts.php') {?>
                    <li><a href='editProducts.php'>EDIT PRODUCTS</a></li>
                <?php } ?>

                <?php
                if ($_SERVER["PHP_SELF"] != '/Milestone/viewProducts.php') { ?>
                    <li><a href='viewProducts.php'>VIEW PRODUCTS</a></li>
                <?php } ?>

                <?php
                if ($_SERVER["PHP_SELF"] != '/Milestone/editProfile.php') { ?>
                    <li><a href='editProfile.php'>EDIT PROFILE</a></li>
                <?php } ?>

                <?php

                    include '_viewCart.php';
                ?>


                <li><a href='logout.php'>LOGOUT</a></li>

            <?php } else {

                    if ($_SERVER["PHP_SELF"] != '/Milestone/Login.php') { ?>
                        <li><a href='Login.php'>LOGIN</a></li>
                    <?php }
                    if ($_SERVER["PHP_SELF"] != '/Milestone/Register.php') { ?>
                        <li><a href='Register.php'>REGISTER</a></li>
                    <?php } ?>


            <?php } ?>

        </ul>
    </nav>
<br>


</html>