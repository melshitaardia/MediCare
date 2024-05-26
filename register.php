<?php
session_start(); 
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($fullname) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
    } else {
        $mysqli = connectDB();
        $sql = "SELECT * FROM akun WHERE username='$username'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Username already exists.";
        } else {
            $sql = "INSERT INTO akun (fullname, username, password) VALUES ('$fullname', '$username', '$password')";
            if ($mysqli->query($sql) === TRUE) {
                echo "<script>alert('Congratulations! Your account has been created.'); 
                window.location.href = 'login.php';</script>";
                exit;
            } else {
                $_SESSION['error'] = "Error: " . $sql . "<br>" . $mysqli->error;
            }
        }

        $mysqli->close();
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="info-panel">
            <div class="brand">
                <img src="images/logoo.png" class="logo-image">
            </div>
            <h1>Your Wellness <br>Journey <br>Starts Here,<br>Expertise You <br>Can Trust!</h1>
        </div>
        <div class="form-panel">
            <form id="registerForm" method="POST" action="">
                <h2>Create Account</h2>
                <div class="input-container" style="margin-top: 15px;">
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                </div>
                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert" role="alert">
                        <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']); 
                        ?>
                    </div>
                <?php endif; ?>
                <button type="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php">Log In</a></p>
            </form>
            <img src="images/element.png" class="element-image">
        </div>
    </div>
</body>
</html>
