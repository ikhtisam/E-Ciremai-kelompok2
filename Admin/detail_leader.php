<?php
include_once("../Admin/header.php");

$kode = $_GET['kode'] ?? '';

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM booking_pendaki 
    WHERE kode_booking='$kode'
"));

if (!$data) {
    echo "<div class='alert alert-danger'>Data leader tidak ditemukan</div>";
    include_once("../Admin/footer.php");
    exit;
}
?>

<div class="container mt-5">
    <h3 class="mb-4">Detail Leader Pendakian</h3>

    <div class="card shadow">
        <div class="card-body">
            <p><b>Kode Booking:</b> <?= $data['kode_booking'] ?></p>
            <p><b>Nama Lengkap:</b> <?= $data['nama_lengkap'] ?></p>
            <p><b>No KTP:</b> <?= $data['no_ktp'] ?></p>
            <p><b>Jenis Kelamin:</b>
                <?= $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
            </p>
            <p><b>Tanggal Lahir:</b> <?= $data['tgl_lahir'] ?></p>
            <p><b>Email:</b> <?= $data['email'] ?></p>
            <p><b>No Telepon:</b> <?= $data['no_telp'] ?></p>
            <p><b>No Telp Keluarga:</b> <?= $data['no_telp_keluarga'] ?></p>
        </div>
    </div>

    <a href="../Admin/booking_<?= $data['jalur'] ?>.php" class="btn btn-secondary mt-3">← Kembali</a>
</div>

<?php include_once("../Admin/footer.php"); ?>
