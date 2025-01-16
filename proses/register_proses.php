<?php
require_once '../config/koneksi.php';

// Cek apakah form dikirim

    
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    

    // Jika tidak ada error, proses registrasi
    
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Periksa apakah username atau email sudah ada
        $insertQuery = "INSERT INTO user (nama, username, email,password,id_level) VALUES ('$name', '$username','$email','$hashedPassword', '$level')";
            if (mysqli_query( $conn, $insertQuery)) {
                header("location:../index.php");
            } else {
                echo "Registrasi gagal";
            }

          
?>
