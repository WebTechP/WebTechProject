<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require "../vendor/autoload.php";
require_once "./db.php";

$app = new \Slim\App;

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig("../views", [
        'cache' => false,
    ]);
    return $view;
};


$app->get('/index', function ($request, $response, $args) {
    return $this->view->render($response, "index.php");
});


// $app->get('/details/{id}', function ($request, $response, $args) {
//     return $this->view->render($response, "details.php");
// });


$app->get('/details/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    try {
        $sql = "SELECT * FROM _BOOK where book_id=:id";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});
$app->get('/profile', function ($request, $response, $args) {
    return $this->view->render($response, "profile.php");
});

$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, "login.php");
});
$app->get('/register', function ($request, $response, $args) {
    return $this->view->render($response, "register.php");
});


$app->get('/_book/get', function ($request, $response, $args) {
    try {
        $sql = "SELECT * FROM _BOOK";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});

$app->get('/_favourite_book/get', function ($request, $response, $args) {
    try {
        $sql = "SELECT * FROM _FAVOURITE_BOOK";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});


$app->get('/_review/get', function ($request, $response, $args) {
    try {
        $sql = "SELECT * FROM _REVIEW";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});


$app->get('/_user/get', function ($request, $response, $args) {
    try {
        $sql = "SELECT * FROM _USER";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});



$app->run();