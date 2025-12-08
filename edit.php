<?php
include("koneksi.php");

// Jika tidak ada ID → kembali ke list
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?p=mahasiswa");
    exit;
}

$id = intval($_GET['id']); 

// Ambil data berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika ID tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?p=mahasiswa';</script>";
    exit;
}
?>



<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Edit Data Mahasiswa</h4>
    </div>

    <div class="card-body">

        <form action="proses.php" method="POST">

            <!-- kirim ID ke gbproses -->
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim"
                        value="<?= htmlspecialchars($data['nim']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama_mhs"
                        value="<?= htmlspecialchars($data['nama_mhs']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir"
                        value="<?= htmlspecialchars($data['tgl_lahir']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="4" required><?= htmlspecialchars($data['alamat']); ?></textarea>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php?p=mahasiswa" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</div>


