<?php

/**
 *  Milestone 1
 *  Connection Class
 *  Jordan Riley and Antonio Jabrail
 *  9-9-2017
 */
class Connection
{
    //database login credentials
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "milestone";

    private $connection;

    //connection constructor
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