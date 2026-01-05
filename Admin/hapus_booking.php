<?php
include_once("../inc/inc_conn.php"); // sesuaikan file koneksi lu

if (!isset($_GET['kode'])) {
    header("Location: ../Admin/list_booking.php");
    exit;
}

$kode = $_GET['kode'];

mysqli_begin_transaction($koneksi);

try {

    // ambil data booking
    $booking = mysqli_fetch_assoc(mysqli_query($koneksi, "
        SELECT * FROM booking_pendaki 
        WHERE kode_booking='$kode'
    "));

    if (!$booking) {
        throw new Exception("Data booking tidak ditemukan");
    }

    $id_booking = $booking['id_booking'];
    $jalur      = $booking['jalur'];
    $jumlah     = (int) $booking['jumlah_pendaki'];
    $id_kp      = $booking['id_kp'];

    // ================= BALIKIN KUOTA =================
    $kuota = mysqli_fetch_assoc(mysqli_query($koneksi, "
        SELECT * FROM kuota_pendakian 
        WHERE id_kp='$id_kp'
    "));

    if ($kuota) {
        $baru = (int) $kuota[$jalur] + $jumlah;

        mysqli_query($koneksi, "
            UPDATE kuota_pendakian 
            SET $jalur='$baru'
            WHERE id_kp='$id_kp'
        ");
    }

    // ================= HAPUS ANGGOTA =================
    mysqli_query($koneksi, "
        DELETE FROM booking_anggota 
        WHERE id_booking='$id_booking'
    ");

    // ================= HAPUS BOOKING =================
    mysqli_query($koneksi, "
        DELETE FROM booking_pendaki 
        WHERE id_booking='$id_booking'
    ");

    mysqli_commit($koneksi);

    header("Location: booking_{$jalur}.php");
    exit;

} catch (Exception $e) {
    mysqli_rollback($koneksi);
    echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
}
