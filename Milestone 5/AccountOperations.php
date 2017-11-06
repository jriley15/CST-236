<?php

class AccountOperations
{
    //class member variables
    private $connection;

    //default constructor
    function __construct($connection)
    {
        $this->connection = $connection;

    }

    //function that takes account variables and sends update query to db
    function update($account) {
        return $this->connection->getConnection()->query("UPDATE accounts SET emailAddress='".$account->getEmail()."', password='".$account->getPassword()."', 
        firstName='".$account->getFirstname()."', lastName='".$account->getLastname()."', rights='".$account->getRights()."' WHERE ID = '".$account->getUserId()."'");


    }

    //function takes id var and returns a query to the db for account with matching id
    function getAccount($id) {
        return $this->connection->getConnection()->query("SELECT * FROM accounts WHERE ID = '" . $id . "'");

    }

    //function takes id var and returns an account object with the data that is returned from the db with a query
    function getAccountAsAccount($id) {
        $result = $this->connection->getConnection()->query("SELECT * FROM accounts WHERE ID = '" . $id . "'");
        $row = mysqli_fetch_array($result);
        //$cc = new CreditCard($row["ccName"], $row["ccNumber"], $row["ccExpiration"], $row["ccCCV"]);
        return new Account($row["ID"], $row["emailAddress"], $row["password"], $row["firstName"], $row["lastName"], $row["rights"]);
    }

    //returns account table from db where emails match up
    function accountExists($email) {
        return $this->connection->getConnection()->query("SELECT * FROM accounts WHERE emailAddress = '" . $email . "'");

    }

    //fetches account from db where email and pass match up
    function fetchAccount($email, $pass) {
        return $this->connection->getConnection()->query("SELECT * FROM accounts WHERE emailAddress = '" . $email . "' AND password = '" . $pass . "'");
    }


    //inserts new account and credit card (if filled out) into db
    function createAccount($email, $pass, $firstName, $lastName, $rights, $ccname, $ccnumber, $ccdate, $ccCCV) {

        //insert account into db
        $this->connection->getConnection()->query("INSERT INTO accounts (emailAddress, password, firstName, lastName, rights)
                  VALUES ('" . $email . "', '" . $pass . "', '" . $firstName . "', '" . $lastName . "', '" . $rights . "')");

        $userID = $this->connection->getConnection()->insert_id;

        //insert cc into db
        if (!empty($ccnumber) && !empty($ccname) && !empty($ccdate) && !empty($ccCCV)) {
            $this->connection->getConnection()->query("INSERT INTO credit_cards (userID, name, number, expirationDate, ccv)
                  VALUES ('" . $userID . "', '" . $ccname . "', '" . $ccnumber . "', '" . $ccdate . "', '" . $ccCCV . "')");
        }

        return true;
    }


    //returns account object array of every account from the accounts table in the db
    function getAccounts(){
        $accounts = array();
        $result = $this->connection->getConnection()->query("SELECT * FROM accounts");

        while($row = mysqli_fetch_array($result)){
            $accounts[] =  new Account($row["ID"], $row["emailAddress"], $row["password"], $row["firstName"], $row["lastName"], $row["rights"]);

        }
        return $accounts;
    }

    //verifies login fields
    function checkLoginFields($email, $password) {

        $errors = array();
        if (empty($email) || empty($password)) {
            $errors[] = "Complete all required fields.";
        }
        if (strlen($email) > 30) {
            $errors[] = "Email can only be 30 characters long.";
        }
        if (strlen($password) > 15) {
            $errors[] = "Password can only be 15 characters long.";
        }

        return $errors;
    }

    //checks if account with user and pass combo exists in db
    function verifyLogin($email, $password) {
        $response = $this->fetchAccount($email, $password);
        $rows = $response->num_rows;
        //if account with user and pass exists
        if ($rows > 0) {
            return true;
        }
        return false;
    }

    //verifies register fields
    function checkRegisterFields($email, $password,$password2, $firstName, $lastName) {

        $errors = array();
        //check submitted variable lengths and password matches
        if (empty($email) || empty($password)
            || empty($firstName) || empty($lastName)
        ) {
            $errors[] = "Complete all required fields.";
        }
        if (strlen($email) > 30) {
            $errors[] = "Email can only be 30 characters long.";
        }
        if (strlen($password) > 15) {
            $errors[] = "Password can only be 15 characters long.";
        }
        if ($password != $password2) {
            $errors[] = "Passwords must match.";
        }
        return $errors;
    }

    //checks if email already in use in the db
    function verifyRegister($email) {

        $response = $this->accountExists($email);
        $rows = $response->num_rows;
        //if account with email already exists
        if ($rows == 0) {
            return true;
        }
        return false;
    }

    //returns all credit cards in an object array associated with a certain user from the db
    function loadCreditCards($id) {
        $cards = array();

        $result = $this->connection->getConnection()->query("SELECT * FROM credit_cards WHERE userID = '" . $id . "'");
        while($row = mysqli_fetch_array($result)){
            $cards[] = new CreditCard($row['ID'], $row['userID'], $row['name'], $row['number'], $row['expirationDate'], $row['ccv']);
        }

        return $cards;
    }

    //inserts new credit card into database
    function addNewCard($card) {
        return $this->connection->getConnection()->query("INSERT INTO credit_cards (userID, name, number, expirationDate, ccv)
                VALUES ('" . $card->getUserID() . "', '" . $card->getName() . "', '" . $card->getNumber() . "', '" . $card->getExpirationDate() . "', '" . $card->getCcv() . "')");
    }

    //updates credit card in database
    function updateCard($card) {
        return $this->connection->getConnection()->query("UPDATE credit_cards SET name='".$card->getName()."', number='".$card->getNumber()."',
            expirationDate='".$card->getExpirationDate()."', ccv='".$card->getCcv()."' WHERE ID = '".$card->getId()."'");
    }



}