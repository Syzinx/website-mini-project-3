<?php
session_start(); 
require '../../koneksi.php';

if (isset($_GET['id_buku'])) {

    $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $query_pinjam = "SELECT * FROM peminjaman WHERE id_buku = '$id_buku' AND id_user = (SELECT id_user FROM user WHERE username = '$username')";
        $result_pinjam = mysqli_query($conn, $query_pinjam);

        if (mysqli_num_rows($result_pinjam) > 0) {

            $query_delete = "DELETE FROM peminjaman WHERE id_buku = '$id_buku' AND id_user = (SELECT id_user FROM user WHERE username = '$username')";
            $result_kembali = mysqli_query($conn, $query_delete);

            if ($result_kembali) {
                $query_riwayat = "INSERT INTO riwayat_peminjaman (id_buku, id_user) VALUES ('$id_buku', (SELECT id_user FROM user WHERE username = '$username'))";
                $result_riwayat = mysqli_query($conn, $query_riwayat);

                if ($result_riwayat) {
                    echo "<script>alert('Buku berhasil dikembalikan.');
                    window.location.href = '../details/index.php?id_buku=$id_buku';
                    </script>";
                    exit();
                } else {
                    echo "Terjadi kesalahan dalam memasukkan data ke dalam riwayat peminjaman.";
                }
            } else {
                echo "Terjadi kesalahan dalam proses pengembalian buku.";
            }
        } else {
            echo "<script>alert('Anda tidak meminjam buku ini.');
            window.location.href = '../details/index.php?id_buku=$id_buku';
            </script>";
            exit();
        }
    } else {
        echo "<script>alert('Harap login terlebih dahulu.');
            window.location.href = '../details/index.php?id_buku=$id_buku';
            </script>";
        exit();
    }
} else {
    echo "<script>alert('ID buku tidak diberikan.');
            window.location.href = '../home/';
            </script>";
    exit();
}

?>
