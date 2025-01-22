<?php

require_once 'index.php';
checkLogin();

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $conn->query("DELETE FROM peminjaman WHERE id = $id");
    $conn->query("UPDATE barang SET status = 1 WHERE id = (SELECT barang_id FROM peminjaman WHERE id = $id)");

    header('Location: index.php');
    exit();
}

?>