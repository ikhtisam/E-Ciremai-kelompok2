<?php include "../Admin/header.php";

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM berita WHERE id='$id'"));

if(isset($_POST['update'])){
    $judul   = $_POST['judul'];
    $ringkas = $_POST['ringkas'];
    $konten  = $_POST['konten'];

    if($_FILES['gambar']['name']){
        $gambar = time().'_'.$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/berita/".$gambar);
        $imgSQL = ", gambar='$gambar'";
    } else {
        $imgSQL = "";
    }

    mysqli_query($koneksi,"
        UPDATE berita SET 
        judul='$judul',
        ringkas='$ringkas',
        konten='$konten'
        $imgSQL
        WHERE id='$id'
    ");

    header("Location: berita_index.php");
}
?>

<div class="container mt-5">
    <h3>✏ Edit Berita</h3>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="judul" class="form-control mb-3" value="<?= $d['judul'] ?>">
        <textarea name="ringkas" class="form-control mb-3"><?= $d['ringkas'] ?></textarea>
        <textarea name="konten" class="form-control mb-3"><?= $d['konten'] ?></textarea>
        <input type="file" name="gambar" class="form-control mb-3">
        <button name="update" class="btn btn-success">Update</button>
    </form>
</div>

<?php include "../Admin/footer.php"; ?>
