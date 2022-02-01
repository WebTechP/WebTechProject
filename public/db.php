<?php

////////////////////////////////////////rebook heroku database/////////////////////////////////
// class Db
// {
//     private $username = "J7IR3t8NxI";
//     private $password = "DyZKIlEJ8f";
//     private $dbname = "J7IR3t8NxI";
//     private $host = "remotemysql.com";
//     private $port = "3306";

//     public function connect()
//     {
//         $conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;", $this->username, $this->password);

//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         return $conn;
//     }
// }



////////////////////////////////////////rebook local database/////////////////////////////////

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

    public function getReview(){
        $sql = "SELECT * FROM _REVIEW";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBook()
    {
        $sql = "SELECT * FROM _BOOK";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser()
    {
        $sql = "SELECT * FROM _USER";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFavouriteBook()
    {
        $sql = "SELECT * FROM _USER";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function _getFavouriteBook(string $id)
    {
        $sql = "SELECT * FROM _FAVOURITE_BOOK WHERE user_id = '$id'";
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}
