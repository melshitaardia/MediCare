<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="faq.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">
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

        <div class="section pt-5">
            <div class="container mt-5 w-full align-items-center">
                <h1 class="title pb-4">Frequently Asked Questions</h1>
                <div class="faq-container align-items-center">
                    <div class="faq-item">
                        <div class="faq-question">Apa itu Medicare?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>MediCare adalah platform daring yang didedikasikan untuk mendukung kesejahteraan
                            mental remaja dan keluarga, khususnya bagi mereka yang memiliki keluarga broken home.
                            Kami menyediakan layanan konsultasi, sumber daya, dan informasi untuk membantu Anda
                            memahami dan mengatasi tantangan kesehatan mental.</p>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">Bagaimana cara menggunakan layanan counseling?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Untuk menggunakan layanan counselling, Anda dapat membuat akun dan memilih profesional
                            kesehatan mental yang sesuai dengan kebutuhan Anda. Langsung jadwalkan konsultasi
                            video call dan aman untuk mendiskusikan kekhawatiran atau masalah emosional yang
                            Anda hadapi</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apa yang dimaksud dengan "Explore" di MediCare?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Bagian "Explore" menyediakan informasi terbaru, berita, jurnal dan artikel tentang
                            kesehatan mental bagi keluarga broken home. Temukan wawasan tentang kesehatan mental
                            dan dinamika keluarga yang dapat meningkatkan pemahaman Anda.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Bagaimana Mood Tracker di MediCare dapat membantu saya?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Mood Tracker adalah alat interaktif yang membantu Anda melacak kesejahteraan emosional
                            Anda dari waktu ke waktu. Ini tidak hanya memantau perubahan suasana hati Anda,
                            tetapi juga membuka pintu untuk percakapan lebih bermakna, terutama bagi mereka yang
                            tinggal dalam lingkungan broken home.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apakah layanan MediCare bersifat rahasia?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Kami sangat menghormati privasi Anda. Seluruh layanan, termasuk konsultasi dan
                            informasi yang Anda bagikan, dijaga dengan ketat dan dijamin kerahasiaannya
                            sesuai dengan kebijakan privasi kami.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Apa yang membuat MediCare berbeda dari platform lainnya?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>MediCare tidak hanya menyediakan konsultasi kesehatan mental, tetapi juga merupakan
                            sumber daya lengkap untuk mendukung kesejahteraan keluarga. Dari artikel informatif
                            hingga panduan komunikasi keluarga, kami berusaha memberikan solusi untuk memperkuat
                            hubungan dan kesehatan mental Anda.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Bagaimana cara saya bisa bergabung atau berkontribusi di komunitas
                        MediCare?</div>
                        <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                    </div>
                    <div class="faq-answer">
                        <p>Saat ini, kami belum memiliki fitur komunitas, namun kami selalu terbuka untuk mendengar
                            feedback Anda. Jangan ragu untuk menghubungi kami melalui kontak atau alamat email
                            yang tersedia di situs web kami.</p>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</html>