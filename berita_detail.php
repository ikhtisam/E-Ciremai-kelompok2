<?php include "header.php";

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM berita WHERE id='$id'"));
?>

<div class="container my-5">
    <h2><?= $d['judul'] ?></h2>
    <p class="text-muted"><?= date('d M Y', strtotime($d['created_at'])) ?></p>

    <img src="img/berita/<?= $d['gambar'] ?>" class="img-fluid rounded mb-4">

    <p><?= nl2br($d['konten']) ?></p>

    <a href="berita.php" class="btn btn-secondary mt-3">← Kembali</a>
</div>

<?php include "footer.php"; ?>
