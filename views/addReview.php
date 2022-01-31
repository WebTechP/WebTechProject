<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="assets/css/footer.css" rel="stylesheet">

    <title>Add Review</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-3 mb-5 bg-body rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ReBook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-sm me-4 btn-outline-secondary" href='http://localhost:8008/index'
                            type="button">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm me-4 btn-outline-secondary" href='#' type="button">About</a>
                    </li>

                </ul>
                <ul class="navbar-nav me-toggle mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost:8008/">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign Up</a>
                    </li>
                </ul>
                <div class='container-sm justify-content-end'>
                    <div class='row'>
                        <form class="d-flex">
                            <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <section class="h-100">
        <div class="container h-100">
            <div class="row ">
                <h1>Add Your Review</h1>

                <form class="rating">

                    <select class="custom-select custom-select-lg mb-3">
                        <option selected>Select Your Rating</option>
                        <option value="1">Bad</option>
                        <option value="2">Not Good</option>
                        <option value="3">Good</option>
                        <option value="4">Very Good</option>
                        <option value="5">Excellent</option>

                    </select>

                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>


                    <div class="form-group m-0 mt-2">
                        <button type="submit" class="btn btn-primary ">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

    </section>
    <br>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
</body>

</html>