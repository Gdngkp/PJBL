<?php
include('config/koneksi.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Aplikasi Peminjaman Barang</h1>

    <div class="text-end mb-3">
        <?php if (isset($_SESSION['user'])): ?>
            <span>Selamat datang, <?= $_SESSION['user']['name']; ?>!</span>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary">Login</a>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3>Daftar Barang</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM barang";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0):
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['status'] == 1 ? 'Tersedia' : 'Dipinjam'; ?></td>
                                <td>
                                    <?php if ($row['status'] == 1): ?>
                                        <a href="pinjam.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Pinjam</a>
                                    <?php else: ?>
                                        <span class="text-danger">Tidak Tersedia</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h3>Barang yang Dipinjam</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Peminjam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT p.id, b.nama_barang, p.nama_peminjam FROM peminjaman p JOIN barang b ON p.barang_id = b.id WHERE b.status = 0";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0):
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['nama_peminjam']; ?></td>
                                <td>
                                    <a href="kembali.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Kembalikan</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada barang yang dipinjam</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

