<?php include_once "header.php"; ?>

<?php
// ================= SET TIMEZONE =================
date_default_timezone_set('Asia/Jakarta');

// ================= INCLUDE HEADER =================
include_once "header.php";

// ================= CEK LOGIN =================
if (!isset($_SESSION['akun_id'])) {
    header("Location: index.php");
    exit;
}

$pesan = '';

// ================= PROSES BOOKING =================
if (isset($_POST['booking'])) {

    $akun_id = $_SESSION['akun_id'];
    mysqli_begin_transaction($koneksi);

    try {

        // ================= AMBIL INPUT =================
        $akun_id = $_SESSION['akun_id'];
        $tanggal = $_POST['tanggal'];
        $jalur   = 'linggarjati';
        $jumlah  = (int) $_POST['jumlah_pendaki'];

        // ================= VALIDASI TANGGAL (AMAN) =================
        $tgl_booking = strtotime($tanggal);
        $hari_ini    = strtotime(date('Y-m-d'));

        if ($tgl_booking < $hari_ini) {
            throw new Exception("Tanggal pendakian tidak valid");
        }

        // ================= VALIDASI JUMLAH =================
        if ($jumlah < 4) {
            throw new Exception("Minimal 4 pendaki");
        }

        if (!isset($_POST['anggota_nama']) || count($_POST['anggota_nama']) != ($jumlah - 1)) {
            throw new Exception("Data anggota tidak lengkap");
        }

        // ================= ESCAPE INPUT =================
        $no_ktp           = mysqli_real_escape_string($koneksi, $_POST['no_ktp']);
        $nama_lengkap     = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
        $tgl_lahir        = $_POST['tgl_lahir'];
        $jenis_kelamin    = $_POST['jenis_kelamin'];
        $berat_badan      = (int) $_POST['berat_badan'];
        $tinggi_badan     = (int) $_POST['tinggi_badan'];
        $email            = mysqli_real_escape_string($koneksi, $_POST['email']);
        $no_telp          = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
        $no_telp_keluarga = mysqli_real_escape_string($koneksi, $_POST['no_telp_keluarga']);

        // ================= CEK KUOTA =================
        $q = mysqli_query($koneksi, "SELECT * FROM kuota_pendakian WHERE tanggal='$tanggal'");
        $data = mysqli_fetch_assoc($q);

        if (!$data) {
            throw new Exception("Kuota tanggal ini belum tersedia");
        }

        $sisa_kuota = (int) $data[$jalur];

        if ($jumlah > $sisa_kuota) {
            throw new Exception("Kuota tidak mencukupi");
        }

        // ================= GENERATE KODE BOOKING =================
        do {
            $kode_booking = "BK-" .
                strtoupper(substr($jalur, 0, 3)) . "-" .
                date('Ymd') . "-" .
                strtoupper(substr(md5(uniqid()), 0, 4));

            $cek = mysqli_query($koneksi,
                "SELECT id_booking FROM booking_pendaki WHERE kode_booking='$kode_booking'"
            );
        } while (mysqli_num_rows($cek) > 0);

        // ================= SIMPAN LEADER =================
        mysqli_query($koneksi, "
            INSERT INTO booking_pendaki (
                akun_id, kode_booking, id_kp, jalur, jumlah_pendaki,
                no_ktp, nama_lengkap, tgl_lahir, jenis_kelamin,
                berat_badan, tinggi_badan, email, no_telp,
                no_telp_keluarga, status_pembayaran, created_at
            ) VALUES (
                '$akun_id', '$kode_booking', '{$data['id_kp']}', '$jalur', '$jumlah',
                '$no_ktp', '$nama_lengkap', '$tgl_lahir', '$jenis_kelamin',
                '$berat_badan', '$tinggi_badan', '$email', '$no_telp',
                '$no_telp_keluarga', 'menunggu_pembayaran', NOW()
            )
        ");

        $id_booking = mysqli_insert_id($koneksi);

        // ================= SIMPAN ANGGOTA =================
        foreach ($_POST['anggota_nama'] as $i => $nama) {

            $nama_anggota = mysqli_real_escape_string($koneksi, $nama);
            $ktp_anggota  = mysqli_real_escape_string($koneksi, $_POST['anggota_ktp'][$i]);
            $jk_anggota   = $_POST['anggota_jk'][$i];

            mysqli_query($koneksi, "
                INSERT INTO booking_anggota (
                    id_booking, nama_lengkap, no_ktp, jenis_kelamin
                ) VALUES (
                    '$id_booking', '$nama_anggota', '$ktp_anggota', '$jk_anggota'
                )
            ");
        }

        // ================= COMMIT =================
        mysqli_commit($koneksi);

        header("Location: pembayaran.php?kode=$kode_booking");
        exit;

    } catch (Exception $e) {
        mysqli_rollback($koneksi);
        $pesan = "<div class='alert alert-danger'>{$e->getMessage()}</div>";
    }
}
?>

<!-- ================= FORM ================= -->
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-md-8 col-lg-6">

<div class="card shadow-lg border-0 rounded-4">
<div class="card-header bg-success text-white text-center">
    <h4 class="mb-0">Booking Pendakian Via Linggarjati</h4>
</div>

<?= $pesan ?>

<div class="card-body p-4">
<form method="POST">

<div class="mb-3">
    <label>Tanggal Pendakian</label>
    <input type="date" name="tanggal"
           min="<?= date('Y-m-d') ?>"
           class="form-control" required>
</div>

<div class="mb-3">
    <label>Jumlah Pendaki</label>
    <input type="number" id="jumlah_pendaki" name="jumlah_pendaki"
           min="4" class="form-control" required>
</div>

<div id="anggota-container"></div>
<hr>

<input type="text" name="no_ktp" class="form-control mb-2" placeholder="No KTP" required>
<input type="text" name="nama_lengkap" class="form-control mb-2" placeholder="Nama Leader" required>
<input type="date" name="tgl_lahir" class="form-control mb-2" required>

<select name="jenis_kelamin" class="form-select mb-2" required>
    <option value="L">Laki-laki</option>
    <option value="P">Perempuan</option>
</select>

<input type="number" name="berat_badan" class="form-control mb-2" placeholder="Berat Badan" required>
<input type="number" name="tinggi_badan" class="form-control mb-2" placeholder="Tinggi Badan" required>
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="text" name="no_telp" class="form-control mb-2" placeholder="No Telp" required>
<input type="text" name="no_telp_keluarga" class="form-control mb-3" placeholder="No Telp Keluarga" required>

<button name="booking" class="btn btn-success w-100">Booking Sekarang</button>

</form>
</div>
</div>

</div>
</div>
</div>

<!-- ================= JS TAMBAH ANGGOTA ================= -->
<script>
const jumlahInput = document.getElementById('jumlah_pendaki');
const container = document.getElementById('anggota-container');

jumlahInput.addEventListener('input', () => {
    container.innerHTML = '';
    let total = parseInt(jumlahInput.value);
    if (isNaN(total) || total < 4) return;

    for (let i = 1; i <= total - 1; i++) {
        container.innerHTML += `
        <div class="card mb-2">
            <div class="card-body">
                <b>Anggota ${i}</b>
                <input name="anggota_nama[]" class="form-control mb-1" placeholder="Nama" required>
                <input name="anggota_ktp[]" class="form-control mb-1" placeholder="No KTP" required>
                <select name="anggota_jk[]" class="form-select" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>`;
    }
});
</script>

<?php include_once "footer.php"; ?>
