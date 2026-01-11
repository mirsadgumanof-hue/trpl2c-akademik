<?php
ob_start();
require 'koneksi.php';

if (isset($_POST['nama_lengkap'])) {

    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cek email sudah terdaftar
    $cek = $koneksi->prepare("SELECT id FROM pengguna WHERE email = ?");
    $cek->bind_param("s", $email);
    $cek->execute();
    $res = $cek->get_result();

    if ($res->num_rows > 0) {
        $error = "Email sudah terdaftar.";
    } else {
        $stmt = $koneksi->prepare(
            "INSERT INTO pengguna (nama_lengkap, email, password) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $nama, $email, $password);
        $stmt->execute();

        // langsung ke login
        header("Location: login.php?success=1");
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm border-0 rounded-4">
      <div class="card-body p-4">

        <h4 class="text-center mb-4">Register</h4>

        <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        ?>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            Daftar
          </button>
        </form>

        <div class="text-center mt-3">
            <span>Sudah punya akun? </span>
            <a href="login.php">Login</a>
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>
