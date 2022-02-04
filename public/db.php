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

    public function connect(){
        $conn = new PDO("mysql:host=$this->host;
                port=$this->port;dbname=$this->dbname;", $this->username, $this->password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }   

    public function fetch(string $sql){
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ALL ITEM REQUESTS
    public function getReviews(){
        $sql = "SELECT * FROM _REVIEW";
        return $this->fetch($sql);
    }
    public function getBooks(){
        $sql = "SELECT * FROM _BOOK";
        return $this->fetch($sql);
    }

    public function getUsers(){
        $sql = "SELECT * FROM _USER";
        return $this->fetch($sql);
    }
    public function getFavouriteBooks(){
        $sql = "SELECT * FROM _FAVOURITE_BOOK";
        return $this->fetch($sql);
    }



    // ONE ID REQUESTS
    public function getUser(string $id){
        $sql = "SELECT * FROM _USER WHERE user_id = '$id'";
        return $this->fetch($sql);
    }
    public function _getUserFavouriteBook(string $id){
        $sql = "SELECT * FROM _FAVOURITE_BOOK WHERE user_id = '$id'";
        return $this->fetch($sql);
    }
    public function getBookReviews(string $id){
        $sql = "SELECT * FROM _REVIEW WHERE book_id = '$id'";
        return $this->fetch($sql);
    }
    public function getBook(string $id){
        $sql = "SELECT * FROM _BOOK WHERE book_id = '$id'";
        return $this->fetch($sql);
    }
 




}
