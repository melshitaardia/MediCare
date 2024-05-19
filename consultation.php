<?php
include 'database.php';

session_start();
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str = $_POST['str'];
    $username = $_POST['username'];
    $biaya = $_POST['biaya'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];

    $conn = connectDB();

    $sql = "INSERT INTO pemesanan (str, pasien, biaya, tanggal, waktu) VALUES ('$str', '$username', '$biaya', '$tanggal', '$waktu')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil disimpan.')</script>";
        header("Location: home.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .section {
            padding-left: 0;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding-top: 30px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            position: relative;
            width: 250px;
            height: 370px;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-container {
            width: 100px;
            height: 100px;
            border-radius: 20px;
            overflow: hidden;
            margin: 0 auto;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            max-height: 200px;
            object-fit: cover;
            object-position: center;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #555;
            text-align: justify;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 0.9rem;
            padding: 8px 16px;
        }

        .btn-primary:hover {
            border-color: #0056b3;
        }

        .card-container {
            display: flex;
            justify-content: center;
            overflow-x: hidden;
            overflow-y: auto;
            white-space: nowrap;
            margin-bottom: 20px;
        }

        .card-container .row {
            margin-right: -10px;
            margin-left: -10px;
        }

        .card-container .col {
            flex: 0 0 auto;
            width: auto;
            padding-right: 10px;
            padding-left: 10px;
        }

        .card-container .col:last-child {
            margin-right: 0;
        }

        .card-navigation-btns {
            margin-top: 10px;
        }

        .prev-btn,
        .next-btn {
            position: absolute;
            top: 75%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }
    </style>


</head>

<body>
    <div class="linear-grad">
        <div class="p-3 navbarbar">
            <nav class="custom-navbar navbar navbar navbar-expand-lg navbar-dark bg-dark" arial-label="Warmtalks navigation bar">
                <div class="container">
                    <img src="images\logo1.png" class="logo">
                    <a class="navbar-brand" href="home.php">MediCare<span>.</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsWarmtalks" aria-controls="navbarsWarmtalks" aria-expanded="false" aria-label="Toggle navigation">
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
                            <h1>
                                <span class="warmtalks-text">Concerned about your Health? Let us help you</span>
                            </h1>
                            <ul class="section1 mt-5">
                                <li>Easily accesable from home, saving time and travel hassle</li>
                                <li>Easily accesable from home, saving time and travel hassle</li>
                                <li>Easily accesable from home, saving time and travel hassle</li>
                            </ul>
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
            <div class="card-container mt-3 item-center">
                <div class="row pt-4">
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary prev-btn pr-3"><i class="fa fa-arrow-left"></i></button>
                <button class="btn btn-primary next-btn pl-3"><i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="history-container mt-3">
            <h2>History Data</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Biaya</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody class="history-data"></tbody>
            </table>
        </div>

        <div class="modal" id="consultationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consultation Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="str" class="form-label">STR:</label>
                                <input type="text" class="form-control" id="str" name="str" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="str" class="form-label">Pasien:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="biaya" class="form-label">Biaya:</label>
                                <input type="text" class="form-control" id="biaya" name="biaya" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu:</label>
                                <input type="time" class="form-control" id="waktu" name="waktu" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('riwayat.php')
            .then(response => response.json())
            .then(historyData => {
                renderHistoryData(historyData);
            })
            .catch(error => console.error('Error fetching history data:', error));
        fetch('doctor.php')
            .then(response => response.json())
            .then(data => {
                renderCards(data.slice(0, 4));

                const prevBtn = document.querySelector('.prev-btn');
                const nextBtn = document.querySelector('.next-btn');
                let currentPage = 0;

                prevBtn.addEventListener('click', () => {
                    if (currentPage > 0) {
                        currentPage--;
                        renderCards(data.slice(currentPage * 4, (currentPage + 1) * 4));
                    }
                });

                nextBtn.addEventListener('click', () => {
                    if ((currentPage + 1) * 4 < data.length) {
                        currentPage++;
                        renderCards(data.slice(currentPage * 4, (currentPage + 1) * 4));
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('card-btn')) {
                const targetCard = event.target.closest('.card');
                if (targetCard) {
                    const cardData = JSON.parse(targetCard.dataset.cardData);
                    const str = cardData.str;
                    const biaya = cardData.harga;
                    const tanggal = document.getElementById('tanggal').value;
                    const waktu = document.getElementById('waktu').value;

                    document.getElementById('str').value = str;
                    document.getElementById('biaya').value = biaya;
                    document.getElementById('tanggal').value = tanggal;
                    document.getElementById('waktu').value = waktu;

                    // Set username from session
                    const username = "<?php echo $username; ?>";
                    document.getElementById('username').value = username;

                    const myModal = new bootstrap.Modal(document.getElementById('consultationModal'), {
                        backdrop: 'static'
                    });
                    console.log(myModal);
                    myModal.show();
                }
            }
        });
    });

    function renderHistoryData(historyData) {
        const historyContainer = document.querySelector('.history-container .history-data');
        historyContainer.innerHTML = '';

        historyData.forEach(data => {
            const historyHtml = generateHistoryEntry(data);
            historyContainer.innerHTML += historyHtml;
        });
    }

    function generateHistoryEntry(data) {
        return `
        <tr>
            <td>Dr. ${data.nama}</td>
            <td>${data.spesialis}</td>
            <td>Rp. ${data.biaya}</td>
            <td>${data.tanggal}</td>
            <td>${data.waktu}</td>
        </tr>
    `;
    }

    function generateCard(card) {
        return `
            <div class="col">
                <div class="card" data-card-data='${JSON.stringify(card)}'>
                    <div class="card-img-container">
                        <img src="${card.img}" class="card-img-top" alt="${card.nama}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${card.nama}</h5>
                        <p class="card-text">Price: Rp.${card.harga}
                        <br />
                        Spesialis: ${card.spesialis}
                        <br />
                        Alumni: ${card.alumni}
                        <br />
                        Practice: ${card.praktik}
                        <br />
                        STR: ${card.str}
                        </p>
                        <button class="btn btn-primary card-btn" data-toggle="modal" data-target="#consultationModal">Book Now</button>
                    </div>
                </div>
            </div>
        `;
    }

    function renderCards(cards) {
        const cardsContainer = document.querySelector('.card-container .row');
        cardsContainer.innerHTML = '';
        cards.forEach(card => {
            const cardHtml = generateCard(card);
            cardsContainer.innerHTML += cardHtml;
        });
    }
</script>

</html>