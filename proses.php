<?php
    include "koneksi.php";

    if(isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];

        $stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nim, $nama_mhs, $tgl_lahir, $alamat);

        if($stmt->execute()){
            header("Location: index.php?p=mahasiswa");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];

        $stmt = $koneksi->prepare("UPDATE mahasiswa SET nim = ?, nama_mhs = ?, tgl_lahir = ?, alamat = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nim, $nama_mhs, $tgl_lahir, $alamat, $id);

        if($stmt->execute()){
            header("Location: index.php?p=mahasiswa");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus'){
        $id = $_GET['id'];
        $koneksi->query("DELETE FROM mahasiswa WHERE id = $id");
    }
    header("Location: index.php?p=mahasiswa");
?>