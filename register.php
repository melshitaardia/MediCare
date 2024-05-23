<?php
session_start(); // Start the session
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Both username and password are required.";
    } else {
        $mysqli = connectDB();
        $sql = "SELECT * FROM akun WHERE username='$username'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Username already exists.";
        } else {
            $sql = "INSERT INTO akun (username, password) VALUES ('$username', '$password')";
            if ($mysqli->query($sql) === TRUE) {
                echo "<script>alert('Selamat! Akun anda telah terdaftarkan.'); 
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="linear-grad">
        <div class="wrapper">
            <a class="back" href="login.php"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="heading">
                <h2>Register</h2>
                <p>Create your account</p>
            </div>

            <form id="registerForm" method="POST" action="">
                <div class="input-group">
                    <input type="text" id="username" name="username" class="input-field" placeholder="Username" required>
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" class="input-field" placeholder="Password" required>
                </div>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-warning" role="alert">
                        <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']); // Clear the error message
                        ?>
                    </div>
                <?php endif; ?>

                <div class="input-group">
                    <button type="submit">Register <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>

            <h5 class="pt-3 text-lg-end" style="font-size: smaller;">Have an account? <a href="login.php"
                    style="font-size: smaller;">Log In</a></h5>
        </div>
    </div>

</body>
</html>
