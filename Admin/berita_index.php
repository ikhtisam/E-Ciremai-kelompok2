<?php include "../Admin/header.php";

$limit = 5;
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$keyword = $_GET['cari'] ?? '';
$where = $keyword ? "WHERE judul LIKE '%$keyword%'" : "";

$q = mysqli_query($koneksi, "
    SELECT * FROM berita 
    $where 
    ORDER BY created_at DESC 
    LIMIT $start,$limit
");

$total = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM berita $where"));
$pages = ceil($total / $limit);
?>

<div class="container mt-5">
    <h3>📰 Data Berita</h3>

    <form class="mb-3">
        <input type="text" name="cari" class="form-control" placeholder="Cari judul berita...">
    </form>

    <a href="berita_tambah.php" class="btn btn-success mb-3">+ Tambah</a>

    <table class="table table-bordered">
        <tr class="table-success text-center">
            <th>Judul</th>
            <th>Gambar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php while($d=mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $d['judul'] ?></td>
            <td class="text-center">
                <img src="../img/berita/<?= $d['gambar'] ?>" width="80">
            </td>
            <td><?= date('d M Y', strtotime($d['created_at'])) ?></td>
            <td class="text-center">
                <a href="berita_edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="berita_hapus.php?id=<?= $d['id'] ?>"
                   onclick="return confirm('Hapus?')"
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-center gap-2">
        <?php for($i=1;$i<=$pages;$i++): ?>
            <a href="?page=<?= $i ?>" class="btn btn-outline-success btn-sm"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>

<?php include "../Admin/footer.php"; ?>
