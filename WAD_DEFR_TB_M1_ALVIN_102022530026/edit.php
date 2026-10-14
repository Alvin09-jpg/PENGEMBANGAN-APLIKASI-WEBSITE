<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM alamat_pengiriman WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='AlamatDirektori.php';</script>";
        exit;
    }
}

if (isset($_POST['update_alamat'])) {
    $id_edit = $_POST['id'];
    $label = $conn->real_escape_string($_POST['label']);
    $penerima = $conn->real_escape_string($_POST['penerima']);
    $alamat = $conn->real_escape_string($_POST['alamat']);

    $update_sql = "UPDATE alamat_pengiriman SET label='$label', penerima='$penerima', alamat='$alamat' WHERE id='$id_edit'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Data alamat berhasil diperbarui!'); window.location.href='AlamatDirektori.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Alamat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container py-4">

    <div class="mb-4">
        <a href="AlamatDirektori.php" class="btn btn-outline-primary btn-sm">&larr; Kembali ke Daftar Alamat</a>
    </div>

    <h4 class="mb-3">Edit Data Alamat</h4>
    
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        
        <div class="mb-3">
            <label class="form-label">Label Alamat</label>
            <input type="text" name="label" class="form-control" value="<?php echo htmlspecialchars($data['label']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Penerima</label>
            <input type="text" name="penerima" class="form-control" value="<?php echo htmlspecialchars($data['penerima']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat Lengkap</label>
            <textarea name="alamat" class="form-control" rows="3" required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
        </div>
        <button type="submit" name="update_alamat" class="btn btn-warning">Update Alamat</button>
    </form>

</body>
</html>
