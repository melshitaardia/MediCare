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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="linear-grad">
        <div class="wrapper">
            <a class="back" href="home.php"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="heading">
                <h2>Welcome!</h2>
                <p>Sign in to your account</p>
            </div>
            <form id="loginForm" method="POST" action="">
                <div class="input-group">
                    <input type="text" id="username" name="username" class="input-field" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="input-field" placeholder="Password">
                </div>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-warning" role="alert">
                        <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']); 
                        ?>
                    </div>
                <?php endif; ?>

                <div class="input-group">
                    <button type="submit" name="login" value="Login">Login <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
            <h5 class="pt-3 text-lg-end" style="font-size: smaller;">Create an account? <a href="register.php"
                    style="font-size: smaller;">Click here</a></h5>
        </div>
    </div>
</body>
</html>
