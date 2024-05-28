<?php
session_start();
if(isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}
include 'database.php';

function login($username, $password) {
    $mysqli = connectDB();

    $sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
        return true; 
    } else {
        return false; 
    }

    $mysqli->close();
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        $_SESSION['error'] = "Both username and password are required.";
    } else if(login($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid username or password.";
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
    <title>Log In</title>
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
            <form id="loginForm" method="POST" action="">
                <h2>Welcome!</h2>
                <p>Sign in to your account</p>
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
                <button type="submit" name="login" value="Login">Sign In <i class="fa fa-arrow-right"></i></button>
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>
            <img src="images/element.png" class="element-image">
        </div>
    </div>
</body>
</html>
