<?php
session_start();
// $_SESSION['limit'] = 0;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use SlimBuild\Helper\Password;
use SlimBuild\Helper\Session;
use SlimBuild\Model\User;

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

$app->get('/addReviews', function ($request, $response, $args) {
    return $this->view->render($response, "addReview.php");
});


// $app->get('/details/{id}', function ($request, $response, $args) {
//     return $this->view->render($response, "details.php");
// });


$app->get('/details/screen/{id}', function ($request, $response, $args){
    $id = $args['id'];
    try {
        $sql = "SELECT * FROM _BOOK where book_id=:id";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->view->render($response, "details.php");
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        return $this->view->render($response, "details.php");
    }
});



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

// $app->get('/details[/{book_id}[/{user_id}]]', function ($request, $response, $args) {
//     // responds to `/news`, `/news/2016` and `/news/2016/03`

//     return $response;
// });


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

$app->get('/_book/get/limits', function ($request, $response, $args) {
    $input = $request->getQueryParams();
    $limit = $input['limit'];
    $offset = $input['offset']; 
    try {
        $sql = "SELECT * FROM _BOOK LIMIT $offset,$limit";
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

$app->post('/_favourite_book/{id}', function ($request, $response, $args) {
        $id = $args['id'];
        try {
            $sql = "INSERT INTO  _FAVOURITE_BOOK (book_title, book_description, book_author, book_id) 
            SELECT  book_title,  book_description,book_author,book_id  FROM _BOOK
             where book_id=:id";

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

$app->get('/_user/login', function ($request, $response, $args) {
    $input = $request->getParams();
    $pass = $input['password'];
    $email = $input['email']; 
    try {

        $sql = "SELECT * FROM _USER where user_pass = '$pass' AND email_address='$email'";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $data = array(
            "status" => "success",
                );
            echo json_encode($data);
        }else{
            $data = array(
                "status" => "error",
            );
            echo json_encode($data);
        }

    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});




$app->post('/_user/register', function ($request, $response, $args) {
    $input = $request->getParams();
    try{


        $str1 = "0123456789ABCDEFGHIGKLMNOPQRSTUVWXYZ";
        $str2 = "0123456789";
        $str3 = "ABCDEFGHIGKLMNOPQRSTUVWXYZ";

        do {
            $postid1 = substr(str_shuffle($str1), 0, 7);
            $postid2 = substr(str_shuffle($str2), 0, 5);
            $postid3 = substr(str_shuffle($str3), 0, 1);
            $postid4 = substr(str_shuffle($str3), 0, 5);


            $fullpostid = $postid3 . $postid1 . "_" . $postid2 . "_" . $postid4; // this is the Post_Id
            $sql = "SELECT * FROM _USER WHERE user_id ='$fullpostid'";
            
            $db = new Db();

            $db = $db->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute();

        } while ($stmt->rowCount() > 0);


        $sql = "INSERT INTO _USER(user_id, first_name, last_name, age, email_address, user_pass, user_status) 
        VALUES(?,?,?,?,?,?,?)";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $data = $stmt->execute([$fullpostid, $input['firstname'], $input['lastname'], $input['age'], $input['email'], $input['password'], 0]);
         
        if($data){
            $data = array(
                "status" => "success",
            );

            echo json_encode($data);
        }else{
            $data = array(
                "status" => "error",
            );

            echo json_encode($data);
        }
        

    }catch(PDOException $e){
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }

});


$app->run();