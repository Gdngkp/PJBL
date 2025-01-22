<?php

session_start();
require 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Validasi sederhana untuk menghindari input kosong
    if (!empty($username) && !empty($password) && !empty($name)) {
        // Simpan data ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user (username, password, name) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $name);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Registrasi berhasil. Silakan login.";
            header('Location: login.php');
            exit();
        } else {
            $error = "Terjadi kesalahan saat menyimpan data.";
        }

        $stmt->close();
    } else {
        $error = "Semua kolom harus diisi!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container col-sm-4 mx-auto mt-5">
    <h1 class="text-center">Register</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <div class="text-center mt-3">
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</div>
</body>
</html>
