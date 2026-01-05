<?php include_once("../Admin/header.php"); ?>

<?php
// ================== FILTER INPUT ==================
$kode   = $_GET['kode'] ?? '';
$status = $_GET['status'] ?? '';
$tgl    = $_GET['tanggal'] ?? '';

// ================== PAGINATION ==================
$limit = 10;
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page  = max($page, 1);
$offset = ($page - 1) * $limit;

// ================== WHERE CONDITION ==================
$where = "WHERE bp.jalur = 'linggarjati'";

if (!empty($kode)) {
    $where .= " AND bp.kode_booking LIKE '%$kode%'";
}

if (!empty($status)) {
    $where .= " AND bp.status_pembayaran = '$status'";
}

if (!empty($tgl)) {
    $where .= " AND kp.tanggal = '$tgl'";
}

// ================== TOTAL DATA ==================
$total_q = mysqli_query($koneksi, "
    SELECT COUNT(*) AS total
    FROM booking_pendaki bp
    JOIN kuota_pendakian kp ON bp.id_kp = kp.id_kp
    $where
");

$total_data = mysqli_fetch_assoc($total_q)['total'];
$total_page = ceil($total_data / $limit);

// ================== DATA QUERY ==================
$q = mysqli_query($koneksi, "
    SELECT 
        bp.*,
        kp.tanggal AS tanggal_pendakian
    FROM booking_pendaki bp
    JOIN kuota_pendakian kp ON bp.id_kp = kp.id_kp
    $where
    ORDER BY bp.id_booking DESC
    LIMIT $limit OFFSET $offset
");
?>

<div class="container mt-5">

    <h3 class="mb-4 text-center">
        📋 Daftar Booking Jalur <span class="text-success fw-bold">Linggarjati</span>
    </h3>

    <!-- ================= FILTER ================= -->
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="text" name="kode" class="form-control"
                   placeholder="Kode Booking"
                   value="<?= htmlspecialchars($kode) ?>">
        </div>

        <div class="col-md-3">
            <input type="date" name="tanggal" class="form-control"
                   value="<?= htmlspecialchars($tgl) ?>">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">-- Semua Status --</option>
                <option value="menunggu_pembayaran" <?= $status=='menunggu_pembayaran'?'selected':'' ?>>Belum Bayar</option>
                <option value="menunggu_konfirmasi" <?= $status=='menunggu_konfirmasi'?'selected':'' ?>>Menunggu</option>
                <option value="berhasil" <?= $status=='berhasil'?'selected':'' ?>>Berhasil</option>
                <option value="ditolak" <?= $status=='ditolak'?'selected':'' ?>>Ditolak</option>
            </select>
        </div>

        <div class="col-md-3 d-grid">
            <button class="btn btn-success">🔍 Filter</button>
        </div>
    </form>

    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-success">
                <tr>
                    <th>Kode</th>
                    <th>Jalur</th>
                    <th>Tgl Booking</th>
                    <th>Tgl Pendakian</th>
                    <th>Leader</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (mysqli_num_rows($q) == 0): ?>
                <tr>
                    <td colspan="9" class="text-muted">
                        Tidak ada data booking
                    </td>
                </tr>
            <?php endif; ?>

            <?php while ($d = mysqli_fetch_assoc($q)): ?>
                <tr>
                    <td class="fw-bold text-primary"><?= $d['kode_booking'] ?></td>

                    <td>
                        <span class="badge bg-secondary text-uppercase">
                            <?= $d['jalur'] ?>
                        </span>
                    </td>

                    <td><?= date('d M Y', strtotime($d['created_at'])) ?></td>
                    <td><?= date('d M Y', strtotime($d['tanggal_pendakian'])) ?></td>

                    <td><?= $d['nama_lengkap'] ?></td>
                    <td><?= $d['jumlah_pendaki'] ?> org</td>

                    <td>
                        Rp <?= number_format($d['total_pembayaran'], 0, ',', '.') ?>
                    </td>

                    <td>
                        <?php
                        if ($d['status_pembayaran'] == 'menunggu_pembayaran')
                            echo "<span class='badge bg-secondary'>Belum Bayar</span>";
                        elseif ($d['status_pembayaran'] == 'menunggu_konfirmasi')
                            echo "<span class='badge bg-warning'>Menunggu</span>";
                        elseif ($d['status_pembayaran'] == 'berhasil')
                            echo "<span class='badge bg-success'>Berhasil</span>";
                        else
                            echo "<span class='badge bg-danger'>Ditolak</span>";
                        ?>
                    </td>

                    <td class="d-flex justify-content-center gap-1">
                        <a href="detail_booking.php?kode=<?= $d['kode_booking'] ?>" class="btn btn-sm btn-success">Detail</a>
                        <a href="detail_leader.php?kode=<?= $d['kode_booking'] ?>" class="btn btn-sm btn-primary">Leader</a>
                        <a href="detail_anggota.php?kode=<?= $d['kode_booking'] ?>" class="btn btn-sm btn-warning">Anggota</a>
                        <a href="hapus_booking.php?kode=<?= $d['kode_booking'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin hapus booking ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- ================= PAGINATION ================= -->
    <?php if ($total_page > 1): ?>
    <nav>
        <ul class="pagination justify-content-center mt-4">

        <?php
        $params = $_GET;
        unset($params['page']);
        $base = '?' . http_build_query($params);
        ?>

        <li class="page-item <?= ($page<=1)?'disabled':'' ?>">
            <a class="page-link" href="<?= $base ?>&page=<?= $page-1 ?>">‹</a>
        </li>

        <?php for ($i=1; $i<=$total_page; $i++): ?>
        <li class="page-item <?= ($i==$page)?'active':'' ?>">
            <a class="page-link" href="<?= $base ?>&page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>

        <li class="page-item <?= ($page>=$total_page)?'disabled':'' ?>">
            <a class="page-link" href="<?= $base ?>&page=<?= $page+1 ?>">›</a>
        </li>

        </ul>
    </nav>
    <?php endif; ?>

</div>

<?php include_once("../Admin/footer.php"); ?>
