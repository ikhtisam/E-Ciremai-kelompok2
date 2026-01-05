<?php include('header.php') ?>
<?php
$sukses = "";
$error = "";
?>
<?php
$katakunci = (isset($_GET['KataKunci'])) ?
    $_GET['KataKunci'] : "";
?>


<?php
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == "delete") {
    $id = $_GET['id'];
    $sql1 = "delete from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Data berhasil dihapus";
    } else {
        $error = "Data gagal dihapus";
    }
}

?>
<div class="container mt-4">
<h1 class="text-center mt-4">Update Halaman Utama</h1>
<p>
    <a href="halaman_input.php">
        <input type="button" class="btn btn-primary" value="Buat Halaman Baru" />
    </a>
</p>

<!-- notifikasi data di hapus atau di Edit -->
<?php
if ($sukses) { ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?php echo $sukses ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if ($error) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $error ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<!-- notifikasi end -->

<form class="row g-3" method="get">
    <!-- diperbaiki: from → form, methode → method -->
    <div class="col-auto"> <input type="text" class="form-control" placeholder="Masukan Kata Kunci" name="KataKunci"
            value="<?php echo $katakunci ?>" />
    </div>
    <div class="col-auto"> <input type="submit" name="Cari" value="Cari Tulisan" class="btn btn-secondary" />
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kutipan</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $sqltambahan = "";
        if ($katakunci != "") {
            $array_katakunci = explode(" ", $katakunci);
            for ($x = 0; $x < count($array_katakunci); $x++) {
                $sqlcari[] = "judul LIKE '%" . $array_katakunci[$x] . "%' OR kutipan LIKE '%" . $array_katakunci[$x] . "%' OR isi LIKE '%" . $array_katakunci[$x] . "%'";
            }
            $sqltambahan = " WHERE " . implode(" OR ", $sqlcari);
        }
        $sql1 = "select * from halaman" . $sqltambahan . " order by id desc";
        $q1 = mysqli_query($koneksi, $sql1);
        $nomor = 1;
        while ($r1 = mysqli_fetch_array($q1)) { ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $r1['judul'] ?></td>
                <td><?php echo $r1['kutipan'] ?></td>
                <td>
                    <a href="halaman_input.php?id=<?php echo $r1['id']?>"
                         class="badge bg-warning text-dark">Edit</span>
                    </a>
                  <a href="halaman.php?op=delete&id=<?php echo $r1['id'] ?>"
                        onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> 
                        <span class="badge bg-danger">Hapus</span> </td>
            </tr> <?php } ?>
    </tbody>
</div>
</table> <?php include('footer.php') ?>