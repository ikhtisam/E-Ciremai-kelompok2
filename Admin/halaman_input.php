<?php include('header.php')?>

<?php 
$judul = "";
$kutipan = "";
$isi = "";
$error = "";
$sukses = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id != ""){
    // Perbaikan: id harus pakai variabel, bukan string 'id'
    $sql1 = "SELECT * FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    
    if($r1){
        $judul = $r1["judul"];
        $kutipan = $r1["kutipan"];
        $isi = $r1["isi"];
    } else {
        $error = "data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kutipan = $_POST['kutipan'];

    if ($judul == '' or $isi == '') {
        $error = "Silahkan masukan semua data";
    }

    if (empty($error)) {

        if($id != ""){
            // Perbaikan syntax query update
            $sql1 = "UPDATE halaman SET 
                        judul = '$judul', 
                        kutipan = '$kutipan', 
                        isi = '$isi', 
                        tgl_isi = NOW() 
                     WHERE id = '$id'";
        }else{
            // Insert hanya sekali (hapus duplikat)
            $sql1 = "INSERT INTO halaman (judul,kutipan,isi) 
                     VALUES ('$judul', '$kutipan', '$isi')";
        }

        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Data berhasil ditambahkan";

            // Mengosongkan form setelah sukses
            $judul = "";
            $kutipan = "";
            $isi = "";
        } else {
            $error = "Data gagal ditambahkan";
        }
    }
}
?>

<div class="container mt-4">

<h1>Halaman Input Data</h1>

<div class="mb-3 row">
    <a href="Halaman.php"> << Kembali Ke Halaman Admin</a>
</div>

<?php if ($error) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $error ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<?php if ($sukses) { ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <?php echo $sukses ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<form action="" method="post">
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kutipan" class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kutipan" name="kutipan" value="<?php echo $kutipan; ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control" rows="5" id="summernote"><?php echo $isi; ?></textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
        </div>
    </div>
</form>
</div>
<?php include('footer.php')?>
