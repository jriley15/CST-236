
<?php
include "session.php";
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 10/20/2017
 * Time: 5:09 PM
 */
class ShoppingCartOperations
{

    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }


    function loadCart($userID) {

        $items = array();

        $result = $this->connection->getConnection()->query("SELECT * FROM cart_items WHERE userID = '" . $userID . "'");
        while($row = mysqli_fetch_array($result)){
            $items[] = new CartItem($row['ID'], $row['productID'], $row['quantity'], $row['userID']);
        }

        return new ShoppingCart($userID, $items);
    }


    function addItem($cartItem) {
        return $this->connection->getConnection()->query("INSERT INTO cart_items (productID, quantity, userID)
                  VALUES ('" . $cartItem->getProductID() . "', '" . $cartItem->getQuantity() . "', '" . $cartItem->getUserID() . "')");
    }

    function removeItem($userID, $productID) {
        return $this->connection->getConnection()->query("DELETE FROM cart_items WHERE userID = '".$userID."' AND productID ='".$productID."'");
    }

    function updateQuantity($cartItem) {
        return $this->connection->getConnection()->query("UPDATE cart_items SET quantity='".$cartItem->getQuantity()."' WHERE productID = '".$cartItem->getProductID()."' 
                AND userID = '".$cartItem->getUserID()."'");
    }


    function removeCart($userID) {
        return $this->connection->getConnection()->query("DELETE FROM cart_items WHERE userID = '".$userID."'");
    }



}