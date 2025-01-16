<?php 


try {
    $conn = new mysqli('localhost','root','','aplikasi_peminjaman_barang');
} catch (Exception $e) {
    echo $e->getMessage();
}

?>