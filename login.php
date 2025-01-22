<?php
require 'config/koneksi.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login sederhana
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['user'] = ['name' => 'Administrator'];
        header('Location: beranda.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container col-sm-4 mx-auto mt-5">
    <h1 class="text-center">Login</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button><p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </form>
</div>
</body>
</html>
