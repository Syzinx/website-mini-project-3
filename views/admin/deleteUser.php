<?php
require '../../koneksi.php';

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Periksa apakah ID pengguna tersedia
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus terlebih dahulu entri terkait dalam tabel riwayat_peminjaman
    $deleteRiwayatQuery = "DELETE FROM riwayat_peminjaman WHERE id_user = '$id'";
    $deleteRiwayatResult = mysqli_query($conn, $deleteRiwayatQuery);

    if ($deleteRiwayatResult) {
        // Hapus entri terkait dalam tabel peminjaman
        $deletePeminjamanQuery = "DELETE FROM peminjaman WHERE id_user = '$id'";
        $deletePeminjamanResult = mysqli_query($conn, $deletePeminjamanQuery);

        if ($deletePeminjamanResult) {
            // Hapus pengguna dari tabel user setelah entri terkait dihapus
            $deleteUserQuery = "DELETE FROM user WHERE id_user = '$id'";
            $deleteUserResult = mysqli_query($conn, $deleteUserQuery);

            if ($deleteUserResult) {
                echo "Pengguna dengan ID: " . $id . " berhasil dihapus";
            } else {
                echo "Gagal menghapus pengguna. Error: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal menghapus entri terkait dalam peminjaman. Error: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal menghapus entri terkait dalam riwayat_peminjaman. Error: " . mysqli_error($conn);
    }
} else {
    echo "ID pengguna tidak tersedia";
}

// Tutup koneksi database
mysqli_close($conn);
?>
