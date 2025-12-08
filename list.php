<?php
    include "koneksi.php"; 
?>

<h2 class="text-center mb-4">List Data Mahasiswa</h2>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-primary text-center">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $no = 1;
            $sql = $koneksi->query("SELECT * FROM mahasiswa");
            
            $data = $sql->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row){
        ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama_mhs']; ?></td>
            <td><?= $row['tgl_lahir']; ?></td>
            <td><?= $row['alamat']; ?></td>

            <td class="text-center">

                <!-- Tombol Edit -->
                <a href="index.php?p=edit&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>

                <!-- Tombol Hapus -->
                <a href="proses.php?id=<?= $row['id'] ?>&aksi=hapus"
                    class="text-danger"
                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="fa-solid fa-trash"></i>
                </a>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<div class="text-end">
    <a href="index.php?p=create" class="btn btn-primary">Tambah Data</a>
</div>