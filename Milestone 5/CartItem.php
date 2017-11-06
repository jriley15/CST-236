<?php




class CartItem
{
    private $id;
    private $productID;
    private $quantity;
    private $userID;

    /**
     * ShoppingCart constructor.
     * @param $id
     * @param $productID
     * @param $quantity
     * @param $userID
     */
    public function __construct($id, $productID, $quantity, $userID)
    {
        $this->id = $id;
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->userID = $userID;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

}