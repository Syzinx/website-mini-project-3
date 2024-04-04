<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../assets/css/admin-hapus.css">
    <title>Halaman Admin</title>
</head>
<body>
    <div class="buku-wrapper">
    <?php
    include '../../koneksi.php';

    // Query untuk mengambil data buku dari database
    $query = "SELECT * FROM buku";
    $result = mysqli_query($conn, $query);

    // Menampilkan data buku dalam bentuk card
    while ($row = mysqli_fetch_assoc($result)) {
        $judul_buku = $row['judul_buku'];
        $penulis_buku = $row['penulis_buku'];
        $penerbit_buku = $row['penerbit_buku'];
        $cover_buku = $row['cover_buku'];
        $id_buku = $row['id_buku'];

        echo '<div class="book-card">';
        echo '<img src="../../assets/images/cover-buku/' . $cover_buku . '" alt="' . $judul_buku . '">';
        echo '<h3>' . $judul_buku . '</h3>';
        echo '<p>Penulis: ' . $penulis_buku . '</p>';
        echo '<p>Penerbit: ' . $penerbit_buku . '</p>';
        echo '<a href="editBuku.php?id=' . $id_buku . '" class="btn btn-edit">Edit Buku</a>';
        echo '<a href="prosesHapusBuku.php?id=' . $id_buku . '" class="btn btn-delete">Hapus Buku</a>';
        echo '</div>';
    }

    // Menutup koneksi database
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>
