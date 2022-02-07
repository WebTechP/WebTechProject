<?php





//////////////////////////////////// SLIM SETUP START //////////////////////////////////////////////


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use SlimBuild\Helper\Password;
use SlimBuild\Helper\Session;
use SlimBuild\Model\User;
use \RKA\SessionMiddleware;
// use \RKA\Session;

require "../vendor/autoload.php";
require_once "./db.php";

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$app->add(new \RKA\SessionMiddleware(['name' => 'MySessionName']));
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

$app->get('/details/{id}', function ($request, $response, $args) {
    return $this->view->render($response, "details.php");
});

//////////////////////////////////// HTML RENDERING END //////////////////////////////////////////////








//////////////////////////////////// TEST START //////////////////////////////////////////////


// $app->get('/session', function ($request, $response, $args) {


//     // Get session variable:
//     // $foo = $session->get('foo', 'some-default');
//     $session->set('foo', 'this is a value');
//     echo $session->foo;
//     return $response;
// });

$app->get('/session1', function ($request, $response, $args) {
    $session = new \RKA\Session();

    // Get session variable:
    // $foo = $session->get('foo', 'some-default');
    $session->get('foo');
    $session->foo = "this is not";
    echo $session->user;
    return $response;
});







//////////////////////////////////// TEST END //////////////////////////////////////////////








//////////////////////////////////// GET METHODS START//////////////////////////////////////////////


$app->get('/details/screen/{id}', function ($request, $response, $args) {
    $session = new \RKA\Session();
    $id = $args['id'];
    try {

        $db = new Db();
        
        $bookData = $db->getBook($id);
        // echo print_r($bookData);
        $reviewsData = $db->getBookReviews($id);
        // echo print_r($reviewsData);
        if(count($reviewsData) > 0){
            $userReviewData = array();
            for ($index = 0; $index < count($reviewsData); $index++) {
                // echo $reviewsData[$index]['user_id'];
                $reviewUserId = $reviewsData[$index]['user_id'];
                // $bookUserId = $bookData[0]['user_id'];
                $userData = $db->getUser($reviewUserId);
                // echo print_r($userData);c
                array_push($userReviewData, array(
                    "userData" => $userData,
                    "reviewData" => $reviewsData[$index],
                ));
            }
        }else{
            $userReviewData = [];
        }
       
        if(isset($session->user)){
            $allData = array(
                "status" => "success",
                "bookDetails" => $bookData,
                "userReviews" => $userReviewData,
                "userLogin" => true,
                "userData" => json_decode($session->user),
            );      
        }else{
            $allData = array(
                "status" => "success",
                "bookDetails" => $bookData,
                "userReviews" => $userReviewData,
                "userLogin" => false,
            );      
        }
        $allData = array(
            "status" => "success",
            "bookDetails" => $bookData,
            "userReviews" => $userReviewData,
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
    $session = new \RKA\Session();
    
    try {
        
        $db = new Db();
        $data = $db->getBooks();
        if(isset($session->user)){
            $allData = array(
                "status" => "success",
                "books" => $data,
                "userLogin" => true,
                "userData" => json_decode($session->user),
            );
            echo json_encode($allData);
        }else{
            $allData = array(
                "status" => "success",
                "userFalse"=> false,
                "books" => $data,
            );

            echo json_encode($allData);
        }
        
    } catch (PDOException $e) {
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});

$app->get('/_book/get/limits', function ($request, $response, $args) {
    $session = new \RKA\Session();

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
        if (isset($session->user)) {
            $allData = array(
                "status" => "success",
                "books" => $data,
                "userLogin" => true,
                "userData" => json_decode($session->user),
            );
            echo json_encode($allData);
        } else {
            $allData = array(
                "status" => "success",
                "userLogin" => false,
                "books" => $data,
            );

            echo json_encode($allData);
        }
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
        $data = $db->getFavouriteBooks();

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
        $data = $db->getReviews();

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
    
    $session = new \RKA\Session();

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

            $session->set('user', json_encode($userData));
            
            echo $session->get('user');
            
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
       
            $fulluserid = getId(); // this is the User_Id
            $sql = "SELECT * FROM _USER WHERE user_id ='$fulluserid'";
            
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
        $data = $stmt->execute([$fulluserid, $input['firstname'], 
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
        
        $sql = "INSERT INTO _BOOK(book_id, book_title, book_description, book_page, book_author, book_ISBN)
                 VALUES(?,?,?,?,?,?)";

        $db = new Db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $data = $stmt->execute([getId(), $input['book_title'], $input['book_description'], 
                               $input['book_page'], $input['book_author'], $input['book_ISBN']]);

        if($data){
            $data = array(
                "status" => "success",
            );
        }else{
            $data = array(
                "status" => "error",
            );
        }

        echo json_encode($data);
    }catch(PDOException $e){
        $data = array(
            "status" => "error",
        );

        echo json_encode($data);
    }
});


$app->post("/_review/insert",function ($request, $response, array $args) {
    $input = $request->getParams();
    try{
        $db = new Db();
        $sql = "INSERT INTO _REVIEW(review_id, user_review, rating, book_id, user_id) 
                VALUES(?,?,?,?,?)";
        $db = $db->connect();
        $stmt = $db->prepare($sql);    
        $data = $stmt->execute([getId(), $input['user_review'], $input['rating'], $input['book_id'], $input['user_id']]);

        if($data){
            $data = array(
                "status" => "success",
            );
        } else{
            $data = array(
                "status" => "error",
            );
        }

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
    $userid1 = substr(str_shuffle($str1), 0, 7);
    $userid2 = substr(str_shuffle($str2), 0, 5);
    $userid3 = substr(str_shuffle($str3), 0, 1);
    $userid4 = substr(str_shuffle($str3), 0, 5);

    return $userid3 . $userid1 . "_" . $userid2 . "_" . $userid4;
}


//////////////////////////////////// USEFUL FUNCTIONS //////////////////////////////////////////////

















//////////////////////////////////// LEGACY CODE START //////////////////////////////////////////////


// $app->get('/details[/{book_id}[/{user_id}]]', function ($request, $response, $args) {
//     // responds to `/news`, `/news/2016` and `/news/2016/03`

//     return $response;
// });



// $app->get('/_review/book/{id}', function ($request, $response, $args) {
//         $id = $args['id'];
//     try {

//         $db = new Db();
//         $data = $db->getBookReviews($id);

//         all

//         echo json_encode($allData);

//     } catch (PDOException $e) {
//         $data = array(
//             "status" => "error",
//         );

//         echo json_encode($data);
//     }
// });

//////////////////////////////////// LEGACY CODE END //////////////////////////////////////////////
