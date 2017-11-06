<?php

/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 10/31/2017
 * Time: 7:18 PM
 */
class ShoppingCart
{


    private $cartItems = array();
    private $userID;

    /**
     * ShoppingCart constructor.
     * @param $cartItems
     * @param $userID
     */
    public function __construct($userID, $cartItems)
    {
        $this->cartItems = $cartItems;
        $this->userID = $userID;
    }


    public function getCount() {
        return count($this->cartItems);
    }

    function getCartItems($productOperations) {
        if ($this->getCount() == 0) {
            return;
        }

        $products = array();
        foreach ($this->cartItems as $item) {
            $products[] = $productOperations->getProductAsProduct($item->getProductID());
        }

        return $products;
    }

    function getItemCount($id) {

        foreach ($this->cartItems as $item) {
            if ($item->getProductID() == $id)
                return $item->getQuantity();
        }

        return 0;
    }


    function addItem($cartItem) {
        $cartItems[] = $cartItem;
    }



}