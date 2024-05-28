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
    <title>FAQ's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="faq.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">
</head>

<body>
    <div class="linear-grad">
        <?php
        include 'navbar.php';
        ob_end_flush();
        ?>

        <div class="section pt-5">
            <div class="container mt-5 w-full align-items-center">
                <h1 class="title pb-4">Frequently Asked Questions</h1>
                <div class="faq-container align-items-center">
                    <div class="faq-item">
                        <div class="faq-question">Apa itu Medicare?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Medicare adalah platform layanan kesehatan online yang menawarkan konsultasi dengan
                            dokter-dokter terpercaya melalui telemedicine.
                        </p>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">Bagaimana cara menggunakan layanan Consultation?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Anda dapat menggunakan layanan konsultasi kami dengan mendaftar melalui website, memilih
                            dokter yang diinginkan, dan menjadwalkan sesi konsultasi sesuai kebutuhan Anda.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apa yang dimaksud dengan "Articles" di layanan Medicare?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>"Articles" adalah kumpulan artikel kesehatan yang untuk memberikan informasi dan edukasi
                            kesehatan yang bermanfaat bagi pengguna.
                        </p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apakah layanan Medicare bersifat rahasia?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, semua layanan di Medicare menjaga kerahasiaan data dan privasi pasien sesuai dengan
                            standar etika medis dan hukum yang berlaku.
                        </p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apa yang membuat Medicare berbeda dengan platform lainnya?
                        </div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Medicare menawarkan layanan konsultasi yang mudah diakses, dengan dokter-dokter ahli
                            yang berpengalaman dan berkomitmen untuk memberikan pelayanan terbaik.
                        </p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apakah saya perlu membuat janji terlebih dahulu untuk konsultasi?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, untuk memastikan kenyamanan dan ketersediaan waktu dokter, Anda perlu membuat janji
                            melalui sistem penjadwalan kami.
                        </p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apakah ada layanan darurat di Medicare?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right fas-n"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Saat ini, Medicare fokus pada konsultasi yang terjadwal. Untuk keadaan darurat medis, kami sarankan untuk langsung mengunjungi fasilitas medis terdekat atau menghubungi layanan darurat setempat.
                        </p>
                    </div>
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

<script>
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.nextElementSibling;
        const icon = item.querySelector('i');

        item.addEventListener('click', () => {
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    const otherAnswer = otherItem.nextElementSibling;
                    const otherIcon = otherItem.querySelector('i');

                    otherAnswer.classList.remove('active');
                    otherIcon.classList.remove('active');
                    otherAnswer.style.maxHeight = "0";
                }
            });

            answer.classList.toggle('active');
            icon.classList.toggle('active');
            if (answer.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = "0";
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>