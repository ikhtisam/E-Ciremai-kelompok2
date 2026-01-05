<?php
session_start();
include_once("../inc/inc_conn.php");

// ================= VARIABEL =================
$bulan   = $_GET['bulan'] ?? date('m');
$tahun   = $_GET['tahun'] ?? date('Y');
$edit_id = $_GET['edit'] ?? '';

// ================= UPDATE =================
if (isset($_POST['update'])) {

    $id_kp = $_POST['id_kp'];

    $update = mysqli_query($koneksi, "
        UPDATE kuota_pendakian SET
            tanggal='$_POST[tanggal]',
            apuy='$_POST[apuy]',
            palutungan='$_POST[palutungan]',
            linggarjati='$_POST[linggarjati]',
            sadarehe='$_POST[sadarehe]'
        WHERE id_kp='$id_kp'
    ");

    if ($update) {
        $_SESSION['success'] = "Data berhasil diperbarui";
    } else {
        $_SESSION['error'] = "Gagal update: " . mysqli_error($koneksi);
    }

    header("Location: k_pendaki.php?bulan=$bulan&tahun=$tahun");
    exit;
}

// ================= DELETE =================
if (isset($_GET['hapus'])) {
    $id_kp = $_GET['hapus'];

    $hapus = mysqli_query($koneksi, "DELETE FROM kuota_pendakian WHERE id_kp='$id_kp'");

    if ($hapus) {
        $_SESSION['success'] = "Data berhasil dihapus";
    } else {
        $_SESSION['error'] = "Gagal hapus: " . mysqli_error($koneksi);
    }

    header("Location: k_pendaki.php?bulan=$bulan&tahun=$tahun");
    exit;
}

// ================= DATA =================
$data = mysqli_query($koneksi, "
    SELECT * FROM kuota_pendakian
    WHERE MONTH(tanggal)='$bulan'
    AND YEAR(tanggal)='$tahun'
    ORDER BY tanggal ASC
");
?>

<?php include_once("../admin/header.php"); ?>

<div class="container mt-5 bg-white p-4 shadow rounded">

    <!-- NOTIFIKASI -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- FILTER -->
    <form method="GET" class="row g-3 mb-4 align-items-end">
        <div class="col-md-4">
            <label class="form-label">Bulan</label>
            <select name="bulan" class="form-select">
                <?php for ($i=1; $i<=12; $i++): ?>
                    <option value="<?= $i ?>" <?= ($bulan==$i)?'selected':'' ?>>
                        <?= date('F', mktime(0,0,0,$i,1)) ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" value="<?= $tahun ?>">
        </div>

        <div class="col-md-4">
            <button class="btn btn-warning w-100 fw-bold">Cari</button>
        </div>
    </form>

    <!-- TABEL -->
    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Tanggal</th>
                <th>Apuy</th>
                <th>Palutungan</th>
                <th>Linggarjati</th>
                <th>Sadarehe</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if (mysqli_num_rows($data) == 0): ?>
            <tr>
                <td colspan="6" class="text-muted">Data belum tersedia</td>
            </tr>
        <?php endif; ?>

        <?php while ($d = mysqli_fetch_assoc($data)): ?>

            <?php if ($edit_id == $d['id_kp']): ?>
            <form method="POST">
                <tr>
                    <td><input type="date" name="tanggal" value="<?= $d['tanggal'] ?>" class="form-control" required></td>
                    <td><input type="number" name="apuy" value="<?= $d['apuy'] ?>" class="form-control" required></td>
                    <td><input type="number" name="palutungan" value="<?= $d['palutungan'] ?>" class="form-control" required></td>
                    <td><input type="number" name="linggarjati" value="<?= $d['linggarjati'] ?>" class="form-control" required></td>
                    <td><input type="number" name="sadarehe" value="<?= $d['sadarehe'] ?>" class="form-control" required></td>
                    <td>
                        <input type="hidden" name="id_kp" value="<?= $d['id_kp'] ?>">
                        <button name="update" class="btn btn-success btn-sm">Simpan</button>
                        <a href="k_pendaki.php?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-secondary btn-sm">Batal</a>
                    </td>
                </tr>
            </form>

            <?php else: ?>
            <tr>
                <td><?= date('d-m-Y', strtotime($d['tanggal'])) ?></td>
                <td><?= $d['apuy'] ?></td>
                <td><?= $d['palutungan'] ?></td>
                <td><?= $d['linggarjati'] ?></td>
                <td><?= $d['sadarehe'] ?></td>
                <td>
                    <a href="?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>&edit=<?= $d['id_kp'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>&hapus=<?= $d['id_kp'] ?>"
                       onclick="return confirm('Yakin hapus data?')"
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endif; ?>

        <?php endwhile; ?>

        </tbody>
    </table>
</div>

<?php include_once("../admin/footer.php"); ?>
