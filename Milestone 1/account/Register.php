<?php

    require_once "../database/Connection.php";
    require_once "Account.php";


    if (isset($_POST["email"]) && isset($_POST["password"])) {

        $account = new Account($_POST["email"], $_POST["password"], $_POST["firstname"], $_POST["lastname"]);

        $connection = new Connection();

        $errors = array();

        if (!$connection->getConnection()->connect_error) {


            if (empty($account->getEmail()) || empty($account->getPassword())
                || empty($account->getFirstname()) || empty($account->getLastname())
            ) {
                $errors[] = "Complete all required fields.";
            }
            if (strlen($account->getEmail()) > 30) {
                $errors[] = "Email can only be 30 characters long.";
            }
            if (strlen($account->getPassword()) > 15) {
                $errors[] = "Password can only be 15 characters long.";
            }
            if ($account->getPassword() != $_POST["password2"]) {
                $errors[] = "Passwords must match.";
            }
            if (empty($errors)) {

                $result = $connection->getConnection()->query("SELECT * FROM accounts WHERE emailAddress='" . $account->getEmail() . "'");
                $rows = $result->num_rows;

                if ($rows > 0) {
                    $errors[] = "Email already in use.";
                    include('Register.html');
                } else {
                    $result = $connection->getConnection()->query("INSERT INTO accounts (emailAddress, password, firstName, lastName)
                  VALUES ('" . $account->getEmail() . "', '" . $account->getPassword() . "', '" . $account->getFirstname() . "', '" . $account->getLastname() . "')");

                    if ($result) {
                        $account->setUserId(mysqli_insert_id($connection->getConnection()));

                        //registration successful
                        echo "successfully registered";


                    } else {
                        $errors[] = "Database connection error.";
                        include('Register.html');
                    }
                }

            } else {
                include('Register.html');
            }


        } else {

            $errors[] = "Passwords must match.";
            include('Register.html');
        }
    } else {
        require_once "Register.html";
    }








?>