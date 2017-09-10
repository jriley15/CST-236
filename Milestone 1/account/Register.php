<?php
    /**
     *  Milestone 1
     *  Register Page
     *  Jordan Riley and Antonio Jabrail
     *  9-9-2017
     */
    require_once "../database/Connection.php";
    require_once "Account.php";


    //checks for session variables
    if (isset($_POST["email"]) && isset($_POST["password"])) {

        //creates new account instance with submitted session variables
        $account = new Account($_POST["email"], $_POST["password"], $_POST["firstname"], $_POST["lastname"]);

        //new db connection instance
        $connection = new Connection();

        //instantiating error array
        $errors = array();

        //check if connection worked
        if (!$connection->getConnection()->connect_error) {

            //check submitted variable lengths and password matches
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

            //check if errors
            if (empty($errors)) {

                $result = $connection->getConnection()->query("SELECT * FROM accounts WHERE emailAddress='" . $account->getEmail() . "'");
                $rows = $result->num_rows;

                //check if account with email already exists
                if ($rows > 0) {
                    $errors[] = "Email already in use.";
                    include('Register.html');
                } else {

                    //mysql query to insert data into db and create new account
                    $result = $connection->getConnection()->query("INSERT INTO accounts (emailAddress, password, firstName, lastName)
                  VALUES ('" . $account->getEmail() . "', '" . $account->getPassword() . "', '" . $account->getFirstname() . "', '" . $account->getLastname() . "')");

                    //check if query worked
                    if ($result) {
                        //save userId assigned from db
                        $account->setUserId(mysqli_insert_id($connection->getConnection()));

                        //registration successful
                        echo "successfully registered";


                    } else {

                        //back to form with db error
                        $errors[] = "Database connection error.";
                        include('Register.html');
                    }
                }

            } else {
                //back to form with errors
                include('Register.html');
            }


        } else {
            //back to form with errors
            $errors[] = "Passwords must match.";
            include('Register.html');
        }
    } else {
        //show register form
        require_once "Register.html";
    }








?>