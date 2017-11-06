<?php

    //destroys session

    session_start();
    session_unset();
    session_destroy();

    //redirects to home page
    include_once "index.php";
    exit();


