<?php


class Db
{
    private $username = "J7IR3t8NxI";
    private $password = "DyZKIlEJ8f";
    private $dbname = "J7IR3t8NxI";
    private $host = "remotemysql.com";
    private $port = "3306";

    public function connect()
    {
        $conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;", $this->username, $this->password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
