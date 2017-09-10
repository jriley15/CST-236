<?php

/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 9/6/2017
 * Time: 6:36 PM
 */
class Connection
{

    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "milestone";

    private $connection;


    function __construct()
    {
        $this->connection = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);

    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }




}