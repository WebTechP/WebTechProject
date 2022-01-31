<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Regsiter &mdash;</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/index.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">


</head>

<body class="register-page">


    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-3 mb-4 bg-body rounded">
        <div class="container-lg justify-content-center">
            <!-- <div class='row row-cols-auto'> -->
            <div class='col'>
                <a class="navbar-brand" href="#">ReBook</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            <div class='col '>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-sm me-4 btn-outline-secondary" href='https://afternoon-forest-36865.herokuapp.com/index' type="button">Home</a>
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
                        <a class="btn btn-sm me-4 btn-outline-secondary" href='https://afternoon-forest-36865.herokuapp.com/login' type="button">Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm me-4 btn-outline-secondary active" href='https://afternoon-forest-36865.herokuapp.com/register' type="button">Sign up</a>
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

    <section class="h-100">
        <div class="container ">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper mt-4">
                    <div class="card fat">
                        <div class="card-body ">
                            <h4 class="card-title">Register</h4>
                            <form method="GET" class="my-login-validation" novalidate="">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input id="firstName" type="text" class="form-control" name="firstname" required autofocus>
                                    <div class="invalid-feedback">
                                        What's your First name?
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="name">Last Name</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" required autofocus>
                                    <div class="invalid-feedback">
                                        What's your last name?
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="name">Age</label>
                                    <input id="name" type="number" class="form-control" name="age" required autofocus>
                                    <div class="invalid-feedback">
                                        What's your last name?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        Your email address is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <div class="form-group m-0 mt-2">
                                    <button type="submit" class="btn btn-primary ">
                                        Regsiter
                                    </button>
                                    <div class="mt-4 text-center">
                                        Already have an account? <a href="/login">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <footer>
        <div class="bottom section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright">
                            Copyright &copy;
                            2022 All rights reserved | This System is made with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                            </svg> by web Team
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/jQuery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="assets/js/register.js"></script>
</body>

</html>