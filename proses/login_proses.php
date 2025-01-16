<?php
session_start();

require_once '../config/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];

if (empty($username) || empty($password) || empty($level)) {
    header('location: ../index.php');
    
}

$sql = "SELECT  * FROM users WHERE email = '$email'";
$query = $conn->query($sql);

if ($query->num_rows > 0) {
    while ($result = $query->fetch_assoc()) {
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['id_user'] = $result['id_user'];

        if($result['id_level'] == 1) {
            echo "<script>alert('anda masuk sebagai admin');</script>";
        } else {
            echo "<script>alert('anda masuk sebagai ');</script>";
        }
    }
}
?>