<?php
include_once("../Admin/header.php");

$kode = $_GET['kode'] ?? '';

$booking = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM booking_pendaki 
    WHERE kode_booking='$kode'
"));


if (!$booking) {
    echo "<div class='alert alert-danger'>Booking tidak ditemukan</div>";
    include_once("../Admin/footer.php");
    exit;
}

$anggota = mysqli_query($koneksi, "
    SELECT * FROM booking_anggota
    WHERE id_booking='{$booking['id_booking']}'
");
?>

<div class="container mt-5">
    <h3 class="mb-4">Detail Anggota Pendakian</h3>

    <div class="card shadow">
        <div class="card-body p-0">

            <table class="table table-bordered mb-0">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No KTP</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($anggota) == 0): ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            Tidak ada anggota
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no=1; while ($a = mysqli_fetch_assoc($anggota)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['nama_lengkap'] ?></td>
                        <td><?= $a['no_ktp'] ?></td>
                        <td>
                            <?= $a['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan' ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
        <a href="../Admin/booking_<?= $booking['jalur'] ?>.php" class="btn btn-secondary mt-3">← Kembali</a>
</div>

<?php include_once("../Admin/footer.php"); ?>
