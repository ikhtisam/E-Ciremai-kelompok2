<?php
include_once("header.php");

/* ===============================
   PROSES SUBMIT BUKTI PEMBAYARAN
   =============================== */
if (isset($_POST['kirim'])) {

    mysqli_begin_transaction($koneksi);

    try {

        $kode = $_POST['kode_booking'];

        // ambil data booking
        $booking = mysqli_fetch_assoc(mysqli_query($koneksi, "
            SELECT * FROM booking_pendaki 
            WHERE kode_booking='$kode'
        "));

        if (!$booking) {
            throw new Exception("Data booking tidak ditemukan");
        }

        // DATA PENTING
        $jumlah = (int) $booking['jumlah_pendaki'];
        $id_kp = $booking['id_kp'];
        $jalur = $booking['jalur'];

        // ambil kuota
        $kuota = mysqli_fetch_assoc(mysqli_query($koneksi, "
            SELECT * FROM kuota_pendakian 
            WHERE id_kp='$id_kp'
        "));

        $jalur = $booking['jalur'];

        if (!in_array($jalur, ['apuy', 'sadarehe', 'linggarjati', 'palutungan'])) {
            throw new Exception("Jalur pendakian tidak valid");
        }


        if (!$kuota) {
            throw new Exception("Data kuota tidak ditemukan");
        }

        if ((int) $kuota[$jalur] < $jumlah) {
            throw new Exception("Kuota sudah tidak mencukupi");
        }

        // upload bukti
        $file = time() . "_" . $_FILES['bukti']['name'];
        $tmp = $_FILES['bukti']['tmp_name'];

        if (!move_uploaded_file($tmp, "bukti/$file")) {
            throw new Exception("Upload bukti gagal");
        }

        // hitung total bayar
        $harga_per_orang = 40000;
        $total_bayar = $jumlah * $harga_per_orang;

        // update booking + total pembayaran
        mysqli_query($koneksi, "
        UPDATE booking_pendaki
        SET 
        bukti_pembayaran='$file',
        total_pembayaran='$total_bayar',
        status_pembayaran='menunggu_konfirmasi'
        WHERE kode_booking='$kode'
");


        // kurangi kuota
        $sisa = (int) $kuota[$jalur] - $jumlah;

        mysqli_query($koneksi, "
            UPDATE kuota_pendakian 
            SET $jalur='$sisa'
            WHERE id_kp='$id_kp'
        ");

        mysqli_commit($koneksi);

        header("Location: riwayat.php?kode=$kode");
        exit;

    } catch (Exception $e) {
        mysqli_rollback($koneksi);
        echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
    }
}


/* ===============================
   AMBIL DATA BOOKING
   =============================== */
$kode = $_GET['kode'] ?? '';

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM booking_pendaki 
    WHERE kode_booking='$kode'
"));

if (!$data) {
    echo "<div class='alert alert-danger'>Data booking tidak ditemukan</div>";
    exit;
}

$harga_per_orang = 40000;
$total_bayar = $data['jumlah_pendaki'] * $harga_per_orang;
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow rounded-4">
                <div class="card-header bg-success text-white text-center">
                    <h4>Pembayaran Booking</h4>
                </div>

                <div class="card-body">

                    <p><b>Jumlah Pendaki</b><br><?= $data['jumlah_pendaki'] ?> orang</p>

                    <p>
                        <b>Jalur Pendakian</b><br>
                        <?= strtoupper($data['jalur']) ?>
                    </p>



                    <hr>

                    <p><b>Biaya per Orang</b><br>
                        Rp <?= number_format($harga_per_orang, 0, ',', '.') ?>
                    </p>

                    <p><b>Total Pembayaran</b></p>
                    <h3 class="text-success fw-bold">
                        Rp <?= number_format($total_bayar, 0, ',', '.') ?>
                    </h3>

                    <div class="alert alert-info mt-3">
                        <b>Transfer ke:</b><br>
                        Bank MANDIRI<br>
                        No Rek: 1234-5678-9100<br>
                        a.n. E-Ciremai Adventure
                    </div>

                    <hr>

                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kode_booking" value="<?= $kode ?>">

                        <div class="mb-3">
                            <label class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button name="kirim" class="btn btn-success btn-lg">
                                Kirim Bukti Pembayaran
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>