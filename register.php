<?php
session_start(); 
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $fullname = $_POST['fullname']; 
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = trim($password);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    if (empty($email) || empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
    } else {
        $mysqli = connectDB();
        $sql = "SELECT * FROM akun WHERE email='$email' OR username='$username'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['email'] == $email) {
                $_SESSION['error'] = "Email already exists.";
            } elseif ($row['username'] == $username) {
                $_SESSION['error'] = "Username already exists.";
            }
        } else {
            $sql = "INSERT INTO akun (email, username, password) VALUES ('$email', '$username', '$password')";
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
    <title>MediCare Register</title>
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
                <div class="input-container">
                    <!-- <input type="email" id="username" name="username" placeholder="Username" required pattern="^\S+@student\.ub\.ac\.id$"> -->
                    <input type="email" id="email" name="email" placeholder="Email" required pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$">
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
                <p>Already have an account? <a href="login.php">Sign In</a></p>
            </form>
            <img src="images/element.png" class="element-image">
        </div>
    </div>
</body>
</html>
