<?php include_once("header.php"); ?>

<?php
$kode = $_GET['kode'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM booking_pendaki 
    WHERE kode_booking='$kode'
"));

if (!$data) {
    echo "<div class='alert alert-danger'>Data booking tidak ditemukan</div>";
    include_once("footer.php");
    exit;
}

$harga_per_orang = 40000;
$total_bayar = $data['jumlah_pendaki'] * $harga_per_orang;

// status badge
$status = $data['status_pembayaran'];
if ($status == 'menunggu_pembayaran') {
    $badge = 'warning';
    $text = 'Menunggu Pembayaran';
} elseif ($status == 'menunggu_konfirmasi') {
    $badge = 'info';
    $text = 'Menunggu Konfirmasi Admin';
} elseif ($status == 'berhasil') {
    $badge = 'success';
    $text = 'Pembayaran Berhasil';
} else {
    $badge = 'danger';
    $text = 'Pembayaran Ditolak';
}
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
                <a href="cek_kuota.php" class="nav-item nav-link text-dark fw-semibold">Cek Kuota</a>
                <a href="home.php" class="nav-item nav-link text-dark fw-semibold">Home</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow rounded-4">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="mb-0">Riwayat Booking Pendakian</h4>
                    </div>

                    <div class="card-body p-4">

                        <div class="mb-3">
                            <small class="text-muted">Kode Booking</small>
                            <h5 class="fw-bold"><?= $data['kode_booking'] ?></h5>
                        </div>

                        <p>
                            <b>Jalur Pendakian</b><br>
                            <?= strtoupper($data['jalur']) ?>
                        </p>

                        <hr>

                        <p><b>Nama Leader</b><br><?= $data['nama_lengkap'] ?></p>
                        <p><b>Jumlah Pendaki</b><br><?= $data['jumlah_pendaki'] ?> orang</p>

                        <p><b>Total Pembayaran</b><br>
                            Rp <?= number_format($total_bayar, 0, ',', '.') ?>
                        </p>

                        <p><b>Status Pembayaran</b><br>
                            <span class="badge bg-<?= $badge ?> px-3 py-2">
                                <?= $text ?>
                            </span>
                        </p>

                        <?php if ($status == 'menunggu_pembayaran'): ?>
                            <div class="alert alert-warning mt-4">
                                Silakan lakukan pembayaran untuk melanjutkan proses booking.
                            </div>

                            <a href="pembayaran.php?kode=<?= $kode ?>" class="btn btn-success w-100">
                                Lanjut ke Pembayaran
                            </a>
                        <?php endif; ?>

                        <?php if ($status == 'menunggu_konfirmasi'): ?>
                            <div class="alert alert-info mt-4">
                                Bukti pembayaran sudah dikirim.<br>
                                Silakan tunggu konfirmasi dari admin.
                            </div>
                        <?php endif; ?>

                        <?php if ($status == 'berhasil'): ?>
                            <div class="alert alert-success mt-4">
                                ✅ Pembayaran telah dikonfirmasi.<br>
                                Tunjukkan <b>kode booking</b> saat Simaksi.
                            </div>
                        <?php endif; ?>

                        <?php if ($status == 'ditolak'): ?>
                            <div class="alert alert-danger mt-4">
                                ❌ Pembayaran ditolak.<br>
                                Silakan upload ulang bukti pembayaran.
                            </div>

                            <a href="pembayaran.php?kode=<?= $kode ?>" class="btn btn-danger w-100">
                                Upload Ulang Bukti
                            </a>
                        <?php endif; ?>

                        <a href="info_booking.php" class="btn btn-outline-secondary w-100">
                            ← Kembali ke Riwayat
                        </a>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include_once("footer.php"); ?>