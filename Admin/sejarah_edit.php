<?php include "../Admin/header.php"; ?>

<?php
$id = $_GET['id'] ?? 0;

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM sejarah_ciremai WHERE id='$id'
"));

if (!$data) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
    exit;
}

if (isset($_POST['update'])) {

    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $ringkas = mysqli_real_escape_string($koneksi, $_POST['ringkas']);
    $konten  = mysqli_real_escape_string($koneksi, $_POST['konten']);

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = time().'_'.$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/sejarah/$gambar");

        mysqli_query($koneksi, "
            UPDATE sejarah_ciremai SET
            judul='$judul',
            ringkas='$ringkas',
            konten='$konten',
            gambar='$gambar'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($koneksi, "
            UPDATE sejarah_ciremai SET
            judul='$judul',
            ringkas='$ringkas',
            konten='$konten'
            WHERE id='$id'
        ");
    }

    header("Location: sejarah_index.php");
    exit;
}
?>

<div class="container mt-5">
    <h3 class="mb-4">✏ Edit Sejarah</h3>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul"
                   value="<?= $data['judul']; ?>"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ringkasan</label>
            <textarea name="ringkas" class="form-control"
                      rows="3"><?= $data['ringkas']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea name="konten" class="form-control"
                      rows="5"><?= $data['konten']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar (kosongkan jika tidak diganti)</label><br>
            <img src="../img/sejarah/<?= $data['gambar']; ?>" width="120" class="mb-2 rounded">
            <input type="file" name="gambar" class="form-control">
        </div>

        <button name="update" class="btn btn-success">
            Update
        </button>
        <a href="sejarah_index.php" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

<?php include "../Admin/footer.php"; ?>
