<?php include_once("header.php"); ?>

<?php
$bulan = $_GET['bulan'] ?? date('m');
$tahun = $_GET['tahun'] ?? date('Y');

$query = mysqli_query($koneksi, "
    SELECT * FROM kuota_pendakian 
    WHERE MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'
    ORDER BY tanggal ASC
");
?>

<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4 px-lg-5 py-3">
        <a href="index.php" class="navbar-brand p-0 text-white">
            <h1 class="m-0 text-white">
                <i class="fa fa-map-marker-alt me-3 text-white"></i>
                E-Ciremai
            </h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="booking.php" class="nav-item nav-link text-white">Jalur Pendakian</a>
                <a href="cek_kuota.php" class="nav-item nav-link text-black">Cek Kuota</a>
                <a href="home.php" class="nav-item nav-link text-white">Home</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<div class="container">
    <div style="height: 80px;"></div>

    <!-- isi konten di sini -->
</div>


<!-- Konten -->
<div class="container mt-4 bg-white p-4 shadow-lg rounded">

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label>Bulan</label>
            <select name="bulan" class="form-select">
                <?php for($i=1;$i<=12;$i++): ?>
                    <option value="<?= $i ?>" <?= $bulan==$i?'selected':'' ?>>
                        <?= date('F', mktime(0,0,0,$i,1)) ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="col-md-3">
            <label>Tahun</label>
            <input type="number" name="tahun" value="<?= $tahun ?>" class="form-control">
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-warning w-100">Cari</button>
        </div>
    </form>

    <p><b>Data yang ditampilkan adalah jumlah sisa kuota pada setiap jalur pendakian</b></p>

    <table class="table table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Tanggal</th>
                <th>Apuy</th>
                <th>Palutungan</th>
                <th>Linggarjati</th>
                <th>Sadarehe</th>
            </tr>
        </thead>
        <tbody>
            <?php while($d = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?= date('d-m-Y', strtotime($d['tanggal'])) ?></td>
                <td><?= $d['apuy'] ?></td>
                <td><?= $d['palutungan'] ?></td>
                <td><?= $d['linggarjati'] ?></td>
                <td><?= $d['sadarehe'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<div class="container">
    <div style="height: 80px;"></div>

    <!-- isi konten di sini -->
</div>

<?php include_once("footer.php"); ?>
