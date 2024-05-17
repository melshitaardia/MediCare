<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    insertData($email, $phone_number, $date, $time);
}

function insertData($email, $phone_number, $date, $time)
{
    $mysqli = connectDB();

    $stmt = $mysqli->prepare("INSERT INTO consultation (email, phone_number, date, time) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $email, $phone_number, $date, $time);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();

    $mysqli->close();
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
        .btnlogin {
            background: #E03F51;
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
            height: 300px;
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
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #555;
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
            background-color: #0056b3;
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

        <h2>Post Form</h2>
        <form method="post" action="">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="phone_number">Phone Number:</label><br>
            <input type="tel" id="phone_number" name="phone_number" required><br>

            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br>

            <label for="time">Time:</label><br>
            <input type="time" id="time" name="time" required><br><br>

            <input type="submit" value="Submit">
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
    
    const cardsData = [{
            image: 'https://via.placeholder.com/300',
            title: 'Card 1',
            description: 'Description for card 1'
        },
        {
            image: 'https://via.placeholder.com/300',
            title: 'Card 2',
            description: 'Description for card 2'
        },
        {
            image: 'https://via.placeholder.com/300',
            title: 'Card 3',
            description: 'Description for card 3'
        },
        {
            image: 'https://via.placeholder.com/300',
            title: 'Card 4',
            description: 'Description for card 4'
        },
        {
            image: 'https://via.placeholder.com/300',
            title: 'Card 5',
            description: 'Description for card 5'
        },
        {
            image: 'https://via.placeholder.com/300',
            title: 'Card 6',
            description: 'Description for card 6'
        }
    ];

    function generateCard(card) {
        return `
                <div class="col">
                    <div class="card">
                        <div class="card-img-container"> <!-- Container for the image -->
                            <img src="${card.image}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${card.title}</h5>
                            <p class="card-text">${card.description}</p>
                            <button class="btn btn-primary">Button</button>
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

    renderCards(cardsData.slice(0, 4));

    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentPage = 0;

    prevBtn.addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--;
            renderCards(cardsData.slice(currentPage * 4, (currentPage + 1) * 4));
        }
    });

    nextBtn.addEventListener('click', () => {
        if ((currentPage + 1) * 4 < cardsData.length) {
            currentPage++;
            renderCards(cardsData.slice(currentPage * 4, (currentPage + 1) * 4));
        }
    });
</script>

</html>