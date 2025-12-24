<?php
include __DIR__ . "/../koneksi.php";

/* CREATE */
if (isset($_POST['submit'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];

    $stmt = $koneksi->prepare(
        "INSERT INTO program_studi (nama_prodi, jenjang, akreditasi, keterangan) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $nama_prodi, $jenjang, $akreditasi, $keterangan);

    if ($stmt->execute()) {
        header("Location: ../index.php?p=program_studi");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

/* UPDATE */
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];

    $stmt = $koneksi->prepare(
        "UPDATE program_studi SET nama_prodi=?, jenjang=?, akreditasi=?, keterangan=? WHERE id=?"
    );
    $stmt->bind_param("ssssi", $nama_prodi, $jenjang, $akreditasi, $keterangan, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?p=program_studi");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

/* DELETE */
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM program_studi WHERE id=$id");
    header("Location: ../index.php?p=program_studi");
    exit;
}
?>
