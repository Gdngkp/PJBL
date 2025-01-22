<?php
include('config/koneksi.php');
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: beranda.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Selamat Datang di Beranda</h1>

    <div class="text-end mb-3">
        <span>Halo, <?= $_SESSION['user']['name']; ?>!</span>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Barang</h5>
                    <p class="card-text">Lihat semua barang yang tersedia untuk dipinjam.</p>
                    <a href="index.php" class="btn btn-primary">Lihat Barang</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Peminjaman Saya</h5>
                    <p class="card-text">Lihat barang-barang yang sedang Anda pinjam.</p>
                    <a href="peminjaman_saya.php" class="btn btn-primary">Lihat Peminjaman</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profil</h5>
                    <p class="card-text">Lihat dan perbarui informasi profil Anda.</p>
                    <a href="profil.php" class="btn btn-primary">Lihat Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>