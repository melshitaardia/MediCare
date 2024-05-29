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
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="linear-grad">
        <?php
        include 'navbar.php';
        ob_end_flush();
        ?>

        <div class="section"> <!-- kasih id=" " -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto text-center pt-2 pb-3"> <!-- max pt 5 -->
                        <h1 class="title">Who We Are</h1>
                    </div>
                </div>
                <div class="testimonial-block text-center mb-5">
                    <p>Medicare adalah platform kesehatan inovatif yang bertujuan untuk memberikan akses
                        mudah dan <br>terpercaya kepada layanan kesehatan berkualitas. Kami memahami betapa
                        pentingnya kesehatan bagi <br>setiap individu, oleh karena itu kami berkomitmen untuk
                        menyediakan solusi kesehatan yang praktis dan <br>efektif melalui teknologi telemedicine.
                    </p>
                </div>
            </div>
            <div class="text-center">
                <p><a href="#cuaboutus" class="btn btn-white-outline mb-5">Contact Us</a>
                </p>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <div class="row justify-content-evenly">
                <h1 class="section-title text-center pt-3 pb-5">Meet Our Team</h1>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <img class="img-fluid" src="images/aboutus/fianka.jpg">
                        </div>
                        <div class="team-content">
                            <h5 class="name">Fatmah Fianka S</h5>
                        </div>
                        <ul class="social">
                            <li><a href="https://instagram.com/fiankasy?igshid=YTQwZjQ0NmI0OA%3D%3D&utm_source=qr" class="fa fa-instagram" aria-hidden="true"></a></li>
                            <li><a href="https://www.linkedin.com/in/fatmah-fianka-972b63296?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="fa fa-linkedin" aria-hidden="true"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <img class="img-fluid" src="images/aboutus/melshi.jpeg">
                        </div>
                        <div class="team-content">
                            <h5 class="name">Melshita Ardia K</h5>
                        </div>
                        <ul class="social">
                            <li><a href="https://instagram.com/_simell?igshid=MzMyNGUyNmU2YQ%3D%3D&utm_source=qr" class="fa fa-instagram" aria-hidden="true"></a></li>
                            <li><a href="https://www.linkedin.com/in/melshitaardiakirana?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="fa fa-linkedin" aria-hidden="true"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <img class="img-fluid" src="images/aboutus/raisha.JPG">
                        </div>
                        <div class="team-content">
                            <h5 class="name">Raisha Isma A</h5>
                        </div>
                        <ul class="social">
                            <li><a href="https://instagram.com/raishaiaa/" class="fa fa-instagram" aria-hidden="true"></a></li>
                            <li><a href="https://www.linkedin.com/in/raisha-isma-aulia-78212628b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="fa fa-linkedin" aria-hidden="true"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="radial-grad section2-section">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    <div class="col-lg-5 pb-5">
                        <h1 class="whatwedo ml-auto text-center mb-0">What <span class="d-lg-block"> We <span class="d-lg-block"> Do </span>
                        </h1>
                    </div>

                    <div class="col-lg-6">
                        <div class="row my-5">
                            <div class="col-6 col-md-6">
                                <div class="smallbg p-2 feature">
                                    <div class="icon">
                                        <img src="images/aboutus/doctor.png" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Konsultasi Online</h3>
                                    <p>Konsultasi dengan dokter ahli kapan saja dan di mana saja melalui video call atau chat.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="smallbg p-2 feature">
                                    <div class="icon">
                                        <img src="images/aboutus/monitor.png" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Jadwalkan Konsultasi</h3>
                                    <p>Jadwalkan sesi konsultasi dengan dokter pilihan Anda sesuai waktu yang nyaman.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="smallbg p-2 feature">
                                    <div class="icon">
                                        <img src="images/aboutus/medical.png" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Informasi Kesehatan</h3>
                                    <p>Artikel tentang berbagai topik kesehatan penting yang ditulis oleh profesional medis.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="smallbg p-2 feature">
                                    <div class="icon">
                                        <img src="images/aboutus/tool.png" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Panduan Kesehatan</h3>
                                    <p>Panduan praktis untuk menerapkan gaya hidup sehat, mencakup nutrisi, olahraga, dan kesehatan mental.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-section" id="cuaboutus">
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