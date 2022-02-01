<?php

//////////////////////////////////// SLIM SETUP START //////////////////////////////////////////////


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


//////////////////////////////////// SLIM SETUP END //////////////////////////////////////////////









//////////////////////////////////// HTML RENDERING START //////////////////////////////////////////////

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, "index.php");
});

$app->get('/index', function ($request, $response, $args) {
    return $this->view->render($response, "index.php");
});

$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, "login.php");
});

$app->get('/profile', function ($request, $response, $args) {
    return $this->view->render($response, "profile.php");
});

$app->get('/register', function ($request, $response, $args) {
    return $this->view->render($response, "register.php");
});

$app->get('/addReviews', function ($request, $response, $args) {
    return $this->view->render($response, "addReview.php");
});

//////////////////////////////////// HTML RENDERING END //////////////////////////////////////////////







//////////////////////////////////// GET METHODS START//////////////////////////////////////////////


$app->get('/details/screen/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    try {
        $sql = "SELECT * FROM _BOOK where book_id=:id";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $bookData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM _REVIEW WHERE book_id=:id";
        $db = new Db();

        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $reviewsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $allData = array(
            "status" => "success",
            "bookDetails" => $bookData,
            "userReviews" => $reviewsData,
        );
        echo json_encode($allData);
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});



$app->get('/_book/get', function ($request, $response, $args) {
    try {

        $db = new Db();
        $data = $db->getBook();

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

        $db = new Db();
        $data = $db->getFavouriteBook();

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
        $db = new Db();
        $data = $db->getReview();

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
            $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = array(
            "status" => "success",
            "userData" => $userData,
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

//////////////////////////////////// GET METHODS END //////////////////////////////////////////////












//////////////////////////////////// POST METHODS START //////////////////////////////////////////////


$app->post('/_favourite_book/insert/{id}', function ($request, $response, $args) {
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


$app->post('/_user/register', function ($request, $response, $args) {
    $input = $request->getParams();
     
    try{
        // this code will see if the insertion was for adming or the user
        !$input['user_status'] 
        ? $userStatus = 0 
        : $userStatus = $input['user_status']; 
        
        // this code will choose the right id for the user
        do {
       
            $fullpostid = getId(); // this is the Post_Id
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
        $data = $stmt->execute([$fullpostid, $input['firstname'], 
        $input['lastname'], $input['age'], $input['email'], $input['password'], $userStatus]);
         
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



$app->post("/_book/insert", function ($request, $response, array $args) {
    $input = $request->getParams();

    try{
        
        $data = array(
                "status" => "success",
            );

        echo json_encode($data);
    }catch(PDOException $e){
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});


//////////////////////////////////// POST METHODS END //////////////////////////////////////////////



$app->run();



//////////////////////////////////// USEFUL FUNCTIONS //////////////////////////////////////////////


function getId()
{
    $str1 = "0123456789ABCDEFGHIGKLMNOPQRSTUVWXYZ";
    $str2 = "0123456789";
    $str3 = "ABCDEFGHIGKLMNOPQRSTUVWXYZ";
    $postid1 = substr(str_shuffle($str1), 0, 7);
    $postid2 = substr(str_shuffle($str2), 0, 5);
    $postid3 = substr(str_shuffle($str3), 0, 1);
    $postid4 = substr(str_shuffle($str3), 0, 5);

    return $postid3 . $postid1 . "_" . $postid2 . "_" . $postid4;
}


//////////////////////////////////// USEFUL FUNCTIONS //////////////////////////////////////////////

















//////////////////////////////////// LEGACY CODE START //////////////////////////////////////////////


// $app->get('/details[/{book_id}[/{user_id}]]', function ($request, $response, $args) {
//     // responds to `/news`, `/news/2016` and `/news/2016/03`

//     return $response;
// });


//////////////////////////////////// LEGACY CODE END //////////////////////////////////////////////
