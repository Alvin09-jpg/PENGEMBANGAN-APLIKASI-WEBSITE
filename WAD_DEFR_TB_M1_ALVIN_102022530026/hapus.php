<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM alamat_pengiriman WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data alamat berhasil dihapus!');
                window.location.href = 'AlamatDirektori.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $conn->error . "');</script>";
    }
} else {
    header("Location: AlamatDirektori.php");
}

$conn->close();
?>