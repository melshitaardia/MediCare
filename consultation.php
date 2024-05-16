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