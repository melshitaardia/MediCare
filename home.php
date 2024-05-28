<?php
include 'database.php';
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;


if (isset($_POST['logout'])) {
    session_unset();

    session_destroy();

    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="logout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="linear-grad">
        <?php
        include 'navbar.php';
        ob_end_flush();
        ?>

        <div class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 pb-3">
                        <div class="intro-excerpt">
                            <h1><img src="images\logo1.png">
                                <span class="warmtalks-text">MediCare</span>
                            </h1>
                            <h4>Welcome, <span class="warmtalks-text"><?php echo $username; ?>!</span></h4>
                            <p class="section1 mb-4">Selamat datang di Medicare, tempat Anda mendapatkan
                                layanan kesehatan terbaik dari para profesional. Di Medicare,
                                kami berkomitmen untuk menyediakan konsultasi kesehatan yang aman,
                                dan terpercaya. Dapatkan nasihat dari dokter ahli kami dan mulai perjalanan
                                kesehatan Anda dengan langkah yang tepat
                            </p>
                            <p><a href="articles.php" class="btn btn-home">Get Started</a>
                                <a href="aboutus.php" class="btn btn-home">Explore</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="img-wrap">
                            <img src="images/home/home1.png" class="img-fluid" alt="Responsive Image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="section3-section">
        <div class="inner-container container">
            <div class="row flex-wrap-reverse justify-content-between align-items-center">
                <div class="col-md-4 p-5 inner position-relative">
                    <img src="images/home/faqs.png" class="img-fluid" width="350px" alt="Left Image">
                    <div class="section-title1 pt-2 pb-1">Q : Apa itu Medicare?<br><br>
                        <div class="section-title2 pb-2">A: Platform layanan kesehatan.
                        </div>
                    </div>
                    <p>
                    <div class="button-container pt-1">
                        <a href="faq.php" class="btn btn-read-more">Read More</a>
                    </div>
                    </p>
                </div>
                <div class="col-md-7">
                    <div class="image-container position-relative">
                        <img src="images/home/chatting.png" class="img-fluid" width="800px" alt="Right Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="radial-grad testimonial-section">
        <div class="container">
            <div class="row">
            </div>
            <div class="testimonial-block text-center">
                <blockquote class="mt-2 pt-5 mb-3">
                    <p>&ldquo;Kesehatan adalah kekayaan sejati yang tak ternilai harganya.&rdquo;</p>
                </blockquote>
                <div class="col-lg-7 mx-auto text-lg-end pt-4 pb-5">
                    <h2 class="section-title">~ MediCare</h2>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-section">
        <div class="container relative">
            <div class="rows g-5 mb-5">
                <div class="col-lg-4 col-md-3">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">MediCare<span>.</span></a>
                    </div>
                    <p class="mb-4">byMediCare@gmail.com</p>
                    <p class="mb-4">+628XXXXXXXXXXXX</p>
                    <p class="mb-4">@MediCare</p>
                    </p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8 col-md-9">
                    <div class="row links-wrap d-flex justify-content-end">

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="consultation.php">Consultation</a></li>
                                <li><a href="articles.php">Articles</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="aboutus.php">About Us</a></li>
                                <li><a href="faq.php">FAQ</a></li>
                            </ul>
                        </div>

                        <!-- <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="aboutus.php">FAQ</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>


            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Bridging Hearts, Healing Minds
                            &hearts;</a>

                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>