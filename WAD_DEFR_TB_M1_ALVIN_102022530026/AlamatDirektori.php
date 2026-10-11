<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Alamat</title>

    <link rel="stylesheet" href="style.css">
</head>
<body class="container py-4">

    <div class="mb-4">
        <a href="Profil Pengguna.php" class="btn btn-outline-primary btn-sm me-2">Form Input</a>
        <a href="AlamatDirektori.php" class="btn btn-primary btn-sm">Daftar Alamat</a>
    </div>

    <?php
    include 'koneksi.php';

    $sql_profil = "SELECT * FROM profil_pelanggan ORDER BY id DESC LIMIT 1";
    $result_profil = $conn->query($sql_profil);
    
    if ($result_profil && $result_profil->num_rows > 0) {
        $profil = $result_profil->fetch_assoc();
    ?>
    <div class="mb-4" style="background-color: #f1f5f9; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
        <h5 class="mb-3" style="color: #1e293b; font-weight: 600;">Informasi Akun</h5>
        <div class="row">
            <div class="col-md-4">
                <small style="color: #64748b;">Nama Lengkap</small><br>
                <strong><?php echo htmlspecialchars($profil['nama_lengkap']); ?></strong>
            </div>
            <div class="col-md-4">
                <small style="color: #64748b;">Email</small><br>
                <strong><?php echo htmlspecialchars($profil['email']); ?></strong>
            </div>
            <div class="col-md-4">
                <small style="color: #64748b;">No. Telepon</small><br>
                <strong><?php echo htmlspecialchars($profil['no_telepon']); ?></strong>
            </div>
        </div>
    </div>
    <?php } ?>

    <h4 class="mb-3">Direktori Alamat Pengiriman</h4>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Label</th>
                <th>Penerima</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include 'koneksi.php';

            $sql = "SELECT * FROM alamat_pengiriman ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><strong>" . htmlspecialchars($row['label']) . "</strong></td>";
                    echo "<td>" . htmlspecialchars($row['penerima']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                    
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus alamat ini?\")'>Hapus</a>
                          </td>";
                          
                    echo "</tr>";
                }
            } else {

                echo "<tr><td colspan='4' style='text-align:center; padding: 2rem;'>Belum ada data alamat pengiriman. Silakan tambah data di menu Form Input.</td></tr>";
            }
            
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>