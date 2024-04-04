<?php
// Koneksi ke database
require '../../koneksi.php';

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Cek apakah ID buku telah diberikan
if (isset($_GET['id_buku'])) {
    // Escape input ID buku untuk menghindari serangan SQL injection
    $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);

    // Query untuk mengambil data buku berdasarkan ID buku
    $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah ada data buku
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data['judul'] = $row['judul_buku'];
        $data['ambilBaca'] = array($row);
        mysqli_free_result($result); // Bebaskan memori hasil query

        // Tutup koneksi
        mysqli_close($conn);
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?= $data['judul']; ?></title>
        </head>
        <body>
            <?php foreach ($data['ambilBaca'] as $baca) : ?>
                <iframe src="../../assets/files/<?= $baca['file_buku']; ?>" width="100%" height="800px" target="_blank"></iframe>
            <?php endforeach; ?>
        </body>
        </html>

        <?php
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "ID buku tidak diberikan.";
}
?>
