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
                        <a href="booking.php" class="nav-item nav-link text-dark fw-semibold">Halaman Booking</a>
                        <a href="cek_kuota.php" class="nav-item nav-link text-dark fw-semibold">Cek Kuota</a>
                        <a href="home.php" class="nav-item nav-link text-dark fw-semibold">Home</a>
                    </div>
                </div>
            </nav>
<!-- Navbar & Hero End -->

<div class="container-fluid bg-dark d-flex align-items-center justify-content-center"
        style="min-height:70vh; background: url('img/apuy.jpeg') center/cover no-repeat;">

        <div class="container text-center text-white" style="max-width:900px; text-shadow:0 2px 8px rgba(0,0,0,.7);">

            <h4 class="mb-4 fw-semibold text-white">
                JALUR PENDAKIAN VIA SADAREHE
            </h4>

            <p>
                Jalur pendakian via Sadarehe merupakan jalur pendakian yang paling populer dan banyak digunakan oleh para
                pendaki gunung Ciremai.
                Jalur ini menawarkan pemandangan alam yang indah serta fasilitas yang memadai untuk para pendaki.
            </p>

            <p class="mt-4 small">
                Rute pendakian via Sadarehe dimulai dari Pos Sadarehe, kemudian melewati Pos 1, Pos 2, Pos 3, dan Pos 4 sebelum
                mencapai puncak Gunung Ciremai.
                Setiap pos memiliki fasilitas seperti tempat istirahat, toilet, dan area camping.
            </p>

        </div>
    </div>


    <!-- Header End -->

    <div class="container my-5">
        <div class="row align-items-center">

            <!-- KIRI -->
            <div class="col-lg-7">
                <p class="fw-semibold">
                    Pendakian melalui Jalur Sadarehe menawarkan pengalaman menarik dengan berbagai
                    pemandangan yang menakjubkan, seperti keindahan bunga edelweiss.
                </p>

                <!-- TABEL -->
                <div class="table-responsive my-3">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Harga Tiket</th>
                                <th>/Orang</th>
                                <th>Aktifitas</th>
                                <th>Berkemah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Wisatawan</td>
                                <td>Rp.20.000</td>
                                <td>Rp.10.000</td>
                                <td>Rp.10.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- BUTTON -->
                <a href="simpan_booking_sadarehe.php" class="btn btn-primary px-4 fw-semibold">
                    Registrasi
                </a>
            </div>

            <!-- KANAN -->
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <img src="img/sadarehe.jpeg" class="img-fluid w-50 rounded shadow-sm" alt="Jalur Pendakian Sadarehe">
            </div>


        </div>
    </div>


    <div class="container my-4">
        <h5 class="mb-3">Lokasi Jalur Pendakian Via Sadarehe</h5>

        <div class="ratio ratio-21x9">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.295690286477!2d108.38740327459828!3d-6.855117767064879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f238aeebc3e61%3A0xf7cddc52ad2d5908!2sPos%20Pendakian%20Gunung%20Ciremai%20Jalur%20Sadarehe!5e0!3m2!1sid!2sid!4v1766721748570!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


<?php include_once("footer.php"); ?>