<?php
    include __DIR__ . "/../koneksi.php";
?>

<h2 class="text-center mb-4">List Data Program Studi</h2>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-primary text-center">
        <tr>
            <th>No</th>
            <th>Nama Program Studi</th>
            <th>Jenjang</th>
            <th>Akreditasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $no = 1;
            $sql = $koneksi->query("SELECT * FROM program_studi");
            
            $data = $sql->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row){
        ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $row['nama_prodi']; ?></td>
            <td><?= $row['jenjang']; ?></td>
            <td><?= $row['akreditasi']; ?></td>
            <td><?= $row['keterangan']; ?></td>

            <td class="text-center">

                <!-- Tombol Edit -->
                <a href="index.php?p=ubah&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>

                <!-- Tombol Hapus -->
                <a href="Program-Studi/proses.php?id=<?= $row['id'] ?>&aksi=hapus"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="fa-solid fa-trash"></i>
                </a>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<div class="text-end">
    <a href="index.php?p=tambah" class="btn btn-primary">Tambah Data</a>
</div>