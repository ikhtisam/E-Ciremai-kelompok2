<?php
include("..\\inc\\inc_conn.php");
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

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-Ciremai</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="../Admin/home_index.php">Home</a>
                </li>

                <!-- KUOTA -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">
                        Halaman Utama
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../Admin/halaman.php">Deskripsi</a></li>
                        <li><a class="dropdown-item" href="../Admin/gallery_index.php">Gallery</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../Admin/berita_index.php">Berita</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../Admin/sejarah_index.php">Sejarah</a>
                </li>

                <!-- BOOKING PENDakIAN (FIXED) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">
                        Daftar Booking Pendakian
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="../Admin/booking_apuy.php">
                                Via Apuy
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../Admin/booking_sadarehe.php">
                                Via Sadarehe
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../Admin/booking_linggarjati.php">
                                Via Linggarjati
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../Admin/booking_palutungan.php">
                                Via Palutungan
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- KUOTA -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">
                        Kuota Pendakian
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../Admin/k_pendaki.php">Cek Kuota</a></li>
                        <li><a class="dropdown-item" href="../Admin/kuota_pendaki.php">Update Kuota</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
</head>
    <main>