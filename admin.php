<?php
include 'database.php';

session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'editProfiles') {
            $conn = connectDB();
            $newFulls = isset($_POST['newFulls']) ? $_POST['newFulls'] : null;
            $unames = isset($_POST['unames']) ? $_POST['unames'] : null;
            $newEmails = isset($_POST['newEmails']) ? $_POST['newEmails'] : null;
            $roless = isset($_POST['roless']) ? $_POST['roless'] : null;

            if (isset($_FILES['profilesUpload']) && $_FILES['profilesUpload']['error'] == UPLOAD_ERR_OK) {
                $uploadDirectory = 'finalproject/images/account/';

                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }

                $filename = uniqid('profile_') . '_' . $_FILES['profilesUpload']['name'];

                $destination = $uploadDirectory . $filename;
                if (move_uploaded_file($_FILES['profilesUpload']['tmp_name'], $destination)) {
                    $stmt = $conn->prepare("UPDATE akun SET profile=?, fullname=?, email=?, role=? WHERE username=?");
                    if ($stmt->execute([$destination, $newFulls, $newEmails, $roless, $unames])) {
                        echo "<script>
                            alert('Upload berhasil.');
                            setTimeout(function() {
                                window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                            }, 500);
                            </script>
                        ";
                        exit;
                    } else {
                        echo "Errorsss: " . $stmt->error . "<script>
                        setTimeout(function() {
                            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                        }, 500);
                        </script>";
                        exit;
                    }
                } else {
                    echo "<script>
                        alert('Upload gagal.');
                        setTimeout(function() {
                            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                        }, 500);
                        </script>
                    ";
                    exit;
                }
            } else {
                $stmt = $conn->prepare("UPDATE akun SET fullname=?, email=?, role=? WHERE username=?");
                if ($stmt->execute([$newFulls, $newEmails, $roless, $unames])) {
                    echo "<script>
                            alert('Data berhasil diperbarui.');
                            setTimeout(function() {
                            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                            }, 500);
                        </script>
                    ";
                    exit;
                } else {
                    echo "Error: " . $stmt->error;
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
            }
        } else if ($_POST['action'] == 'deleteProfiles') {
            $conn = connectDB();
            $un = isset($_POST['un']) ? $_POST['un'] : null;
            $stmt = $conn->prepare("DELETE FROM akun WHERE username=?");
            if ($stmt->execute([$un])) {
                echo "<script>
                            alert('Data berhasil dihapus.');
                            setTimeout(function() {
                                window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                            }, 500);
                            </script>
                        ";
            } else {
                echo "<script>
                        alert('Gagal hapus data.');
                        setTimeout(function() {
                            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                        }, 500);
                        </script>
                    ";
            }
        } else if ($_POST['action'] == 'editArticles') {
            $conn = connectDB();
            $ids = isset($_POST['ids']) ? $_POST['ids'] : null;
            $newTit = isset($_POST['newTit']) ? $_POST['newTit'] : null;
            $newCon = isset($_POST['newCon']) ? $_POST['newCon'] : null;
            $newImgs = isset($_POST['newImgs']) ? $_POST['newImgs'] : null;
            $newDates = isset($_POST['newDates']) ? $_POST['newDates'] : null;
            $stmt = $conn->prepare("UPDATE articles SET title=?, content=?, image=?, date=? WHERE id=?");
            if ($stmt->execute([$newTit, $newCon, $newImgs, $newDates, $ids])) {
                echo "<script>
                            alert('Article berhasil diubah.');
                            setTimeout(function() {
                                window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                            }, 500);
                            </script>
                        ";
            } else {
                echo "<script>
                        alert('Article gagal diubah.');
                        setTimeout(function() {
                            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                        }, 500);
                        </script>
                    ";
            }
        } else if ($_POST['action'] == 'deleteArticles') {
            $conn = connectDB();
            $idss = isset($_POST['idss']) ? $_POST['idss'] : null;
            $stmt = $conn->prepare("DELETE FROM articles WHERE id=?");
            if ($stmt->execute([$idss])) {
                echo "<script>
                            alert('Article berhasil dihapus.');
                            setTimeout(function() {
                                window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                            }, 500);
                            </script>
                        ";
            } else {
                echo "<script>
                        alert('Gagal hapus Article.');
                        setTimeout(function() {
                            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                        }, 500);
                        </script>
                    ";
            }
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
    <title>Admin Site</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="linear-grad">
        <?php
        include 'navbar.php';
        ob_end_flush();
        ?>
    </div>

    <div class="user-container table-responsive px-5 pb-2" style="margin-top: 90px;">
        <h2>User Data</h2>
        <table class="table align-items-center justify-content-center mb-0 table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Profile</th>
                    <th>Role</th>
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody class="user-data">
            </tbody>
        </table>
    </div>

    <div class="article-container table-responsive px-5 pb-2" style="margin-top: 90px;">
        <h2>Article Data</h2>
        <table class="table align-items-center justify-content-center mb-0 table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image Link</th>
                    <th>Date</th>
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody class="article-data">
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="profilesModals" tabindex="-1" aria-labelledby="profilseModalsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profilesModalsLabel">My Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="profilesModalsBody">
                        <img src="" id="profilesImage" class="rounded-circle" height="25" alt="Profile Image" loading="lazy" />
                        <div class="mb-3">
                            <label for="editFull" class="form-label">Full Name</label>
                            <input type="text" name="newFulls" class="form-control" id="fulls" required>
                        </div>
                        <div class="mb-3">
                            <label for="editName" class="form-label">Email</label>
                            <input type="text" name="newEmails" class="form-control" id="emails" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editName" class="form-label">Username</label>
                            <input type="text" class="form-control" name="unames" id="unames" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editRoles" class="form-label">Roles</label>
                            <select class="form-select" name="roless" id="roless" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="profileUpload" class="form-label">Upload Profile Image</label>
                            <input type="file" class="form-control" name="profilesUpload" id="profilesUpload">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="action" value="editProfiles">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletesModals" tabindex="-1" aria-labelledby="profilesModalsBody" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profilesModalsBody">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="deletesModalsLabel">
                        <div class="mb-3">
                            <input type="text" class="form-control border-0" name="un" id="un" readonly>
                        </div>
                        <p>Apakah anda yakin akan menghapus data dengan username diatas?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="action" value="deleteProfiles">Delete account</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="artedtModals" tabindex="-1" aria-labelledby="artModalsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="artedtModalsLabel">My Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="artedtModalsBody">
                        <input type="text" name="ids" class="form-control" id="ids" readonly>
                        <div class="mb-3">
                            <label for="edittit" class="form-label">Title</label>
                            <input type="text" name="newTit" class="form-control" id="tit" required>
                        </div>
                        <div class="mb-3">
                            <label for="editcon" class="form-label">Content</label>
                            <input type="text" name="newCon" class="form-control" id="con" required>
                        </div>
                        <div class="mb-3">
                            <label for="editimg" class="form-label">Image link</label>
                            <input type="text" name="newImgs" class="form-control" id="imgs" required>
                        </div>
                        <div class="mb-3">
                            <label for="editdate" class="form-label">Date</label>
                            <input type="date" name="newDates" class="form-control" id="dates" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="action" value="editArticles">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="artdelModals" tabindex="-1" aria-labelledby="artModalsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="artModalsLabel">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="artdelModals">
                        <div class="mb-3">
                            <input type="text" name="idss" class="form-control" id="idss" readonly>
                            <input type="text" class="form-control border-0" name="tits" id="tits" readonly>
                        </div>
                        <p>Apakah anda yakin akan menghapus article dengan title diatas?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="action" value="deleteArticles">Delete account</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
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
    document.addEventListener('DOMContentLoaded', () => {
        fetch('users.php')
            .then(response => response.json())
            .then(userData => {
                console.log(userData);
                if (Array.isArray(userData) && userData.length > 0) {
                    renderUserData(userData);
                    attachEditEventListeners(userData);
                } else {
                    console.error('Error: User data is empty or invalid.');
                }
            })
            .catch(error => console.error('Error fetching history data:', error));
        fetch('art.php')
            .then(response => response.json())
            .then(artData => {
                console.log(artData);
                if (Array.isArray(artData) && artData.length > 0) {
                    renderArticleData(artData);
                    attachArticleEventListeners(artData);
                } else {
                    console.error('Error: Article data is empty or invalid.');
                }
            })
            .catch(error => console.error('Error fetching article:', error));
    });

    function redirectToLogin() {
        window.location.href = 'login.php';
    }

    function generateUserEntry(data) {
        return `
        <tr>
        <td>${data.username}</td>
        <td>${data.email}</td>
        <td>${data.fullname}</td>
        <td><img src="${data.profile}" id="profilesImage" class="rounded-circle" height="25" alt="Profile Image" loading="lazy" /></td>
        <td>${data.role}</td>
        <td>
        <form method="POST" action="">
        <a class="btn btn-primary edit-btn" href="#" data-bs-toggle="modal" data-bs-target="#profilesModals" data-user='${JSON.stringify(data)}'>Edit</a>
        <a class="btn btn-primary dlt-btn" href="#" data-bs-toggle="modal" data-bs-target="#deletesModals" data-user='${JSON.stringify(data)}'>Delete</a>
        </form>
        </td>
        </tr>
        `;
    }

    function attachEditEventListeners(userData) {
        const editBtns = document.querySelectorAll('.edit-btn');
        const delBtns = document.querySelectorAll('.dlt-btn');
        editBtns.forEach(editBtn => {
            editBtn.addEventListener('click', () => {
                const dataIndex = editBtn.getAttribute('data-user');
                const userData = JSON.parse(dataIndex);
                populateModal(userData);
            });
        });
        delBtns.forEach(delBtn => {
            delBtn.addEventListener('click', () => {
                const dataIndex = delBtn.getAttribute('data-user');
                const userData = JSON.parse(dataIndex);
                populateModal(userData);
            });
        });
    }


    function populateModal(data) {
        const modalBody = document.getElementById('artModalsLabel');
        const modalImage = document.getElementById('profilesImage');
        const fullnameInput = document.getElementById('fulls');
        const emailInput = document.getElementById('emails');
        const roleInput = document.getElementById('roless');
        const usernameInput = document.getElementById('unames');
        const un = document.getElementById('un');
        console.log(data);
        modalImage.src = data.profile;
        fullnameInput.value = data.fullname;
        emailInput.value = data.email;
        roleInput.value = data.role;
        usernameInput.value = data.username;
        un.value = data.username

        const modalDialog = document.querySelector('#profilesModals');
        const modalInstance = new bootstrap.Modal(modalDialog);
        const modalsDialog = document.querySelector('#deletesModals');
        const modalsInstance = new bootstrap.Modal(modalsDialog);
    }

    function renderUserData(userData) {
        const userContainer = document.querySelector('.user-container .user-data');
        userContainer.innerHTML = '';

        userData.forEach(data => {
            const userHtml = generateUserEntry(data);
            userContainer.innerHTML += userHtml;
        });
    }

    function generateArticleEntry(data) {
        return `
        <tr>
        <td>${data.title}</td>
        <td>${data.content}</td>
        <td><img src="${data.image}" class="" width="50px"></td>
        <td>${data.date}</td>
        <td>
        <form method="POST" action="">
        <a class="btn btn-primary ardit-btn" href="#" data-bs-toggle="modal" data-bs-target="#artedtModals" data-article='${JSON.stringify(data)}'>Edit</a>
        <a class="btn btn-primary ardel-btn" href="#" data-bs-toggle="modal" data-bs-target="#artdeltModals" data-article='${JSON.stringify(data)}'>Delete</a>
        </form>
        </td>
        </tr>
        `;
    }

    function attachArticleEventListeners(articleData) {
        const editBtns = document.querySelectorAll('.ardit-btn');
        const delBtns = document.querySelectorAll('.ardel-btn');
        editBtns.forEach(editBtn => {
            editBtn.addEventListener('click', () => {
                const dataIndex = editBtn.getAttribute('data-article');
                const artData = JSON.parse(dataIndex);
                populateartModal(artData);
            });
        });
        delBtns.forEach(delBtn => {
            delBtn.addEventListener('click', () => {
                const dataIndex = delBtn.getAttribute('data-article');
                const delData = JSON.parse(dataIndex);
                populateartModal(delData);
            });
        });
    }


    function populateartModal(data) {
        const modalBody = document.getElementById('profilesModalsBody');
        const tit = document.getElementById('tit');
        const con = document.getElementById('con');
        const imgs = document.getElementById('imgs');
        const dates = document.getElementById('dates');
        const dateObject = new Date(data.date);
        const formattedDate = dateObject.toISOString().split('T')[0];
        const ids = document.getElementById('ids');
        const idss = document.getElementById('idss');
        tit.value = data.title;
        con.value = data.content;
        imgs.value = data.image;
        dates.value = formattedDate;
        ids.value = data.id;
        idss.value = data.id

        const modalDialog = document.querySelector('#artedtModals');
        const modalInstance = new bootstrap.Modal(modalDialog);
        const modalsDialog = document.querySelector('#artdelModals');
        const modalsInstance = new bootstrap.Modal(modalsDialog);
    }

    function renderArticleData(articleData) {
        const articleContainer = document.querySelector('.article-container .article-data');
        articleContainer.innerHTML = '';

        articleData.forEach(data => {
            const userHtml = generateArticleEntry(data);
            articleContainer.innerHTML += userHtml;
        });
    }
</script>

</html>