<?php

    require_once "../database/Connection.php";
    require_once "Account.php";

    if (isset($_POST["email"], $_POST["password"])) {

        $account = new Account($_POST["email"], $_POST["password"], "", "");
        $errors = array();

        $connection = new Connection();

        if (!$connection->getConnection()->connect_error) {


            if (empty($account->getEmail()) || empty($account->getPassword())) {
                $errors[] = "Complete all required fields.";
            }
            if (strlen($account->getEmail()) > 30) {
                $errors[] = "Email can only be 30 characters long.";
            }
            if (strlen($account->getPassword()) > 15) {
                $errors[] = "Password can only be 15 characters long.";
            }

            if (empty($errors)) {
                $response = $connection->getConnection()->query("SELECT * FROM accounts WHERE emailAddress = '" . $account->getEmail() . "' AND password = '" . $account->getPassword() . "'");
                $rows = $response->num_rows;

                if ($rows > 0) {
                    $account->setUserId(mysqli_fetch_array($response)['ID']);
                    echo "Successfully logged in as: " . $account->getEmail();
                } else {
                    $errors[] = "Invalid username or password.";
                    include('Login.html');
                }
            } else {
                include('Login.html');
            }

        } else {

            echo "connection error";

        }
    } else {
        require_once "Login.html";
    }


?>