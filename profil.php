<?php
require 'koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id_user'];
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama      = $_POST['nama_lengkap'];
    $password  = $_POST['password'];
    $password2 = $_POST['password2'];

    if (!empty($password)) {
        if ($password != $password2) {
            $error = "Password dan konfirmasi password tidak sama!";
        } else {
            $password = md5($password);
            $stmt = $koneksi->prepare("UPDATE pengguna SET nama_lengkap=?, password=? WHERE id=?");
            $stmt->bind_param("ssi", $nama, $password, $id);
            $stmt->execute();
            header("Location: login.php");
            exit;
        }
    } else {
        $stmt = $koneksi->prepare("UPDATE pengguna SET nama_lengkap=? WHERE id=?");
        $stmt->bind_param("si", $nama, $id);
        $stmt->execute();
        header("Location: login.php");
        exit;
    }
}

$stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<div class="container mt-5" style="max-width:600px;">
    <h3>Profil Saya</h3>

    <?php if ($error != "") { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>

    <form method="POST" autocomplete="off">
        <div class="mb-3">
            <label>Email</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" readonly>
        </div>

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control"
                   value="<?= htmlspecialchars($user['nama_lengkap']); ?>" required>
        </div>

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control"
                   autocomplete="new-password"
                   placeholder="Kosongkan jika tidak ingin ganti password">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password2" class="form-control"
                   autocomplete="new-password"
                   placeholder="Ulangi password baru">
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Simpan Perubahan
        </button>
    </form>
</div>
