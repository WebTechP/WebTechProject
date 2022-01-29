<?php


class Db
{
    private $username = "root";
    private $password = "";
    private $dbname = "ReBook";
    private $host = "localhost";
    private $port = "3306";

    public function connect()
    {
        $conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;", $this->username, $this->password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
