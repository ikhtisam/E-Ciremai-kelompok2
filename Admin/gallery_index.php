<?php include "../Admin/header.php"; ?>

<?php
$limit = 10;
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$total = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(*) total FROM gallery"))['total'];
$pages = ceil($total / $limit);

$q = mysqli_query($koneksi,"
    SELECT * FROM gallery 
    ORDER BY created_at DESC 
    LIMIT $start, $limit
");
?>

<div class="container mt-5">
    <h3 class="mb-4">🖼️ Manajemen Gallery</h3>

    <a href="gallery_tambah.php" class="btn btn-success mb-3">+ Tambah Gambar</a>

    <table class="table table-bordered align-middle">
        <thead class="table-success text-center">
            <tr>
                <th>Preview</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if(mysqli_num_rows($q)==0): ?>
            <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
        <?php endif; ?>

        <?php while($d=mysqli_fetch_assoc($q)): ?>
            <tr>
                <td class="text-center">
                    <img src="../img/gallery/<?= $d['gambar'] ?>" width="120">
                </td>
                <td><?= $d['judul'] ?></td>
                <td><?= date('d M Y',strtotime($d['created_at'])) ?></td>
                <td class="text-center">
                    <a href="gallery_edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="gallery_hapus.php?id=<?= $d['id'] ?>"
                       onclick="return confirm('Hapus gambar?')"
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <!-- PAGINATION -->
    <nav>
        <ul class="pagination justify-content-center">
        <?php for($i=1;$i<=$pages;$i++): ?>
            <li class="page-item <?= ($i==$page)?'active':'' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php include "../Admin/footer.php"; ?>
