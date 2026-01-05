<?php
    include("..\\inc\\inc_conn.php");
?>


<?php 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek kredensial pengguna
    $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        header("Location: home_index.php");
    } else {
        // Login gagal
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin E-Ciremai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
</head>


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

                </form>
            </div>
        </div>

    </div>
</div>



<?php include_once("footer.php"); ?>