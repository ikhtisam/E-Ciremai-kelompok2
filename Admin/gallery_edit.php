
<?php include_once("../inc/inc_conn.php");?>
<?php
$id = (int)$_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM gallery WHERE id='$id'"));

if(isset($_POST['update'])){
    $judul = mysqli_real_escape_string($koneksi,$_POST['judul']);

    if(!empty($_FILES['gambar']['name'])){
        unlink("../img/gallery/".$data['gambar']);

        $gambar = time().'_'.$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'],"../img/gallery/".$gambar);

        mysqli_query($koneksi,"
            UPDATE gallery SET judul='$judul',gambar='$gambar' WHERE id='$id'
        ");
    } else {
        mysqli_query($koneksi,"
            UPDATE gallery SET judul='$judul' WHERE id='$id'
        ");
    }

    header("Location: gallery_index.php");
    exit;
}
?>

<?php include "../Admin/header.php"; ?>

<div class="container mt-5">
    <h3>✏️ Edit Gallery</h3>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <img src="/img/gallery/<?= $data['gambar'] ?>" width="200" class="mb-2"><br>
            <label>Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button name="update" class="btn btn-warning">Update</button>
        <a href="gallery_index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../Admin/footer.php"; ?>
