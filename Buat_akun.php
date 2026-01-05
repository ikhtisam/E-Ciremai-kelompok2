<?php include_once("inc/inc_fungsi.php"); ?>
<?php include_once("inc/inc_conn.php"); ?>

<?php
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql1 = "INSERT INTO akun (username, password) VALUES 
    ('$username', '$password')";

    if (mysqli_query($koneksi, $sql1)) {
        echo "<script>alert('Akun berhasil dibuat. Silakan login.'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Ciremai</title>
    <link rel="shortcut icon" href="../img/Logo1.1.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-primary px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                            class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="index.php">
                        <small class="me-3 text-light">
                            <i class="fa-solid fa-right-to-bracket me-2"></i> Sudah Punya Akun
                        </small>
                    </a>
                    <div>
                        <a href="#" class="text-light" data-bs-toggle="dropdown"><small><i
                                    class="fas fa-user-alt me-2"></i> Welcome
                                <?= $_SESSION['username'] ?? 'Guest' ?></small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary row g-13">
            <div class="container-fluid text-center py-5">
                <h1 class="w-100">Buat Akun Anda</h1>
            </div>
        </nav>
    </div>


    <div class="row justify-content-center">
    <div class="col-10 col-sm-8 col-md-5 col-lg-4">
        <form class="p-4 shadow rounded-4 bg-white" action="Buat_akun.php" method="post">

            <h5 class="text-center fw-bold mb-4">Buat Akun</h5>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input 
                    type="text" 
                    class="form-control"
                    name="username"
                    placeholder="Masukkan username"
                >
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control"
                    name="password"
                    placeholder="Masukkan password"
                >
            </div>

            <div class="d-grid mb-3">
                <button type="submit" name="register" class="btn btn-primary">
                    Buat Akun
                </button>
            </div>

            <p class="text-center text-muted small mb-0">
                Sudah punya akun?
                <a href="index.php" class="fw-semibold text-decoration-none">
                    Login
                </a>
            </p>

        </form>
    </div>
</div>

    </div>

    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary row g-13">
            <div class="container-fluid text-center py-5">
            </div>
        </nav>
    </div>

    <?php include_once("footer.php"); ?>