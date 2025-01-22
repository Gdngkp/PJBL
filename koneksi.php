<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'peminjaman_barang';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk memeriksa login pengguna
function checkLogin() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
}
?>