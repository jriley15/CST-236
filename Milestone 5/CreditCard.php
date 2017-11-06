<?php




class CreditCard implements \JsonSerializable
{

    //class member vars
    private $id;
    private $userID;
    private $name;
    private $number;
    private $expirationDate;
    private $ccv;

    //default constructor
    function __construct($id, $userID, $name, $number, $expirationDate, $ccv)
    {
        $this->id = $id;
        $this->userID = $userID;
        $this->name = $name;
        $this->number = $number;
        $this->expirationDate = $expirationDate;
        $this->ccv = $ccv;
    }

    //json serialize method to pass on object to javascript
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    //getters/setters

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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getCcv()
    {
        return $this->ccv;
    }

    /**
     * @param mixed $ccv
     */
    public function setCcv($ccv)
    {
        $this->ccv = $ccv;
    }



}