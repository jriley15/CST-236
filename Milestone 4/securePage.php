<?php

    //if user isn't logged in, redirect them to error page
    if (!isset($_SESSION["principle"]) || !$_SESSION["principle"] || $_SESSION["principle"] == null) {

        header("Location: error.php?type=secure");

    }




