<?php include_once("../Admin/header.php"); ?>

<?php
$kode = $_GET['kode'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM booking_pendaki WHERE kode_booking='$kode'

"));

$jalur = $data['jalur'];

?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            Detail Booking
        </div>

        <div class="card-body">
            <p><b>Kode Booking:</b> <?= $data['kode_booking'] ?></p>
            <p><b>Nama Leader:</b> <?= $data['nama_lengkap'] ?></p>
            <p><b>Jumlah Pendaki:</b> <?= $data['jumlah_pendaki'] ?></p>
            <p><b>Total Bayar:</b> Rp <?= number_format($data['total_pembayaran'], 0, ',', '.') ?></p>

            <hr>

            <p><b>Bukti Pembayaran:</b></p>
            <img src="../bukti/<?= $data['bukti_pembayaran'] ?>" class="img-fluid rounded mb-3" style="max-width:400px">

            <form action="../Admin/aksi_booking.php" method="POST">
                <input type="hidden" name="kode" value="<?= $kode ?>">

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <button name="terima" class="btn btn-success">
                            ✔ Terima
                        </button>

                        <button name="tolak" class="btn btn-danger">
                            ✖ Tolak
                        </button>
                    </div>

                    <a href="../Admin/booking_<?= $jalur ?>.php" class="btn btn-secondary">
                        ← Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include_once("../Admin/footer.php"); ?>