<?php
include_once("../inc/inc_conn.php");

$id = (int)$_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT gambar FROM gallery WHERE id='$id'"));

if($data){
    unlink("../img/gallery/".$data['gambar']);
    mysqli_query($koneksi,"DELETE FROM gallery WHERE id='$id'");
}

header("Location: gallery_index.php");
exit;

?>
