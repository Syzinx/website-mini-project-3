<?php
include "../templates/head.php";
require '../../koneksi.php';

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../assets/css/detail-user.css">
    <title>Detail User</title>
</head>
<body>
    <div class="container">
    <?php
    // Periksa apakah parameter ID user telah diberikan
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk mengambil data user dari database berdasarkan ID
        $query = "SELECT * FROM user WHERE id_user = $id";
        $result = mysqli_query($conn, $query);
        
        // Periksa apakah pengguna dengan ID tersebut ada di database
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Tampilkan detail pengguna
            echo "<h2>Details User</h2>";
            ?><div class="body"><?php
                echo "<p><strong>ID User:</strong> " . $user['id_user'] . "</p>";
                echo "<p><strong>Nama User:</strong> " . $user['nama'] . "</p>";
                echo "<p><strong>Username:</strong> " . $user['username'] . "</p>";?>
            </div>
            
            <?php
            // Query untuk mengambil data peminjaman
            $peminjamanQuery = "SELECT buku.judul_buku, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, 'Dipinjam' AS status
                                FROM peminjaman
                                JOIN buku ON peminjaman.id_buku = buku.id_buku
                                WHERE peminjaman.id_user = $id";
            $peminjamanResult = mysqli_query($conn, $peminjamanQuery);

            // Query untuk mengambil data riwayat peminjaman
            $riwayatQuery = "SELECT buku.judul_buku, '-' AS tanggal_pinjam, '-' AS tanggal_kembali, 'Dikembalikan' AS status
                            FROM riwayat_peminjaman
                            JOIN buku ON riwayat_peminjaman.id_buku = buku.id_buku
                            WHERE riwayat_peminjaman.id_user = $id";
            $riwayatResult = mysqli_query($conn, $riwayatQuery);

            // Menggabungkan hasil query peminjaman dan riwayat peminjaman
            $combinedResult = array_merge_recursive(mysqli_fetch_all($peminjamanResult, MYSQLI_ASSOC), mysqli_fetch_all($riwayatResult, MYSQLI_ASSOC));
            ?>
            <div class="content">
            <?php
            if (!empty($combinedResult)) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Buku</th>";
                echo "<th>Tanggal Pinjam</th>";
                echo "<th>Tanggal Pengembalian</th>";
                echo "<th>Status</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($combinedResult as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['judul_buku'] . "</td>";
                    echo "<td>" . $row['tanggal_pinjam'] . "</td>";
                    echo "<td>" . $row['tanggal_kembali'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "Tidak ada data peminjaman.";
            }
        } else {
            echo "Pengguna dengan ID tersebut tidak ditemukan.";
        }
    } else {
        echo "ID User tidak diberikan.";
    }
    
    ?>
        </div>
    </div><?php
    // Tutup koneksi database
    mysqli_close($conn);

    include "../templates/foot.php";?>
</body>
</html>

