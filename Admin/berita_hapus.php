<?php
include "../Admin/header.php";

// ================= VALIDASI PARAMETER =================
if (!isset($_GET['id'])) {
    header("Location: berita_index.php");
    exit;
}

$id = (int) $_GET['id'];

// ================= AMBIL DATA BERITA =================
$q = mysqli_query($koneksi, "
    SELECT gambar 
    FROM berita
    WHERE id = '$id'
");

if (!$q) {
    die("Query error: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($q);

// ================= HAPUS GAMBAR =================
if ($data && !empty($data['gambar'])) {
    $path = "../img/berita/" . $data['gambar'];

    if (file_exists($path)) {
        unlink($path);
    }
}

// ================= HAPUS DATA =================
mysqli_query($koneksi, "
    DELETE FROM berita 
    WHERE id = '$id'
");

header("Location: berita_index.php");
exit;
?>
