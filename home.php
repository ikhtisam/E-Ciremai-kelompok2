
<?php
    include_once("header.php");

    $q = mysqli_query($koneksi, "
    SELECT * FROM gallery
    ORDER BY created_at DESC
");
?>


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
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="sejarah.php" class="nav-item nav-link">Sejarah</a>
                        <a href="berita.php" class="nav-item nav-link">Berita</a>
                        <a href="info_booking.php" class="nav-item nav-link">Info Booking</a>
                    </div>
                </div>
            </nav>  

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="3"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="img/96da2f590cd7246bbde0051047b0d6f7.jpeg">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore Ciremai</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4"><?php echo ambil_judul(15) ?></h1>
                                    <p class="mb-5 fs-5"><?php echo ambil_isi(15) ?></p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="booking.php">Booking</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item"> 
                            <img src="img/084b6fbb10729ed4da8c3d3f5a3ae7c9.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore Ciremai</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4"><?php echo ambil_judul(14) ?></h1>
                                    <p class="mb-5 fs-5"><?php echo ambil_isi(14) ?></p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="booking.php">Booking</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->   
        <!-- Navbar & Hero End -->

        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                            <img src="img/fa7cdfad1a5aaf8370ebeda47a1ff1c3.jpg" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                        <h5 class="section-about-title pe-3"></h5>
                        <h1 class="mb-4">Welcome to <span class="text-primary">E-Ciremai</span></h1>
                        <p class="mb-4">Selamat sampai digunung Ciremai! perjalanan yang yang melelahkan tapi penuh cerita indah.</p>
                        <p class="mb-4">Puncak Ciremai: 3.078 mdpl.lelah terbayar,cerita tercipta.Selamat untuk dirimu yang kuat sampai kepuncak ciremai</p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pesan Dan Kesan Apa Saat Pertamakali Kamu Mendaki?</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Hambatan atau tantangan apa yang paling berkesan selama pendakian Gunung Ciremai?</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Apa momen terbaik yang Anda rasakan selama perjalanan hingga mencapai puncak?</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Bagaimana penilaian Anda terhadap fasilitas dan pengelolaan pendakian di Gunung Ciremai?</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Apa saran Anda bagi pendaki lain yang ingin mendaki Gunung Ciremai di kemudian hari?</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kami siap melayani Anda, memberikan panduan serta dukungan agar perjalanan mendaki berjalan lancar dan menyenangkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- KONTEN -->

    <div class="text-center mb-5">
    <h2 class="fw-bold text-primary-emphasis"
        style="font-family: 'Poppins', sans-serif; position: relative; display: inline-block; padding: 0 20px;">
        GALLERY
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
        poto-poto pendakian
    </p>
</div>
        
       <!-- GALLERY -->
<div class="container-fluid gallery py-5 my-5">
    <div class="container">
        <div class="row g-3">

            <?php if(mysqli_num_rows($q)==0): ?>
                <div class="col-12 text-center text-muted">
                    Belum ada foto gallery
                </div>
            <?php endif; ?>

            <?php while($d = mysqli_fetch_assoc($q)): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="gallery-item h-100 shadow rounded">
                    <img src="img/gallery/<?= $d['gambar'] ?>"
                         class="img-fluid w-100 h-100 rounded"
                         style="object-fit:cover; height:250px;"
                         alt="<?= $d['judul'] ?>">

                    <div class="gallery-plus-icon">
                        <a href="img/gallery/<?= $d['gambar'] ?>"
                           data-lightbox="gallery"
                           class="my-auto">
                           <i class="fas fa-plus fa-2x text-white"></i>
                        </a>
                    </div>

                    <div class="p-2 text-center">
                        <small class="fw-semibold"><?= $d['judul'] ?></small>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>

<?php
    include_once("footer.php");
?>
