<?php
  ob_start();
  session_start();
  require 'koneksi.php';

  if (isset($_POST['email'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ? AND password = ?");
      $stmt->bind_param("ss", $email, $password);
      $stmt->execute();

      $result = $stmt->get_result();

      if ($result->num_rows == 1) {
          $data = $result->fetch_assoc();

          $_SESSION['login'] = true;
          $_SESSION['email'] = $data['email'];
          $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

          header("Location: index.php");
          exit;
      } else {
          $error = "Email atau password salah.";
      }
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm border-0 rounded-4">
      <div class="card-body p-4">

        <h4 class="text-center mb-4">Login</h4>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>

          <?php
          if (isset($error)) {
              echo '<div class="alert alert-danger">'.$error.'</div>';
          }
          ?>

          <button type="submit" class="btn btn-primary w-100">
            Login
          </button>
        </form>


      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php ob_end_flush(); ?>
</body>
</html>
