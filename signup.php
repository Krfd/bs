<?php

$key = bin2hex(random_bytes(64));
$token = hash_hmac('sha256', 'this is for signup', $key);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking System - Signup</title>
    <?php include "layout/header.php" ?>

</head>

<body>
    <div class="container d-block d-md-flex mx-auto mt-5 shadow-sm rounded-3">
        <div class="title p-5 text-center align-self-center login-section">
            <h2 class="fw-bold">Hello, friend!</h2>
            <p>
                To create an account, enter your personal details and start
                your journey with us.
            </p>
            <a href="index.php" class="text-decoration-none text-white rounded-5 px-3 py-1 text-uppercase button-bg">Sign in</a>
        </div>
        <div class="form p-5 login-section">
            <h1 class="text-center fw-bold">Create Account</h1>
            <form method="post" class="d-block mx-auto mt-5" id="signup">
                <input type="hidden" name="csrfToken" value="<?php echo $token; ?>" />
                <input type="hidden" name="key" value="<?php echo $key; ?>" />
                <div>
                    <label for="name">Name <span class="red">*</span></label>
                    <input type="name" class="form-control" name="name" id="name" />
                </div>
                <div>
                    <label for="email">Email <span class="red">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" />
                </div>
                <div class="mt-3">
                    <label for="password">Password <span class="red">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>
                <div class="mt-3">
                    <label for="confirm">Confirm Password<span class="red">*</span></label>
                    <input type="password" class="form-control" name="confirm" id="confirm" />
                </div>
                <button type="submit" class="btn btn-sm mt-3 d-block mx-auto text-white rounded-5 px-3 py-1 text-uppercase button-bg">
                    Create Account
                </button>
            </form>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#signup").submit(function(e) {
                e.preventDefault();
                var signup_data = $(this).serialize();

                const Toast = Swal.mixin({
                    toast: true,
                    position: "center",
                    customClass: {
                        popup: "colored-toast",
                    },
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });

                $.ajax({
                    type: "POST",
                    url: "create_account.php",
                    data: signup_data,
                    success: function(response) {
                        switch (response) {
                            case "signup":
                                // login
                                Toast.fire({
                                    icon: "success",
                                    title: "Signed up successfully!",
                                    text: "Redirecting you to login page...",
                                }).then(() => {
                                    window.location = "index.php";
                                });
                                break;
                            case "emailExist":
                                // already registered
                                Toast.fire({
                                    icon: "error",
                                    title: "This email is already registered",
                                }).then(() => {
                                    window.location = "signup.php";
                                });
                                break;
                            case "invalidcsrf":
                                // no csrf
                                Toast.fire({
                                    icon: "error",
                                    title: "Invalid Token",
                                    text: "Please try again...",
                                }).then(() => {
                                    window.location = "signup.php";
                                });
                                break;
                            default:
                                // error
                                Toast.fire({
                                    icon: "error",
                                    title: response,
                                    text: "Please try again...",
                                    showConfirmButton: false,
                                }).then(() => {
                                    window.location = "signup.php";
                                });
                        }
                    },
                });
            });
        });
    </script>
</body>

</html>