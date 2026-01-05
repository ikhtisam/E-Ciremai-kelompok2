<?php
include '../Admin/header.php'; // pastikan di sini ada $koneksi

$notif = "";

if (isset($_POST['simpan'])) {

    $tanggal     = $_POST['tanggal'];
    $apuy        = $_POST['apuy'];
    $palutungan  = $_POST['palutungan'];
    $linggarjati = $_POST['linggarjati'];
    $sadarehe    = $_POST['sadarehe'];

    $sql = "INSERT INTO kuota_pendakian 
            (tanggal, apuy, palutungan, linggarjati, sadarehe)
            VALUES 
            ('$tanggal','$apuy','$palutungan','$linggarjati','$sadarehe')";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
    $notif = "<div class='alert alert-success'>
                Data kuota berhasil ditambahkan
              </div>";  
    } else {
        $notif = "<div class='alert alert-danger'>
                    Gagal menyimpan data : ".mysqli_error($koneksi)."
                  </div>";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tambah Kuota Pendakian</h5>
                </div>

                <div class="card-body">
                    <?= $notif ?>

                    <form method="POST">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control mb-2" required>

                        <input type="number" name="apuy" class="form-control mb-2" placeholder="Apuy" value="">
                        <input type="number" name="palutungan" class="form-control mb-2" placeholder="Palutungan" value="">
                        <input type="number" name="linggarjati" class="form-control mb-2" placeholder="Linggarjati" value="">
                        <input type="number" name="sadarehe" class="form-control mb-3" placeholder="Sadarehe" value="">

                        <button name="simpan" class="btn btn-success">Simpan</button>
                        <a href="../Admin/k_pendaki.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div style="height: 80px;"></div>

    <!-- isi konten di sini -->
</div>



<?php include_once("../Admin/footer.php"); ?>