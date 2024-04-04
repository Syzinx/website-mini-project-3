<?php
session_start(); // Start session
require '../../koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../assets/css/detail.css">
</head>
<body>
    <?php
    // Cek apakah ID buku tersedia
    if (isset($_GET['id_buku'])) {
        $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);

        $query = "SELECT buku.*, kategori.icon_kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE buku.id_buku = '$id_buku'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Cek apakah user sudah login
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                // Query untuk mengecek apakah user sudah meminjam buku ini
                $query_pinjam = "SELECT * FROM peminjaman WHERE id_buku = '$id_buku' AND id_user = (SELECT id_user FROM user WHERE username = '$username')";
                $result_pinjam = mysqli_query($conn, $query_pinjam);

                if (mysqli_num_rows($result_pinjam) > 0) {
                    // User sudah meminjam buku
                    $row_pinjam = mysqli_fetch_assoc($result_pinjam);

                    // Query untuk mengecek apakah user sudah mengembalikan buku ini
                    $query_riwayat = "SELECT * FROM riwayat_peminjaman WHERE id_buku = '$id_buku' AND id_user = (SELECT id_user FROM user WHERE username = '$username')";
                    $result_riwayat = mysqli_query($conn, $query_riwayat);

                    if (mysqli_num_rows($result_riwayat) > 0) {
                        renderBookDetails($row, $id_buku, true);
                    } else {
                        renderBookDetails($row, $id_buku, false);
                    }
                } else {
                    // User belum meminjam buku ini
                    renderBookDetails($row, $id_buku, false);
                }
            } else {
                // User belum login
                renderBookDetails($row, $id_buku, false, false);
            }
        } else {
            echo "Buku tidak ditemukan.";
        }
    } else {
        echo "ID buku tidak diberikan.";
    }
    ?>

</body>
</html>

<?php
function renderBookDetails($book, $bookId, $isReturned, $isLogin=true) {
?>
    <div class="header">
        <h1>Detail Buku</h1>
    </div>
    <div class="container">
        <img src="../../assets/images/cover-buku/<?=$book['cover_buku']; ?>" alt="" class="thumbnail" width="250">
        <div class="banner-detail">
            <div class="details">
                <div class="header-tittle">
                    <h1 class="judul"><?= $book['judul_buku']; ?></h1>
                    <p class="kategori"><?= $book['genre_buku']; ?> &nbsp;&nbsp;<img src="../../assets/images/icon-kategori/<?=$book['icon_kategori']; ?>" alt="" width="26px"></p>
                </div>
                <hr class="my-4">
                <p class="penulis">by <?= $book['penulis_buku']; ?></p>
                <p class="penerbit">Publisher: <?= $book['penerbit_buku']; ?></p>
                <p class="penerbit">Publication Year: <?= $book['tanggal_terbit']; ?></p>
            </div>
            <div class="buttons">
                <?php if ($isLogin) { ?>
                    <?php if ($isReturned) { ?>
                        <a class="btn btn-baca" href="./baca.php?id_buku=<?= $bookId; ?>" role="button">MULAI BACA</a>
                        <a class="btn btn-kembalikan" href="./pengembalian.php?id_buku=<?= $bookId; ?>" role="button">KEMBALIKAN BUKU</a>
                        <a class="btn btn-back-home" href="../home/" role="button">Back to Home</a>
                    <?php } else { ?>
                        <a class="btn btn-pinjam" href="./pinjam.php?id_buku=<?= $bookId; ?>" role="button">PINJAM BUKU</a>
                        <a class="btn btn-back-home" href="../home/" role="button">Back to Home</a>
                    <?php } ?>
                <?php } else { ?>
                    <a class="btn btn-login" href="../login/login.php" role="button">HARAP LOGIN</a>
                    <a class="btn btn-back-home" href="../home/" role="button">Back to Home</a>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Display book description -->
    <div class="deskripsi">
        <h3>Deskripsi</h3>
        <p><?= $book['deskripsi_buku']; ?></p>
    </div>
<?php
}
include '../templates/foot.php'
?>
