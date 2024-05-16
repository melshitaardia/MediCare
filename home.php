<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="logout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="linear-grad">
        <div class="p-3 navbarbar">
            <nav class="custom-navbar navbar navbar navbar-expand-lg navbar-dark bg-dark"
                arial-label="Warmtalks navigation bar">
                <div class="container">
                    <img src="images\logo1.png" class="logo">
                    <a class="navbar-brand" href="home.php">MediCare<span>.</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsWarmtalks" aria-controls="navbarsWarmtalks" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars" style="color: #8b4513;"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsWarmtalks">
                        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link" href="consultation.php">Consultation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="articles.php">Articles</a>
                            </li> 
                            <li><a class="nav-link" href="aboutus.php">About Us</a></li>
                            <li><a class="nav-link" href="faq.php">FAQ</a></li>
                        </ul>
                        <ul class="custom-navbar-cta navbar-nav ms-auto mb-2 mb-md-0">
                            <!-- <li><a class="btn btnlogin" href="login.php">Sign In</a></li> -->
                            
                        <li>
                        <form method="POST" action="logout.php">
                            <button type="submit" name="logout" class="btn btnlogin">Sign Out</button>
                        </form>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 pb-3">
                        <div class="intro-excerpt">
                            <h1><img src="images\logo1.png" >
                                <span class="warmtalks-text">MediCare</span>
                            </h1>
                            <h4>Welcome, <span class="warmtalks-text"><?php echo $username; ?>!</span></h4>
                            <p class="section1 mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!</p>
                            <p><a href="#discoverus" class="btn btn-secondary me-2">Get Started</a>
                                <a href="explore.php" class="btn btn-white-outline">Explore</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="img-wrap">
                            <img src="images/home/doctors.PNG" class="img-fluid" width="400px" style="margin-right: 80px; 
                            margin-top: -30px; margin-left: -70px" alt="Responsive Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section2-section" id="discoverus">
        <div class="inner-container container">
            <div class="row flex-wrap-reverse justify-content-between align-items-center">
                <div class="col-lg-6 inner">
                    <h2 class="section-title ">Discover Us</h2>
                    <p></p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/home/fitur/medical.png" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Warmtalks Connect</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/home/fitur/stethoscope.png" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Pustaka Sumber Daya</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/home/fitur/pharmacist.png" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Tetap Terinformasi dan Terinspirasi</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/home/fitur/checkup.png" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Personalized Mood Tracker</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 pb-5">
                    <div class="intro-excerpt">
                        <h1>"<span class="warmtalks-text">MediCare</span>: Bridging Hearts, Healing Minds"
                        </h1>
                        <p class="section1 mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed accusamus aliquid 
                                    iusto dignissimos iure fugit minus totam, labore neque rem maxime tenetur? 
                                    Non a, harum pariatur eligendi perspiciatis maxime numquam!
                        </p>
                        <p><a href="aboutus.php" class="btn btn-secondary me-2">Learn More</a>
                        </p>
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
                <blockquote class="mb-5">
                    <p>&ldquo;Hidup bukanlah tentang menunggu badai berlalu, tapi belajar bagaimana menari
                        di bawah hujan&rdquo;</p>
                </blockquote>
                <div class="col-lg-7 mx-auto text-lg-end pt-5 pb-5">
                    <h2 class="section-title">~ MediCare</h2>
                </div>
            </div>
        </div>
    </div>
    <form class="logout-form" method="POST" action="">
        <button type="submit" name="logout" value="Logout">Sign Out</button>
    </form>

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
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8 col-md-9">
                    <div class="row links-wrap d-flex justify-content-end">

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="counseling.php">Consultation</a></li>
                                <!-- <li><a href="topics.php">Articles</a></li> -->
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="explore.php">Articles</a></li>
                                <!-- <li><a href="faq.php">FAQ</a></li> -->
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="aboutus.php">FAQ</a></li>
                            </ul>
                        </div>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</html>
