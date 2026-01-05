<?php
include_once("../Admin/header.php");

// ================= FILTER GRAFIK =================
$filter = $_GET['filter'] ?? 'minggu';

switch ($filter) {
    case 'hari':
        $groupBy = "HOUR(created_at)";
        $labelFormat = "H:i";
        $where = "DATE(created_at)=CURDATE()";
        break;

    case 'bulan':
        $groupBy = "DATE(created_at)";
        $labelFormat = "d M";
        $where = "MONTH(created_at)=MONTH(CURDATE())";
        break;

    case 'tahun':
        $groupBy = "MONTH(created_at)";
        $labelFormat = "M";
        $where = "YEAR(created_at)=YEAR(CURDATE())";
        break;

    default: // minggu
        $groupBy = "DATE(created_at)";
        $labelFormat = "d M";
        $where = "created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
        break;
}

// ================= TOTAL DATA =================
$total_booking = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT COUNT(*) total FROM booking_pendaki"
))['total'];

$total_pendaki = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT SUM(jumlah_pendaki) total FROM booking_pendaki"
))['total'] ?? 0;

$total_berita = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT COUNT(*) total FROM berita"
))['total'];

$total_sejarah = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT COUNT(*) total FROM sejarah_ciremai"
))['total'];

// ================= GRAFIK =================
$grafik = mysqli_query($koneksi, "
    SELECT $groupBy waktu, COUNT(*) total
    FROM booking_pendaki
    WHERE $where
    GROUP BY waktu
    ORDER BY waktu ASC
");

$labels = [];
$data = [];

while ($g = mysqli_fetch_assoc($grafik)) {
    $labels[] = date($labelFormat, strtotime($g['waktu']));
    $data[]   = $g['total'];
}
?>

<div class="container mt-5">

<h3 class="fw-bold mb-4">📊 Dashboard Admin E-Ciremai</h3>

<!-- ================= SUMMARY ================= -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Booking</h6>
                <h2 class="text-primary fw-bold"><?= $total_booking ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Pendaki</h6>
                <h2 class="text-success fw-bold"><?= $total_pendaki ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Berita</h6>
                <h2 class="text-warning fw-bold"><?= $total_berita ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Sejarah</h6>
                <h2 class="text-secondary fw-bold"><?= $total_sejarah ?></h2>
            </div>
        </div>
    </div>

</div>

<!-- ================= FILTER ================= -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>📈 Grafik Booking</h5>

    <form method="GET">
        <select name="filter" class="form-select" onchange="this.form.submit()">
            <option value="hari" <?= $filter=='hari'?'selected':'' ?>>Hari Ini</option>
            <option value="minggu" <?= $filter=='minggu'?'selected':'' ?>>7 Hari</option>
            <option value="bulan" <?= $filter=='bulan'?'selected':'' ?>>Bulan Ini</option>
            <option value="tahun" <?= $filter=='tahun'?'selected':'' ?>>Tahun Ini</option>
        </select>
    </form>
</div>

<!-- ================= GRAFIK ================= -->
<div class="card shadow mb-5">
    <div class="card-body">
        <canvas id="chartBooking"></canvas>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('chartBooking'), {
    type: 'line',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Jumlah Booking',
            data: <?= json_encode($data) ?>,
            fill: true,
            tension: 0.4,
            borderWidth: 2
        }]
    }
});
</script>

<?php include_once("../Admin/footer.php"); ?>
