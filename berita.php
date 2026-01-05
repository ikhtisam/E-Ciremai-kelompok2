<?php include_once("header.php"); ?>


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>E-Ciremai</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="home.php" class="nav-item nav-link ">Home</a>
                        <a href="sejarah.php" class="nav-item nav-link">Sejarah</a>
                        <a href="berita.php" class="nav-item nav-link active">Berita</a>
                        <a href="info_booking.php" class="nav-item nav-link">Info Booking</a>
                    </div>
                </div>
            </nav>  


<!-- HERO -->
<div class="container-fluid text-white d-flex align-items-center"
     style="
        min-height: 70vh;
        background:
        linear-gradient(rgba(0, 0, 0, 0.16), rgba(0, 0, 0, 0.16)),
        url('img/subscribe-img.jpg') center/cover no-repeat;
     ">
    <div class="container text-center">
        <h1 class="display-5 fw-bold text-white">Berita Gunung Ciremai</h1>
        <p class="lead mb-0">Jejak Alam, Budaya, dan Pendakian</p>
    </div>
</div>

<!-- CONTENT -->
<div class="container my-5">

    <div class="text-center mb-5">
    <h2 class="fw-bold text-primary-emphasis"
        style="font-family: 'Poppins', sans-serif; position: relative; display: inline-block; padding: 0 20px;">
        Berita Terbaru
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
        $q = mysqli_query($koneksi,"SELECT * FROM berita ORDER BY created_at DESC");
        while($d=mysqli_fetch_assoc($q)):
        ?>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                <div style="
                    height:200px;
                    background:url('img/berita/<?= $d['gambar'] ?>') center/cover no-repeat;">
                </div>

                <div class="card-body d-flex flex-column p-4">
                    <h5 class="fw-semibold mb-2"><?= $d['judul'] ?></h5>
                    <p class="text-muted small flex-grow-1">
                        <?= $d['ringkas'] ?>
                    </p>

                    <a href="berita_detail.php?id=<?= $d['id'] ?>"
                       class="btn btn-success btn-sm mt-3 align-self-start px-4">
                        Baca Selengkapnya
                    </a>
                </div>

            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>


<?php include_once("footer.php"); ?>