<?php

$contactKey = bin2hex(random_bytes(64));
$contactToken = hash_hmac('sha256', 'this is for contact', $contactKey);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>

    <?php include("layout/header.php") ?>
</head>

<body>
    <?php include("layout/navbar.php") ?>
    <div class="container-fluid py-5 my-5">
        <div class="container d-block d-md-flex justify-content-evenly align-items-center">
            <div class="w-50">
                <h1 class="fw-bold display-2">Let's get in touch!</h1>
                <p>For more information just fill out the form below.</p>
                <form method="post" id="contact">
                    <input type="hidden" name="csrfToken" value="<?php echo $contactToken; ?>" />
                    <input type="hidden" name="key" value="<?php echo $contactKey; ?>" />
                    <div class="form-floating">
                        <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Name" required />
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email" required />
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" name="phone" id="phone" class="form-control rounded-0" placeholder="Phone" required />
                        <label for="phone">Phone</label>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-0 mt-3 w-100">
                        Submit
                    </button>
                </form>
            </div>
            <div class="w-50 px-5">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing
                    elit. Consectetur distinctio natus voluptatum quasi quo
                    nesciunt quas minima, a, facilis omnis debitis aliquam
                    laboriosam, repellendus optio!
                </p>
            </div>
        </div>
    </div>
    <?php include("layout/footer.php") ?>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#contact").submit(function(e) {
            e.preventDefault();
            var contact_data = $(this).serialize();

            const Toast = Swal.mixin({
                toast: true,
                position: center,
                cuustomClass: {
                    popup: "colored-toast",
                },
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            });

            $.ajax({
                type: "POST",
                url: "contact_process.php",
                data: contact_data,
                success: function(response) {
                    switch (response) {
                        case "success":
                            // login
                            Toast.fire({
                                icon: "success",
                                title: "Your contact information has been submitted.",
                                text: "",
                            }).then(() => {
                                window.location = "home.php";
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