<?php
include_once "header.php";

/* ================= CEK LOGIN ================= */
if (!isset($_SESSION['akun_id'])) {
    header("Location: index.php");
    exit;
}

$akun_id = $_SESSION['akun_id'];

/* ================= AMBIL RIWAYAT BOOKING ================= */
$query = mysqli_query($koneksi, "
    SELECT 
        bp.kode_booking,
        bp.jalur,
        bp.jumlah_pendaki,
        bp.status_pembayaran,
        bp.created_at,
        kp.tanggal
    FROM booking_pendaki bp
    JOIN kuota_pendakian kp ON bp.id_kp = kp.id_kp
    WHERE bp.akun_id = '$akun_id'
    ORDER BY bp.created_at DESC
");
?>

<!-- ================= NAVBAR ================= -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4 px-lg-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0 text-white">
            <h1 class="m-0 text-white">
                <i class="fa fa-map-marker-alt me-3"></i>E-Ciremai
            </h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="home.php" class="nav-item nav-link text-white">Home</a>
                <a href="sejarah.php" class="nav-item nav-link text-white">Sejarah</a>
                <a href="berita.php" class="nav-item nav-link text-white">Berita</a>
                <a href="info_booking.php" class="nav-item nav-link active fw-semibold text-white">
                    Info Booking
                </a>
            </div>
        </div>
    </nav>
</div>

<div style="height:80px"></div>

<!-- ================= RIWAYAT BOOKING ================= -->
<div class="container mt-5 mb-5">
    <div class="card shadow rounded-4">
        <div class="card-body">

            <h3 class="mb-4 text-center fw-bold">
                📋 Riwayat Booking Saya
            </h3>

            <?php if (mysqli_num_rows($query) == 0): ?>
                <div class="alert alert-info text-center">
                    Kamu belum pernah melakukan booking.
                </div>
            <?php else: ?>

            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Kode Booking</th>
                            <th>Jalur</th>
                            <th>Tanggal</th>
                            <th>Jumlah Pendaki</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $no = 1; while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td class="fw-bold text-primary">
                                <?= $row['kode_booking'] ?>
                            </td>

                            <td>
                                <span class="badge bg-secondary text-uppercase">
                                    <?= $row['jalur'] ?>
                                </span>
                            </td>

                            <td>
                                <?= date('d M Y', strtotime($row['tanggal'])) ?>
                            </td>

                            <td>
                                <?= $row['jumlah_pendaki'] ?> orang
                            </td>

                            <td>
                                <?php
                                if ($row['status_pembayaran'] == 'menunggu_pembayaran') {
                                    echo "<span class='badge bg-warning text-dark'>Belum Bayar</span>";
                                } elseif ($row['status_pembayaran'] == 'menunggu_konfirmasi') {
                                    echo "<span class='badge bg-info'>Menunggu Konfirmasi</span>";
                                } elseif ($row['status_pembayaran'] == 'berhasil') {
                                    echo "<span class='badge bg-success'>Berhasil</span>";
                                } else {
                                    echo "<span class='badge bg-danger'>Ditolak</span>";
                                }
                                ?>
                            </td>

                            <td>
                                <a href="riwayat.php?kode=<?= $row['kode_booking'] ?>" 
                                   class="btn btn-sm btn-primary mb-1">
                                   Detail
                                </a>

                                <?php if ($row['status_pembayaran'] == 'menunggu_pembayaran'): ?>
                                    <a href="pembayaran.php?kode=<?= $row['kode_booking'] ?>" 
                                       class="btn btn-sm btn-success">
                                       Bayar
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                    </tbody>
                </table>
            </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
