<?php include "../Admin/header.php"; ?>

<?php
// ================= CONFIG =================
$limit = 5; // jumlah data per halaman
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page  = ($page < 1) ? 1 : $page;
$start = ($page - 1) * $limit;

// ================= FILTER =================
$keyword = $_GET['q'] ?? '';
$where = '';

if ($keyword != '') {
    $keyword = mysqli_real_escape_string($koneksi, $keyword);
    $where = "WHERE judul LIKE '%$keyword%'";
}

// ================= HITUNG TOTAL DATA =================
$total_q = mysqli_query($koneksi, "
    SELECT COUNT(*) as total FROM sejarah_ciremai $where
");
$total_d = mysqli_fetch_assoc($total_q);
$total   = $total_d['total'];
$pages   = ceil($total / $limit);

// ================= AMBIL DATA =================
$q = mysqli_query($koneksi, "
    SELECT * FROM sejarah_ciremai
    $where
    ORDER BY created_at DESC
    LIMIT $start, $limit
");
?>

<div class="container mt-5">
    <h3 class="mb-4">📜 Data Sejarah Gunung Ciremai</h3>

    <div class="d-flex justify-content-between mb-3">
        <a href="sejarah_tambah.php" class="btn btn-success">
            + Tambah Sejarah
        </a>

        <form method="GET" class="d-flex gap-2">
            <input type="text" name="q" class="form-control"
                   placeholder="Cari judul..."
                   value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-success text-center">
                <tr>
                    <th>Judul</th>
                    <th>Ringkas</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (mysqli_num_rows($q) == 0): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data tidak ditemukan
                    </td>
                </tr>
            <?php endif; ?>

            <?php while ($d = mysqli_fetch_assoc($q)): ?>
                <tr>
                    <td><?= $d['judul']; ?></td>
                    <td><?= substr($d['ringkas'], 0, 100); ?>...</td>
                    <td class="text-center">
                        <img src="../img/sejarah/<?= $d['gambar']; ?>"
                             width="80" class="rounded">
                    </td>
                    <td><?= date('d M Y', strtotime($d['created_at'])); ?></td>
                    <td class="text-center">
                        <a href="sejarah_edit.php?id=<?= $d['id']; ?>"
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <a href="sejarah_hapus.php?id=<?= $d['id']; ?>"
                           onclick="return confirm('Yakin hapus data ini?')"
                           class="btn btn-danger btn-sm">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <?php if ($pages > 1): ?>
    <nav class="mt-3">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link"
                       href="?page=<?= $i ?>&q=<?= urlencode($keyword) ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php endif; ?>
</div>

<?php include "../Admin/footer.php"; ?>
