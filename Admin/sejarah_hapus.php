<?php
include "../header.php";

$id = $_GET['id'];

$d = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT gambar FROM sejarah WHERE id='$id'"
));

if ($d) {
    unlink("../../img/sejarah/".$d['gambar']);
    mysqli_query($koneksi, "DELETE FROM sejarah WHERE id='$id'");
}

header("Location: sejarah_index.php");
exit;
