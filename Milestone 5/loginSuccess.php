<?php
    //set global variabl 'principle' to true to signify user is logged in
    $_SESSION["principle"] = true;

    //sets welcome message
    $welcome = "Successfully logged in as ".$email;

    //includes home page
    include 'index.php';

?>