<?php
include '../../koneksi.php';

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis'];
    $penerbit_buku = $_POST['penerbit'];
    $tanggal_terbit_buku = $_POST['tanggal_terbit'];
    $genre_buku = $_POST['genre_buku'];
    $kategori_buku = $_POST['kategori_buku'];
    $deskripsi_buku = $_POST['deskripsi'];

    if (isset($_FILES['cover_buku']) && $_FILES['cover_buku']['error'] === UPLOAD_ERR_OK) {
        $cover_buku = $_FILES['cover_buku']['name'];
        $cover_buku_tmp = $_FILES['cover_buku']['tmp_name'];

        move_uploaded_file($cover_buku_tmp, "../../assets/images/cover-buku/" . $cover_buku);
    } else {
        $query_cover = "SELECT cover_buku FROM buku WHERE id_buku = $id_buku";
        $result_cover = mysqli_query($conn, $query_cover);
        $row_cover = mysqli_fetch_assoc($result_cover);
        $cover_buku = $row_cover['cover_buku'];
    }

    if (isset($_FILES['file_buku']) && $_FILES['file_buku']['error'] === UPLOAD_ERR_OK) {
        $file_buku = $_FILES['file_buku']['name'];
        $file_buku_tmp = $_FILES['file_buku']['tmp_name'];

        move_uploaded_file($file_buku_tmp, "../../assets/files/" . $file_buku);
    } else {
        $query_file = "SELECT file_buku FROM buku WHERE id_buku = $id_buku";
        $result_file = mysqli_query($conn, $query_file);
        $row_file = mysqli_fetch_assoc($result_file);
        $file_buku = $row_file['file_buku'];
    }

    $query = "UPDATE buku SET judul_buku = '$judul_buku', penulis_buku = '$penulis_buku', penerbit_buku = '$penerbit_buku', tanggal_terbit = '$tanggal_terbit_buku', genre_buku = '$genre_buku', id_kategori = '$kategori_buku', deskripsi_buku = '$deskripsi_buku', cover_buku = '$cover_buku', file_buku = '$file_buku' WHERE id_buku = $id_buku";

    if (mysqli_query($conn, $query)) {
        header("Location: ./hapusBuku.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
