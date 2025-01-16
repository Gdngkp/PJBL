<?php ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Aplikasi Peminjaman Barang</title>
  </head>
  <body>
    <div class="card col-sm-3 mx-auto mt-5">
      <div class="card-header">
        From Login
      </div>
      <div class="card-body">
        <form method="POST" action="proses/login_proses.php" autocomplete="off">
          <div class="from-grup ">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="from-control" placeholder="Masukan Email" autofocus>
          </div>
          <div class="from-grup pt-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="username" class="from-control" placeholder="Masukan Password" autofocus>
          </div>
          <div class="from-grup pt-3">
            <label for="level">level</label>
            <select name="level" id="level" class="form-control">
              <option value="">-- Masuk Sebagai --</option>
              <option value="2">Operator</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Masuk</button> <label>Belum mempunyai akun?</label> <a href="register.php">Register</a>
        </form>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>