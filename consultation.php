<?php
include 'database.php';

session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'insert') {
            $str = $_POST['str'];
            $username = $_POST['username'];
            $biaya = $_POST['biaya'];
            $tanggal = $_POST['tanggal'];
            $waktu = $_POST['waktu'];

            $conn = connectDB();

            $stmt = $conn->prepare("INSERT INTO pemesanan (str, pasien, biaya, tanggal, waktu) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssss", $str, $username, $biaya, $tanggal, $waktu);
                if ($stmt->execute()) {
                    $insertedId = $conn->insert_id;
                    echo "<script> var insertedId = $insertedId;</script>";
                    echo "<script> var dana = '$biaya';</script>";
                    echo "<script>
                            var serviceCharge = '3.500';
                            var totalPayment = (parseInt(dana.replace(/\./g, '')) + parseInt(serviceCharge.replace('.', ''))).toLocaleString('id-ID');
                          </script>";
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('insertedId').textContent = insertedId;
                                document.getElementById('balanceAmount').textContent = 'Rp. ' + dana;
                                document.getElementById('totalPayment').textContent = 'Rp. ' + totalPayment;
                                var myModal = new bootstrap.Modal(document.getElementById('paymentModal'), {
                                    backdrop: 'static'
                                });
                                myModal.show();
                            });
                          </script>";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        } elseif ($_POST['action'] == 'payment') {
            $totalPayment = $_POST['totalPayment'];
            $id_pemesanan = $_POST['id_pemesanan'];
            $username = $_POST['username'];
            $metode_bayar = $_POST['metode_bayar'];

            $conn = connectDB();

            $stmt = $conn->prepare("INSERT INTO pembayaran (total, id_pemesanan, username, metode_bayar) VALUES (?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssss", $totalPayment, $id_pemesanan, $username, $metode_bayar);
                if ($stmt->execute()) {
                    echo "<script>
                        alert('Pembayaran sukses.');
                        setTimeout(function() {
                            window.location.href = 'home.php';
                        }, 500);
                      </script>";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        } elseif ($_POST['action'] == 'logout') {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit;
        }
    }
}

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
            height: 400px;
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
                            <?php if ($username) : ?>
                                <li>
                                    <form method="POST" action="">
                                        <input type="hidden" name="action" value="logout">
                                        <button type="submit" name="logout" class="btn btnlogin">Sign Out</button>
                                    </form>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="login.php" class="btn btnlogin">Login</a>
                                </li>
                            <?php endif; ?>
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
                            <img src="images/consultation.png" class="img-fluid" width="400px" style="margin-right: 80px; 
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
        <?php if ($username) : ?>
            <div class="history-container table-responsive px-5 pb-2">
                <h2>History Data</h2>
                <table class="table align-items-center justify-content-center mb-0 table-striped">
                    <thead>
                        <tr>
                            <th>Nama Dokter</th>
                            <th>Dokter </th>
                            <th>Biaya</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Metode Bayar</th>
                        </tr>
                    </thead>
                    <tbody class="history-data"></tbody>
                </table>
            </div>
        <?php endif; ?>

        <div class="modal" id="consultationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consultation Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <input type="hidden" name="action" value="insert">
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
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal" onclick="confirmPayment()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="paymentModal" tabindex="-1" aria-labelledby="paymentLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg rounded-lg modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="row">
                        <div class="col-md-7">
                            <h3>Payment Method ID: <p id="insertedId"></p>
                            </h3>
                            <div class="col-md-12">
                                <input type="radio" class="btn-check" name="options" value="MasterCard" id="mastercard" autocomplete="off">
                                <label class="btn btn-outline-secondary m-1" for="mastercard"><img class="object-fit" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1280px-MasterCard_Logo.svg.png" width="15px" height="10px"></label>
                                <input type="radio" class="btn-check" name="options" value="Visa" id="visa" autocomplete="off">
                                <label class="btn btn-outline-secondary m-1" for="visa"><img class="object-fill" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Visa_Logo.png/640px-Visa_Logo.png" width="15px" height="10px"></label>
                                <input type="radio" class="btn-check" name="options" value="JCB" id="jcb" autocomplete="off">
                                <label class="btn btn-outline-secondary m-1" for="jcb"><img class="object-fit" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/JCB_logo.svg/1280px-JCB_logo.svg.png" width="15px" height="10px"></label>
                                <input type="radio" class="btn-check" name="options" value="Dana" id="dana" autocomplete="off">
                                <label class="btn btn-outline-secondary m-1" for="dana"><img class="object-fit" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" width="15px" height="10px"></label>
                                <input type="radio" class="btn-check" name="options" value="Gopay" id="gopay" autocomplete="off">
                                <label class="btn btn-outline-secondary m-1" for="gopay"><img class="object-fit" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Gopay_logo.svg/2560px-Gopay_logo.svg.png" width="15px" height="10px"></label>
                                <input type="radio" class="btn-check" name="options" value="OVO" id="ovo" autocomplete="off">
                                <label class="btn btn-outline-secondary m-1" for="ovo"><img class="object-fit" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/2560px-Logo_ovo_purple.svg.png" width="15px" height="10px"></label>
                            </div>
                            <div class="pt-4" id="card-details" style="display: none;">
                                <div class="form-group col-md-12">
                                    <label for="biaya" class="form-label">Cardholder Name:</label>
                                    <input type="text" id="cardholderName" class="form-control w-full" placeholder="Cardholder Name"><br>
                                </div>
                                <div class="form-group col-md-12 flex row justify-content-center">
                                    <div class="form-group col-md-5">
                                        <label for="card" class="form-label">Card Number:</label>
                                        <input type="text" id="cardNumber" class="form-control" placeholder="Card Number"><br>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="date" class="form-label">Date:</label>
                                        <input type="date" id="expiryDate" class="form-control" placeholder="Expiry Date"><br>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ccv" class="form-label">CCV:</label>
                                        <input type="text" id="cvv" class="form-control" placeholder="CVV"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group pt-4 col-md-12" id="phone-details" style="display: none;">
                                <label for="phone" class="form-label">Phone Number:</label>
                                <input type="text" id="phoneNumber" class="form-control w-full" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3>Order Summary</h3>
                            <div class="order-summary">
                                <div class="d-flex justify-content-between">
                                    <p>Balance Amount : </p>
                                    <p id="balanceAmount"></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Service Charge :</p>
                                    <p>Rp. 3.500</p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p>Total Payment :</p>
                                    <p id="totalPayment"></p>
                                </div>
                            </div>
                            <form method="post" class="row" action="" onsubmit="return validatePaymentForm();">
                                <input type="hidden" name="action" value="payment">
                                <input type="hidden" class="form-control" id="id_pemesanan" name="id_pemesanan">
                                <input type="hidden" class="form-control" name="metode_bayar" id="metode_bayar">
                                <input type="hidden" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
                                <input type="hidden" class="form-control" name="totalPayment" id="totalPayment">
                                <button class="btn btn-success w-full" type="submit">Confirm Payment</button>
                            </form>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    var username = "<?php echo $username; ?>";
    document.addEventListener('DOMContentLoaded', () => {
        const paymentMethodButtons = document.querySelectorAll('input[name="options"]');
        const cardDetails = document.getElementById('card-details');
        const phoneDetails = document.getElementById('phone-details');
        paymentMethodButtons.forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('metode_bayar').value = button.value;
                if (button.value === 'MasterCard' || button.value === 'Visa' || button.value === 'JCB') {
                    cardDetails.style.display = 'block';
                    phoneDetails.style.display = 'none';
                } else {
                    cardDetails.style.display = 'none';
                    phoneDetails.style.display = 'block';
                }
            });
        });
        document.querySelector('input[name="totalPayment"]').value = totalPayment;
        document.querySelector('input[name="id_pemesanan"]').value = insertedId;
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

    function validatePaymentForm() {
    var selectedPaymentMethod = document.querySelector('input[name="options"]:checked');
    if (!selectedPaymentMethod) {
        alert("Pilih metode bayar");
        return false;
    }
    return true;
}

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
            <td>Rp. ${data.total}</td>
            <td>${data.tanggal}</td>
            <td>${data.waktu}</td>
            <td>${data.metode_bayar}</td>
        </tr>
    `;
    }

    function generateCard(card) {
        const bookNowButton = username ? `
        <button class="btn btn-primary card-btn" data-toggle="modal" data-target="#consultationModal">Book Now</button>
        ` : '';
        return `
            <div class="col">
                <div class="card" data-card-data='${JSON.stringify(card)}'>
                    <div class="card-img-container">
                        <img src="${card.img}" class="card-img-top" alt="${card.nama}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${card.nama}</h5>
                        <p class="card-text">
                        Dokter ${card.spesialis}
                        <br />
                        Price: Rp.${card.harga}
                        <br />
                        Alumni: ${card.alumni}
                        <br />
                        Practice: ${card.praktik}
                        <br />
                        STR: ${card.str}
                        </p>
                        ${bookNowButton}
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