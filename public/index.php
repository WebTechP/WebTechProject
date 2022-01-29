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


$app->get('/', function($request, $response, $args) {
    return $this->view->render($response, "index.html");
});


$app->get('/nothing', function ($request, $response, $args) {
    try {
        $sql = "SELECT * FROM ";
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
