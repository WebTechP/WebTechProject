<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/index.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">

    <title>Book Details</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-3 mb-4 bg-body rounded">
        <div class="container-lg justify-content-center">
            <!-- <div class='row row-cols-auto'> -->
            <div class='col'>
                <a class="navbar-brand" href="#">ReBook</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            <div class='col '>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-sm me-4 btn-outline-secondary" href='http://localhost:8008/index'
                                type="button">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm me-4 btn-outline-secondary" type="button">About</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class='col '>
                <ul class="navbar-nav me-toggle ">
                    <li class="nav-item">
                        <a class="btn btn-sm me-4 btn-outline-secondary" href='http://localhost:8008/login'
                            type="button">Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm me-4 btn-outline-secondary" href='http://localhost:8008/register'
                            type="button">Sign up</a>
                    </li>
                </ul>
            </div>
            <div class='col-5'>
                <!-- <div class='container-sm justify-content-end'> -->
                <form class="d-flex p-1 ">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary btn-cirle" type="submit">Search</button>
                </form>
                <!-- </div> -->
            </div>
            <!-- </div> -->
        </div>
    </nav>
    <div class="main center">
        <div class="container" id='book_details'>


        </div>
    </div>

    <div id="demo"></div>

    <br>
    <br>
    <footer>
        <div class="bottom section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright">
                            Copyright &copy;
                            2022 All rights reserved | This System is made with <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                            </svg> by web Team
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../../assets/js/jQuery.js"></script>

    <script languge='javascript' src='../../assets/js/details.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!-- <scirpt src='assets/js/de.js'></scirpt> -->
</body>

</html>