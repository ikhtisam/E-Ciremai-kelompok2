<?php include_once("inc/inc_fungsi.php"); ?>
<?php include_once("inc/inc_conn.php"); ?>

<?php 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek kredensial pengguna
    $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        session_start();
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['is_login'] = true;
        $_SESSION['akun_id'] = $data['akun_id'];

        header("Location: home.php");
    } else {
        // Login gagal
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Ciremai</title>
    <link rel="shortcut icon" href="img/Logo1.1.png" type="image/x-icon">
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
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i
                                    class="fa fa-home me-2"></i> Guest</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-4">

        <!-- Card Login -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                <!-- Judul -->
                <h3 class="text-center mb-4 fw-bold">Login</h3>

                <form action="index.php" method="post">

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" name="login" class="btn btn-primary w-100 mb-3">
                        Login
                    </button>

                     <!-- Divider -->
                    <div class="text-center text-muted mb-3">
                        <small>Belum punya akun?</small>
                    </div>

                    <!-- Tombol Buat Akun -->
                    <a href="Buat_akun.php" class="btn btn-outline-primary w-100">
                        Buat Akun
                    </a>

                </form>
            </div>
        </div>

    </div>
</div>


<?php include_once("footer.php"); ?>