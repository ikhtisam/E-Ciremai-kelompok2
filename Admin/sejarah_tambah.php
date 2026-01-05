<?php
include "../Admin/header.php";

if (isset($_POST['simpan'])) {

    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $ringkas = mysqli_real_escape_string($koneksi, $_POST['ringkas']);
    $konten  = mysqli_real_escape_string($koneksi, $_POST['konten']);

    $gambar  = time().'_'.$_FILES['gambar']['name'];
    $tmp     = $_FILES['gambar']['tmp_name'];

    // pastikan folder ada
    if (!is_dir("../img/sejarah")) {
        mkdir("../img/sejarah", 0777, true);
    }

    move_uploaded_file($tmp, "../img/sejarah/".$gambar);

    mysqli_query($koneksi, "
        INSERT INTO sejarah_ciremai
        (judul, ringkas, konten, gambar, created_at)
        VALUES
        ('$judul','$ringkas','$konten','$gambar',NOW())
    ");

    header("Location: sejarah_index.php");
    exit;
}
?>

<div class="container mt-5">
    <h3 class="mb-4">➕ Tambah Sejarah</h3>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ringkasan</label>
            <textarea name="ringkas" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Konten Lengkap</label>
            <textarea name="konten" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>

        <button name="simpan" class="btn btn-success">Simpan</button>
    </form>
</div>

<?php include "../Admin/footer.php"; ?>
