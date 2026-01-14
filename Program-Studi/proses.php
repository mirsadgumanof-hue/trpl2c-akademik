<?php
session_start();
include 'koneksi.php';

$id = $_SESSION['id_user'];

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_lengkap'];
    $password = $_POST['password'];

    if ($password == "") {
        // Jika password tidak diganti
        $query = "UPDATE pengguna 
                  SET nama_lengkap = '$nama'
                  WHERE id = '$id'";
    } else {
        // Jika password diganti
        $query = "UPDATE pengguna 
                  SET nama_lengkap = '$nama',
                      `password` = '$password'
                  WHERE id = '$id'";
    }

    mysqli_query($conn, $query);

    // Redirect agar tidak resubmit
    header("Location: profil.php?status=berhasil");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '$id'");
$user = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Profil Saya</h3>

    <?php if(isset($_GET['status'])) { ?>
        <div class="alert alert-success mt-2">
            Profil berhasil diperbarui
        </div>
    <?php } ?>

    <form method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="text" class="form-control" 
                   value="<?= $user['email']; ?>" readonly>
        </div>

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" 
                   class="form-control" 
                   value="<?= $user['nama_lengkap']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" 
                   class="form-control"
                   placeholder="Kosongkan jika tidak ingin ganti password">
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">
            Simpan Perubahan
        </button>

    </form>
</div>

</body>
</html>
