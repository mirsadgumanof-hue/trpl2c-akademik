<?php
include __DIR__ . "/../koneksi.php";


// Jika tidak ada ID → kembali ke list
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?p=program_studi");
    exit;
}

$id = intval($_GET['id']); 

// Ambil data berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM program_studi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika ID tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?p=program_studi';</script>";
    exit;
}
?>



<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Edit Data Program Studi</h4>
    </div>

    <div class="card-body">

        <form action="Program-Studi/proses.php" method="POST">

            <!-- kirim ID ke gbproses -->
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="nama_prodi" class="form-select" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="Teknologi Rekayasa Perangkat Lunak" <?= ($data['nama_prodi'] == 'Teknologi Rekayasa Perangkat Lunak') ? 'selected' : ''; ?>>Teknologi Rekayasa Perangkat Lunak</option>
                    <option value="Manajemen Informatika" <?= ($data['nama_prodi'] == 'Manajemen Informatika') ? 'selected' : ''; ?>>Manajemen Informatika</option>
                    <option value="Teknik Komputer" <?= ($data['nama_prodi'] == 'Teknik Komputer') ? 'selected' : ''; ?>>Teknik Komputer</option>
                    <option value="Animasi" <?= ($data['nama_prodi'] == 'Animasi') ? 'selected' : ''; ?>>Animasi</option>
                    <option value="Sistem Informasi" <?= ($data['nama_prodi'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select name="jenjang" class="form-select" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D2" <?= ($data['jenjang'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                    <option value="D3" <?= ($data['jenjang'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                    <option value="D4" <?= ($data['jenjang'] == 'D4') ? 'selected' : ''; ?>>D4</option>
                    <option value="S2" <?= ($data['jenjang'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Akreditasi</label>
                <select name="akreditasi" class="form-select" required>
                    <option value="">-- Akreditasi Program Studi --</option>
                    <option value="Cukup" <?= ($data['akreditasi'] == 'Cukup') ? 'selected' : ''; ?>>Cukup</option>
                    <option value="Baik" <?= ($data['akreditasi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
                    <option value="Baik Sekali" <?= ($data['akreditasi'] == 'Baik Sekali') ? 'selected' : ''; ?>>Baik Sekali</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="4" required><?= htmlspecialchars($data['keterangan']); ?></textarea>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php?p=program_studi" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</div>


