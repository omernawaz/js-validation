<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src = './js/index.js' defer></script>
    <script src = './js/theme.js' defer></script>
    <script src = './js/modal.js' defer></script>

    <link type="text/css" rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">
    
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark">

        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#"><b>SignUp</b></a>
                </li>
                <li class="nav-item">
                <button type="button" id = 'themetoggle' class="btn btn-light">Switch To Light</button>
                </li>
            </ul>
        </div>

    </nav>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thank you for signing up</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    You'll be redirected to the dashboard in 5 seconds...
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Redirect Now</button>
                </div>

            </div>
        </div>
    </div>

    <div class = 'container d-flex flex-column align-items-center'>
        <div class="card mb-3 mt-3 w-50">
            <form action='#' id = 'signupform'>
                <div class="mb-3 mt-5 ps-5 pe-5 ms-5 me-5">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    <div class="invalid-feedback" id="email-feedback">Please enter a password!</div>
                </div>

                <div class="mb-3 mt-3 ps-5 pe-5 ms-5 me-5">
                    <label for="firstname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname">
                    <div class="invalid-feedback" id="firstname-feedback">Please enter a password!</div>
                    
                </div>

                <div class="mb-3 mt-3 ps-5 pe-5 ms-5 me-5">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter last name" name="lastname">
                    <div class="invalid-feedback" id="lastname-feedback">Please enter a password!</div>

                </div>

                <div class="mb-3 mt-3 ps-5 pe-5 ms-5 me-5">
                    <label for="age" class="form-label">Age:</label>
                    <input type="text" class="form-control" id="age" placeholder="Enter age" name="age">
                    <div class="invalid-feedback" id="age-feedback">Please enter a password!</div>

                </div>


                <div class="mb-3 mt-3 ps-5 pe-5 ms-5 me-5">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    <div class="invalid-feedback" id="pwd-feedback">Please enter a password!</div>

                </div>

                <div class="mb-5 mt-3 ps-5 pe-5 ms-5 me-5">
                    <label for="pwd_confirm" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="pwd_confirm" placeholder="Re-enter password" name="pwd_confirm">
                    <div class="invalid-feedback" id="pwd_confirm-feedback">Please enter a password!</div>

                </div>

                <input type ='submit' class = 'btn btn-primary form-control' value = 'Submit'>

            </form>
        </div>
    </div>
</body>
</html>