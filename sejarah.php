<?php include_once("header.php"); ?>

<!-- Navbar -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="home.php" class="navbar-brand p-0">
            <h1 class="m-0">
                <i class="fa fa-map-marker-alt me-3"></i>E-Ciremai
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="home.php" class="nav-item nav-link">Home</a>
                <a href="sejarah.php" class="nav-item nav-link active">Sejarah</a>
                <a href="berita.php" class="nav-item nav-link">Berita</a>
                <a href="info_booking.php" class="nav-item nav-link">Info Booking</a>
            </div>
        </div>
    </nav>
</div>

<!-- HERO -->
<div class="container-fluid text-white d-flex align-items-center"
     style="
        min-height: 70vh;
        background:
        linear-gradient(rgba(0, 0, 0, 0.16), rgba(0, 0, 0, 0.16)),
        url('img/084b6fbb10729ed4da8c3d3f5a3ae7c9.jpg') center/cover no-repeat;
     ">
    <div class="container text-center">
        <h1 class="display-5 fw-bold text-white">Sejarah Gunung Ciremai</h1>
        <p class="lead mb-0">Jejak Alam, Budaya, dan Pendakian</p>
    </div>
</div>


<!-- KONTEN -->
<div class="container my-5">

    <div class="text-center mb-5">
    <h2 class="fw-bold text-primary-emphasis"
        style="font-family: 'Poppins', sans-serif; position: relative; display: inline-block; padding: 0 20px;">
        Sejarah
        <span style="
            position:absolute;
            top:50%;
            left:-120px;
            width:100px;
            height:2px;
            background:#0dcaf0;">
        </span>
        <span style="
            position:absolute;
            top:50%;
            right:-120px;
            width:100px;
            height:2px;
            background:#0dcaf0;">
        </span>
    </h2>

    <p class="text-muted mt-2"
       style="font-family: 'Poppins', sans-serif;">
        Informasi dan update seputar Gunung Ciremai
    </p>
</div>

    <div class="row g-4">

        <?php
        $q = mysqli_query($koneksi, "
            SELECT * FROM sejarah_ciremai
            ORDER BY created_at DESC
        ");

        if (mysqli_num_rows($q) == 0) {
            echo "<div class='text-center text-muted'>Belum ada data sejarah</div>";
        }

        while ($d = mysqli_fetch_assoc($q)):
        ?>

        <div class="col-md-4">
            <div class="card h-100 shadow border-0">
                <img src="img/sejarah/<?= $d['gambar']; ?>"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">

                <div class="card-body">
                    <h5 class="fw-bold"><?= $d['judul']; ?></h5>
                    <small class="text-muted">
                        <?= date('d M Y', strtotime($d['created_at'])); ?>
                    </small>
                    <p class="mt-2"><?= nl2br($d['ringkas']); ?></p>
                </div>
            </div>
        </div>

        <?php endwhile; ?>

    </div>
</div>

<?php include_once("footer.php"); ?>
