<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
    <?php include("layout/header.php") ?>

</head>

<body>
    <?php include("layout/navbar.php") ?>
    <div class="container-fluid py-5 hero-about">
        <div class="container mt-5 pt-5">
            <h1 class="fw-bold text-white text-center">
                Premier Catering Service
            </h1>
            <div class="text-white mt-5 pt-5 about">
                <h4 class="fw-bold">Who we are?</h4>
                <p class="fw-light">
                    Exito Catering Services and Event Decorators offers a
                    quality service in the field of food industry
                    exclusively in Iloilo. Our fresh and delicious foods
                    gathers a lot of indulging experiences and gains the
                    taste and trust of most Ilonggos.
                </p>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 px-0 px-md-5 d-flex flex-column flex-column-reverse flex-md-row justify-content-center gap-3 gap-md-5">
        <div class="py-3 py-lg-5">
            <img src="./assets/img/cater2.jpg" alt="Cater" class="rounded-1 shadow w-100 d-block mx-auto object-fit-cover" />
        </div>
        <div class="p-5 p-md-3 p-lg-5">
            <h2 class="fw-semibold">Menu</h2>
            <div class="mt-3">
                <i class="fa-solid fa-bowl-food menu-icon"></i>
                <span>Dinner</span>
                <br />
                <small>Top occasion and event of all time. Discover our
                    best deals and packages here.</small>
            </div>
            <div class="mt-3">
                <i class="fa-solid fa-bowl-rice menu-icon"></i>
                <span>Lunch</span>
                <br />
                <small>Experience our afternoon time service for your
                    special events with quality dishes.</small>
            </div>
            <div class="mt-3">
                <i class="fa-solid fa-plate-wheat menu-icon"></i>
                <span>Breakfast</span>
                <br />
                <small>Breakfast dishes are also available in our packages
                    of your choice.</small>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 px-0 px-md-5 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 gap-md-5">
        <div class="p-5 p-md-3 p-lg-5 text-md-center text-lg-end">
            <h2 class="fw-semibold">Schedule an appointment?</h2>
            <div class="mt-3">
                <p>You can set a schedule for a meeting <br> or consultation more information.</p>
                <a href="contact.php" class="text-decoration-none text-white rounded-5 px-3 py-1 text-uppercase button-bg">Contact Us</a>
            </div>
        </div>
        <div class="py-3 py-lg-5">
            <img src="./assets/img/book.jpg" alt="Book a meeting" class="rounded-1 shadow w-100 object-fit-cover" />
        </div>
    </div>
    <div class="py-3 py-md-5 px-0 px-md-5 d-flex flex-column flex-column-reverse flex-md-row justify-content-center align-items-center gap-3 gap-md-5">
        <div class="py-3 py-lg-5">
            <img src="./assets/img/catering.jpg" alt="Cater" class="rounded-1 shadow w-100 object-fit-cover d-block mx-auto" />
        </div>
        <div class="p-5 p-md-3 p-lg-5 text-md-center text-lg-start">
            <h2 class="fw-semibold">Experience the elegant</h2>
            <div class="mt-3">
                <p>With our quality and tasteful dishes, our customers embraces a remarkable feedback from our best tasting and delicious foods here in Iloilo.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <h2 class="fw-bold text-center text-uppercase">What our customers say?</h2>
            <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-5">
                <div class="col-12 col-md-4 mx-auto p-3 p-lg-5 rounded-3 shadow mt-3 mt-lg-0">
                    <div class="person d-block mx-auto mb-3 mt-3 mt-lg-0">
                        <img src="./assets/icons/outline.png" alt="Person" class="person-icon object-fit-cover d-block mx-auto">
                        <div class="text-center mt-3">
                            <span class="fw-bold">Jhune Aligonero Castronuevo</span><br>
                        </div>
                    </div>
                    <p class="text-center lead text-secondary">Excellent catering experience with Exito.</p>
                </div>
                <div class="col-12 col-md-4 mx-auto p-3 p-lg-5 rounded-3 shadow mt-3 mt-lg-0">
                    <div class="person d-block mx-auto mb-3 mt-3 mt-lg-0">
                        <img src="./assets/icons/outline.png" alt="Person" class="person-icon object-fit-cover d-block mx-auto">
                        <div class="text-center mt-3">
                            <span class="fw-bold">Alam Graham</span><br>
                        </div>
                    </div>
                    <p class="text-center lead text-secondary">Reliable, trustworthy, quality service at a fair price. You won't get better experience for the same money.</p>
                </div>
                <div class="col-12 col-md-4 mx-auto p-3 p-lg-5 rounded-3 shadow mt-3 mt-lg-0">
                    <div class="person d-block mx-auto mb-3 mt-3 mt-lg-0">
                        <img src="./assets/icons/outline.png" alt="Person" class="person-icon object-fit-cover d-block mx-auto">
                        <div class="text-center mt-3">
                            <span class="fw-bold">Glenda Glenz Espina</span><br>
                        </div>
                    </div>
                    <p class="text-center lead text-secondary">Thank you Exito Catering Services for catering my son's baptism. Best foods! Best Service! The best! Til' next time.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include("layout/footer.php") ?>
</body>

</html>