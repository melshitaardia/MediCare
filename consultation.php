<?php
include 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    insertData($email, $phone_number, $date, $time);
}

function insertData($email, $phone_number, $date, $time){
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
    <style>
        /* Add your CSS styles here */
    </style>
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
</body>
</html>