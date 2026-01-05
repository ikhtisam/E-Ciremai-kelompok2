<?php include_once("header.php"); ?>


<!-- Header Start -->

<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4 px-lg-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0 text-white">
            <h1 class="m-0 text-white">
                <i class="fa fa-map-marker-alt me-3 text-white"></i>
                E-Ciremai
            </h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="booking.php" class="nav-item nav-link text-black">Jalur Pendakian</a>
                <a href="cek_kuota.php" class="nav-item nav-link text-white">cek Kuota</a>
                <a href="home.php" class="nav-item nav-link text-white">Home</a>
            </div>
        </div>
    </nav>
</div>


<div class="container-fluid bg-dark d-flex align-items-center justify-content-center" 
     style="min-height:100vh; background: url('img/bcg.jpeg') center/cover no-repeat;">
     
    <div class="container text-center text-white" style="max-width:900px; text-shadow:0 2px 8px rgba(0,0,0,.7);">
        
        <h4 class="mb-4 fw-semibold text-white">
            SYARAT DAN KETENTUAN BOOKING
        </h4>

        <p >
            CALON PENDAKI DIWAJIBKAN MEMBAWA BARANG (AKAN DICEK DI PINTU MASUK) BERUPA:
        </p>

        <ul class="list-unstyled mt-3">
            <li>✓ JAKET</li>
            <li>✓ SLEEPING BAG (MENGINAP)</li>
            <li>✓ NESTING (MENGINAP)</li>
            <li>✓ KOMPOR (MENGINAP)</li>
            <li>✓ MATRAS (MENGINAP)</li>
            <li>✓ TENDA (MENGINAP)</li>
            <li>✓ JAS HUJAN</li>
            <li>✓ SEPATU TRACKING / SEPATU GUNUNG</li>
            <li>✓ TUMBLER / JERIGEN</li>
        </ul>

        <p class="mt-4 small">
            DAN MEMATUHI SEMUA PERATURAN YANG DITERAPKAN, <br>
            SERTA AKAN BERTANGGUNG JAWAB DAN MENERIMA SANKSI APABILA MELANGGAR PERATURAN.
        </p>

    </div>
</div>


<!-- Header End -->

<!-- Travel Guide Start -->
<div class="container-fluid guide py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Piih Jalur Pendakian</h5>
            <h1 class="mb-0">Jalur Pendakian</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-3">
                <a href="apuy.php">
                    <div class="guide-item">
                        <div class="guide-img">
                            <div class="guide-img-efects">
                                <img src="img/reza.jpeg" class="img-fluid w-100 rounded-top" alt="Via Apuy">
                            </div>
                        </div>
                        <div class="guide-title text-center rounded-bottom p-4">
                            <div class="guide-title-inner">
                                <h4 class="mt-3">Via Apuy</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-6 col-lg-3">
                <a href="sadarehe.php">
                <div class="guide-item">
                    <div class="guide-img">
                        <div class="guide-img-efects">
                            <img src="img/Edelweiss.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                    </div>
                    <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                            <h4 class="mt-3">Via Sadarehe</h4>
                        </div>
                    </div>
                </div>
                </a>
            </div>



            <div class="col-md-6 col-lg-3">
                <a href="linggarjati.php">
                <div class="guide-item">
                    <div class="guide-img">
                        <div class="guide-img-efects">
                            <img src="img/linggarjati.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                    </div>
                    <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                            <h4 class="mt-3">Via Linggarjati</h4>
                        </div>
                    </div>
                </div>
                </a>
            </div>



            <div class="col-md-6 col-lg-3">
                <a href="palutungan.php">
                <div class="guide-item">
                    <div class="guide-img">
                        <div class="guide-img-efects">
                            <img src="img/palutungan.jpeg" class="img-fluid w-100 rounded-top" alt="Image">
                        </div>
                    </div>
                    <div class="guide-title text-center rounded-bottom p-4">
                        <div class="guide-title-inner">
                            <h4 class="mt-3">Via Palutungan</h4>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Travel Guide End -->




<?php include_once("footer.php"); ?>