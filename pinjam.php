<?php

require_once 'index.php';
checkLogin();

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $nama_peminjam = $_SESSION['user']['name'];

    $conn->query("UPDATE barang SET status = 0 WHERE id = $id");
    $conn->query("INSERT INTO peminjaman (barang_id, nama_peminjam) VALUES ($id, '$nama_peminjam')");

    header('Location: index.php');
    exit();
}

?>