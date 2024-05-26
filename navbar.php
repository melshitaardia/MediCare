<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'logout') {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit;
        } elseif ($_POST['action'] == 'editProfile') {
            $conn = connectDB();
            $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : null;

            if (isset($_FILES['profileUpload']) && $_FILES['profileUpload']['error'] == UPLOAD_ERR_OK) {
                $uploadDirectory = 'MediCare/images/account/';

                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }

                $filename = uniqid('profile_') . '_' . $_FILES['profileUpload']['name'];

                $destination = $uploadDirectory . $filename;
                if (move_uploaded_file($_FILES['profileUpload']['tmp_name'], $destination)) {
                    $stmt = $conn->prepare("UPDATE akun SET profile=?, password=? WHERE username=?");
                    if ($stmt->execute([$destination, $newPassword, $username])) {
                        echo "<script>
                            alert('Upload berhasil.');
                            setTimeout(function() {
                                window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                            }, 500);
                            </script>
                        ";
                        exit;
                    } else {
                        echo "Errorsss: " . $stmt->error;
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit;
                    }
                } else {
                    echo "<script>
                        alert('Upload gagal.');
                        </script>
                    ";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
            } else {
                echo "<script>
                        alert('Minimal upload gambar gagal.');
                        </script>
                    ";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="logout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="" id="profileImage" class="rounded-circle" height="25" alt="Profile Image" loading="lazy" />
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuAvatar">
                                    <li>
                                        <form method="POST" action="">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal"><button type="submit" name="user" class="dropdown-item">My Profile</button></a>
                                        </form>
                                    </li>
                                    <li>
                                        <form method="POST" action="">
                                            <button type="submit" name="logout" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <form method="POST" action="">
                                    <button type="submit" name="logout" class="btn btn-login">Sign Out</button>
                                </form>
                            </li> -->
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
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">My Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="profileModalBody">
                        <img src="" id="profilesImage" class="rounded-circle" height="25" alt="Profile Image" loading="lazy" />
                        <!-- <img src="" id="profileImage" class="rounded-circle" height="25" alt="Profile Image" loading="lazy" /> -->
                        <div class="mb-3">
                            <label for="editName" class="form-label">Username</label>
                            <input type="text" class="form-control" id="uname" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Password</label>
                            <input type="password" name="newPassword" class="form-control" id="jjinja" required>
                        </div>
                        <div class="mb-3">
                            <label for="profileUpload" class="form-label">Upload Profile Image</label>
                            <input type="file" class="form-control" name="profileUpload" id="profileUpload" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="action" value="editProfile">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('users.php')
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    const filteredUserData = data.filter(user => user.username === "<?php echo $username; ?>");
                    if (filteredUserData.length > 0) {
                        const userData = filteredUserData[0];
                        document.getElementById('uname').value = userData.username;
                        document.getElementById('jjinja').value = userData.password;
                        document.getElementById('profileImage').src = userData.profile;
                        document.getElementById('profilesImage').src = userData.profile;
                        console.log(filteredUserData);
                    } else {
                        console.log('User not found');
                    }
                } else {
                    console.error('Data received is not an array');
                }
            })
            .catch(error => console.error('Error fetching history data:', error));
    })
</script>

</html>