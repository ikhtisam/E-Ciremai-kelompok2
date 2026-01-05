<?php include "../Admin/header.php";

if (isset($_POST['simpan'])) {

    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $ringkas = mysqli_real_escape_string($koneksi, $_POST['ringkas']);
    $konten  = mysqli_real_escape_string($koneksi, $_POST['konten']);

    $gambar = time().'_'.$_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../img/berita/".$gambar);

    mysqli_query($koneksi, "
        INSERT INTO berita (judul, ringkas, konten, gambar, created_at)
        VALUES ('$judul','$ringkas','$konten','$gambar',NOW())
    ");

    header("Location: berita_index.php");
    exit;
}
?>

<div class="container mt-5">
    <h3>➕ Tambah Berita</h3>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="judul" class="form-control mb-3" placeholder="Judul" required>
        <textarea name="ringkas" class="form-control mb-3" placeholder="Ringkasan"></textarea>
        <textarea name="konten" class="form-control mb-3" rows="6" placeholder="Konten Lengkap"></textarea>
        <input type="file" name="gambar" class="form-control mb-3" required>

        <button name="simpan" class="btn btn-success">Simpan</button>
    </form>
</div>

<?php include "../Admin/footer.php"; ?>
