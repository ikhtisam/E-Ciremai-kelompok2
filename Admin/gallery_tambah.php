<?php
// WAJIB: koneksi dulu
include_once("../inc/inc_conn.php");

if (isset($_POST['simpan'])) {

    $judul  = mysqli_real_escape_string($koneksi, $_POST['judul']);

    $gambar = time() . '_' . $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // upload gambar
    move_uploaded_file($tmp, "../img/gallery/" . $gambar);

    // simpan ke database
    mysqli_query($koneksi, "
        INSERT INTO gallery (judul, gambar, created_at)
        VALUES ('$judul', '$gambar', NOW())
    ");

    header("Location: gallery_index.php");
    exit;
}
?>

<?php include "../Admin/header.php"; ?>

<div class="container mt-5">
    <h3>➕ Tambah Gallery</h3>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="gallery_index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../Admin/footer.php"; ?>
