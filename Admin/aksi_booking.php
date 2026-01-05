<?php
include_once("../inc/inc_conn.php");

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM booking_pendaki 
    WHERE kode_booking='{$_POST['kode']}'
"));

$kode = $_POST['kode'];
$jalur = $data['jalur'];


if (isset($_POST['terima'])) {
    mysqli_query($koneksi, "
        UPDATE booking_pendaki
        SET status_pembayaran='berhasil'
        WHERE kode_booking='$kode'
    ");
}

if (isset($_POST['tolak'])) {
    mysqli_query($koneksi, "
        UPDATE booking_pendaki
        SET status_pembayaran='ditolak'
        WHERE kode_booking='$kode'
    ");
}

header("Location: ../Admin/booking_{$jalur}.php");
exit;
