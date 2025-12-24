<h3 class="mb-4">
    <?= isset($_GET['id']) ? 'Edit Data Mahasiswa' : 'Tambah Data Mahasiswa'; ?>
</h3>

<?php
include __DIR__ . "/../koneksi.php";

$edit = false;
$data = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $edit = true;
    $id = intval($_GET['id']);

    $stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
}
?>

<form action="Mahasiswa/proses.php" method="post">

    <?php if ($edit): ?>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <?php endif; ?>

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control"
               value="<?= $data['nim'] ?? ''; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" class="form-control"
               value="<?= $data['nama_mhs'] ?? ''; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control"
               value="<?= $data['tgl_lahir'] ?? ''; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="4" required><?= $data['alamat'] ?? ''; ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <select name="program_studi_id" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>

            <?php
            $prodi = $koneksi->query("SELECT id, nama_prodi FROM program_studi");
            while ($row = $prodi->fetch_assoc()):
                $selected = ($edit && $row['id'] == ($data['program_studi_id'] ?? '')) ? 'selected' : '';
            ?>
                <option value="<?= $row['id']; ?>" <?= $selected; ?>>
                    <?= $row['nama_prodi']; ?>
                </option>
            <?php endwhile; ?>
        </select>

    </div>

    <button type="submit" name="<?= $edit ? 'update' : 'submit'; ?>" class="btn btn-primary">
        <?= $edit ? 'Update' : 'Simpan'; ?>
    </button>

</form>
