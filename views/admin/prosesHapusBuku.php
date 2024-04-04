<?php
include '../../koneksi.php';

// Mendapatkan ID buku yang akan dihapus
$id_buku = $_GET['id'];

// Hapus entri buku dari tabel peminjaman
$deletePeminjamanQuery = "DELETE FROM peminjaman WHERE id_buku = '$id_buku'";
$deletePeminjamanResult = mysqli_query($conn, $deletePeminjamanQuery);

// Hapus entri buku dari tabel riwayat_peminjaman
$deleteRiwayatQuery = "DELETE FROM riwayat_peminjaman WHERE id_buku = '$id_buku'";
$deleteRiwayatResult = mysqli_query($conn, $deleteRiwayatQuery);

// Hapus buku dari tabel buku
$deleteBukuQuery = "DELETE FROM buku WHERE id_buku = '$id_buku'";
$deleteBukuResult = mysqli_query($conn, $deleteBukuQuery);

if ($deletePeminjamanResult && $deleteRiwayatResult && $deleteBukuResult) {
    echo "<script>alert('Buku berhasil dihapus.');
        window.location.href = 'hapusBuku.php';
        </script>";
    exit();
} else {
    echo "Gagal menghapus buku";
}

// Menutup koneksi database
mysqli_close($conn);
?>
