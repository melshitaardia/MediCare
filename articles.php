<?php
include 'database.php';
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

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
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="articles.css">
    <link rel="stylesheet" href="logout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="linear-grad">
        <?php include 'navbar.php'; ?>

        <div class="section-art" style="margin-top: 34px;">
            <div class="container">
                <div class="col-lg-12">
                    <div class="intro-excerpt">
                        <h1 class="title pb-2">Baca Artikel Terbaru dan Terpopuler</h1>
                    </div>
                </div>
                <ul class="posts-box">
                    <?php
                    $conn = connectDB();
                    $sql = "SELECT id, title, content, image, date FROM articles ORDER BY date DESC";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li>
                            <div class="card">
                                <img src="' . $row['image'] . '" class="card-img-top" alt="Article Image">
                                <div class="card-body">
                                    <h3 class="card-title">' . $row['title'] . '</h3>
                                    <p class="card-text">' . substr($row['content'], 0, 100) . '...</p>
                                    <button 
                                        class="btn read-more-button" 
                                        data-id="' . $row['id'] . '" 
                                        data-title="' . htmlspecialchars($row['title'], ENT_QUOTES) . '" 
                                        data-content="' . htmlspecialchars($row['content'], ENT_QUOTES) . '"
                                        data-image="' . $row['image'] . '">
                                        Read More
                                    </button>
                                </div>
                            </div>
                          </li>';
                        }
                    } else {
                        echo '<p>No articles found.</p>';
                    }
                    mysqli_close($conn);
                    ?>
                </ul>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Article Title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="modalImage" src="" alt="Article Image" class="img-fluid mb-3">
                            <p id="modalContent"></p>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer-section">
                <div class="container relative">
                    <div class="rows g-5 mb-5">
                        <div class="col-lg-4 col-md-3">
                            <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">MediCare<span>.</span></a></div>
                            <p class="mb-4">byMediCare@gmail.com</p>
                            <p class="mb-4">+628XXXXXXXXXXXX</p>
                            <p class="mb-4">@MediCare</p>
                            <ul class="list-unstyled custom-social">
                                <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a></li>
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
                                <p class="mb-2 text-center text-lg-start">Bridging Hearts, Healing Minds &hearts;</a></p>
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

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const readMoreButtons = document.querySelectorAll(".read-more-button");

                    readMoreButtons.forEach(button => {
                        button.addEventListener("click", function() {
                            const articleId = this.dataset.id;
                            const articleTitle = this.dataset.title;
                            const articleContent = this.dataset.content;
                            const articleImage = this.dataset.image;

                            document.getElementById("modalTitle").innerText = articleTitle;
                            document.getElementById("modalContent").innerText = articleContent;
                            document.getElementById("modalImage").src = articleImage;

                            const articleModal = new bootstrap.Modal(document.getElementById("articleModal"));
                            articleModal.show();
                        });
                    });
                });
            </script>
</body>

</html>
