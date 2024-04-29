<?php

$key = bin2hex(random_bytes(64));
$token = hash_hmac('sha256', 'this is for account', $key);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking System - Login</title>
    <?php include "layout/header.php" ?>

</head>

<body>
    <div class="container d-block d-md-flex mx-auto mt-5 shadow-sm rounded-3">
        <div class="title p-5 text-center align-self-center login-section">
            <h2>
                Welcome to
                <span class="fw-bold">De Exito Events and Catering Services</span>
            </h2>
            <p>Get your reservations now.</p>
            <a href="signup.php" class="text-decoration-none text-white rounded-5 px-3 py-1 text-uppercase button-bg">Sign up</a>
        </div>
        <div class="form p-5 login-section">
            <h1 class="text-center fw-bold">Login Account</h1>
            <form method="post" class="d-block mx-auto mt-5" id="login_form">
                <input type="hidden" name="csrfToken" value="<?php echo $token; ?>" />
                <input type="hidden" name="key" value="<?php echo $key; ?>" />
                <div>
                    <label for="email">Email <span class="red">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" />
                </div>
                <div class="mt-3">
                    <label for="password">Password <span class="red">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>
                <button type="submit" class="btn btn-sm mt-3 d-block mx-auto text-white rounded-5 px-3 py-1 text-uppercase button-bg">
                    Log in
                </button>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#login_form").submit(function(e) {
            e.preventDefault();
            var login_data = $(this).serialize();

            const Toast = Swal.mixin({
                toast: true,
                position: center,
                customClass: {
                    popup: "colored-toast",
                },
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            });

            $.ajax({
                type: "POST",
                url: "login.php",
                data: login_data,
                success: function(response) {
                    switch (response) {
                        case "valid":
                            // login
                            Toast.fire({
                                icon: "success",
                                title: "Welcome!",
                                text: "Loggin in...",
                            }).then(() => {
                                window.location = "home.php";
                            });
                            break;
                        case "admin":
                            // login
                            Toast.fire({
                                icon: "success",
                                title: "Welcome Admin!",
                                text: "Loggin in...",
                            }).then(() => {
                                window.location = "admin.php";
                            });
                            break;
                        case "unknown":
                            Toast.fire({
                                icon: "error",
                                title: "Unknown user",
                                text: "Please try again...",
                            }).then(() => {
                                window.location = "index.php";
                            });
                            break;
                        case "notfound":
                            // no user found
                            Toast.fire({
                                icon: "error",
                                title: "No user found",
                                text: "Please try again...",
                            }).then(() => {
                                window.location = "index.php";
                            });
                            break;
                        case "deleted":
                            // no user found
                            Toast.fire({
                                icon: "error",
                                title: "The account that you're trying to login is already deleted",
                                text: "Create an account again",
                            }).then(() => {
                                window.location = "index.php";
                            });
                            break;
                        case "invalidcsrf":
                            // no csrf
                            Toast.fire({
                                icon: "error",
                                title: "Invalid Token",
                                text: "Please try again...",
                            }).then(() => {
                                window.location = "index.php";
                            });
                            break;
                        default:
                            // error
                            Toast.fire({
                                icon: "error",
                                title: "Something went wrong",
                                text: "Please try again...",
                                showConfirmButton: false,
                            });
                    }
                },
            });
        });
    });
</script>

</html>