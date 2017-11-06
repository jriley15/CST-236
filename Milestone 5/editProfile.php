<?php
include "autoLoader.php";
include 'securePage.php';



        //open db connection
        $connection = new Connection();

        //instantiate account operation class
        $accountOperations = new AccountOperations($connection);

        //check if form was submitted and userid var equals this users id
        if (isset($_POST['userID']) && $_POST['userID'] == $_SESSION['userID']) {

            //initialize account variables
            $userID = $_POST['userID'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $rights = $_POST['rights'];

            //initialize credit card variables
            $ccID = $_POST['editCard'];
            $ccNumber = $_POST['ccNumber'];
            $ccName = $_POST['ccName'];
            $ccExpiration = $_POST['ccExpiration'];
            $ccCCV = $_POST['ccCCV'];

            //intitialize objects
            $updateAccount = new Account($userID, $email, $password, $firstName, $lastName, $rights);
            $updateCard = new CreditCard($ccID, $userID, $ccName, $ccNumber, $ccExpiration, $ccCCV);

            //check if new card to add
            if ($ccID == -1) {
                //add new card
                if (count($accountOperations->loadCreditCards($userID)) < 3) {
                    if (!empty($ccID) && !empty($ccNumber) && !empty($ccName) && !empty($ccExpiration) && !empty($ccCCV)) {
                        $accountOperations->addNewCard($updateCard);
                    }
                }

            } else {
                //update existing card
                if (!empty($ccID) && !empty($ccNumber) && !empty($ccName) && !empty($ccExpiration) && !empty($ccCCV)) {
                    $accountOperations->updateCard($updateCard);
                }
            }

            //query db to update account
            if ($accountOperations->update($updateAccount)) {
                $operation = "Successfully updated profile.";
            } else {
                $operation = "Error updating profile.";
            }

        }

        //loads account object from db for form data display
        $account = $accountOperations->getAccountAsAccount($_SESSION["userID"]);

        //load cards into array for form data display
        $cards = $accountOperations->loadCreditCards($account->getUserId());

        //close connection
        $connection->getConnection()->close();



    include 'editProfile.html';

?>

