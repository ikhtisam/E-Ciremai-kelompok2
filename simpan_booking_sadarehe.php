<?php include_once "header.php"; ?>

<?php
// ================= CEK LOGIN (WAJIB) =================
if (!isset($_SESSION['akun_id'])) {
    header("Location: index.php");
    exit;
}

$pesan = '';

if (isset($_POST['booking'])) {

    $akun_id = $_SESSION['akun_id'];
    mysqli_begin_transaction($koneksi);

    try {

        // ================= AMBIL & VALIDASI INPUT =================
        $tanggal = $_POST['tanggal'];
        $jalur = 'sadarehe';
        $jumlah  = (int) $_POST['jumlah_pendaki'];

        if ($tanggal < date('Y-m-d')) {
            throw new Exception("Tanggal pendakian tidak valid");
        }

        if ($jumlah < 4) {
            throw new Exception("Minimal 4 pendaki");
        }

        if (!isset($_POST['anggota_nama']) || count($_POST['anggota_nama']) != ($jumlah - 1)) {
            throw new Exception("Data anggota tidak lengkap");
        }

        // ================= ESCAPE INPUT STRING =================
        $no_ktp            = mysqli_real_escape_string($koneksi, $_POST['no_ktp']);
        $nama_lengkap      = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
        $tgl_lahir         = $_POST['tgl_lahir'];
        $jenis_kelamin     = $_POST['jenis_kelamin'];
        $berat_badan       = (int) $_POST['berat_badan'];
        $tinggi_badan      = (int) $_POST['tinggi_badan'];
        $email             = mysqli_real_escape_string($koneksi, $_POST['email']);
        $no_telp           = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
        $no_telp_keluarga  = mysqli_real_escape_string($koneksi, $_POST['no_telp_keluarga']);

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
            $kode_jalur = strtoupper(substr($jalur, 0, 3));
            $tgl_kode   = date('Ymd');
            $random     = strtoupper(substr(md5(uniqid()), 0, 4));
            $kode_booking = "BK-$kode_jalur-$tgl_kode-$random";

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
);


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

        mysqli_commit($koneksi);
        header("Location: pembayaran.php?kode=$kode_booking");
        exit;

    } catch (Exception $e) {
        mysqli_rollback($koneksi);
        $pesan = "<div class='alert alert-danger'>{$e->getMessage()}</div>";
    }
}
?>

<!-- ================= FORM BOOKING ================= -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Booking Pendakian Via sadarehe</h4>
                </div>

                <?= $pesan ?>

                <div class="card-body p-4">
                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Tanggal Pendakian</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <input type="hidden" name="jalur" value="sadarehe">

                        <div class="mb-3">
                            <label class="form-label">Jumlah Pendaki</label>
                            <input type="number" id="jumlah_pendaki" name="jumlah_pendaki" class="form-control" min="4" required>
                        </div>

                        <div id="anggota-container"></div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label">No KTP</label>
                            <input type="text" name="no_ktp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap (Leader)</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Berat Badan (kg)</label>
                                <input type="number" name="berat_badan" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" name="tinggi_badan" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">No Telepon Keluarga</label>
                            <input type="text" name="no_telp_keluarga" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="booking" class="btn btn-success btn-lg">
                                Booking Sekarang
                            </button>
                        </div>

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

jumlahInput.addEventListener('input', function () {
    container.innerHTML = '';
    let total = parseInt(this.value);
    if (isNaN(total)) return;

    if (total < 4) {
        container.innerHTML = `
            <div class="alert alert-warning mt-3">
                Minimal 4 pendaki (1 leader + 3 anggota)
            </div>`;
        return;
    }

    let anggota = total - 1;

    container.innerHTML += `<h5 class="mt-4 mb-3">Data Anggota Pendakian</h5>`;

    for (let i = 1; i <= anggota; i++) {
        container.innerHTML += `
        <div class="card mb-3">
            <div class="card-body">
                <h6>Anggota ${i}</h6>

                <input type="text" name="anggota_nama[]" class="form-control mb-2" placeholder="Nama Lengkap" required>
                <input type="text" name="anggota_ktp[]" class="form-control mb-2" placeholder="No KTP" required>

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
