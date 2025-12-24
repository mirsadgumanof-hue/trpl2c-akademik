<?php
include __DIR__ . "/../koneksi.php";


if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $program_studi_id = $_POST['program_studi_id'];

    $stmt = $koneksi->prepare(
        "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, program_studi_id) VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssi", $nim, $nama_mhs, $tgl_lahir, $alamat, $program_studi_id);

    if ($stmt->execute()) {
        header("Location: ../index.php?p=mahasiswa");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $program_studi_id = $_POST['program_studi_id'];

    $stmt = $koneksi->prepare(
        "UPDATE mahasiswa SET nim=?, nama_mhs=?, tgl_lahir=?, alamat=?, program_studi_id=? WHERE id=?"
    );
    $stmt->bind_param("ssssii", $nim, $nama_mhs, $tgl_lahir, $alamat, $program_studi_id, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?p=mahasiswa");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM mahasiswa WHERE id=$id");
    header("Location: ../index.php?p=mahasiswa");
    exit;
}
?>