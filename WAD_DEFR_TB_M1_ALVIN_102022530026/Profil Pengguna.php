<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container py-4">

    <div class="mb-4">
        <a href="Profil Pengguna.php" class="btn btn-outline-primary btn-sm me-2">Form Input</a>
        <a href="AlamatDirektori.php" class="btn btn-primary btn-sm">Daftar Alamat</a>
    </div>
 
    <div class="row g-4">
        <div class="col-md-6">
            <h4 class="mb-3">Profil Pelanggan</h4>
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Anda" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email@contoh.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="tel" name="no_telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
                </div>
                <button type="submit" name="submit_profil" class="btn btn-primary">Simpan Profil</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4 class="mb-3">Tambah Alamat</h4>
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Label Alamat</label>
                    <input type="text" name="label" class="form-control" placeholder="Rumah / Kantor / Kost" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>
                    <input type="text" name="penerima" class="form-control" placeholder="Nama penerima paket" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="2" placeholder="Jalan, Kota, Kode Pos" required></textarea>
                </div>
                <button type="submit" name="submit_alamat" class="btn btn-success">Tambah Alamat</button>
            </form>
        </div>
    </div>

</body>
</html>

<?php
if(isset($_POST['submit_alamat'])) {
    include 'koneksi.php'; 
    
    $label = $conn->real_escape_string($_POST['label']);
    $penerima = $conn->real_escape_string($_POST['penerima']);
    $alamat = $conn->real_escape_string($_POST['alamat']);

    $sql = "INSERT INTO alamat_pengiriman (label, penerima, alamat) VALUES ('$label', '$penerima', '$alamat')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Alamat berhasil ditambahkan ke database!'); 
                window.location.href='AlamatDirektori.php';
              </script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
    }
}
?>

<?php
if(isset($_POST['submit_profil'])) {
    include 'koneksi.php';
    
    $nama = $conn->real_escape_string($_POST['nama_lengkap']);
    $email = $conn->real_escape_string($_POST['email']);
    $no_telp = $conn->real_escape_string($_POST['no_telepon']);

    $sql_profil = "INSERT INTO profil_pelanggan (nama_lengkap, email, no_telepon) VALUES ('$nama', '$email', '$no_telp')";
    
    if ($conn->query($sql_profil) === TRUE) {
        echo "<script>
                alert('Profil berhasil disimpan!'); 
                window.location.href='Profil Pengguna.php';
              </script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
    }
}
?>