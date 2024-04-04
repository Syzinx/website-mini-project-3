<?php
include "../templates/head.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Edit Buku</title>
</head>
<body>
    <?php
    include '../../koneksi.php';

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Periksa apakah parameter ID buku telah diberikan
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk mengambil data buku dari database berdasarkan ID
        $query = "SELECT buku.*, kategori.nama_kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE buku.id_buku = $id";
        $result = mysqli_query($conn, $query);

        // Periksa apakah buku dengan ID tersebut ada di database
        if (mysqli_num_rows($result) > 0) {
            $buku = mysqli_fetch_assoc($result);
            ?>
            <h1>Edit Buku</h1>
            <div class="book-form">
                <form method="POST" action="./prosesEditBuku.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']; ?>">
                    <div class="form-group">
                        <label for="cover_buku">Cover Buku:</label>
                        <input type="file" name="cover_buku" id="cover_buku" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku:</label>
                        <input type="text" name="judul_buku" id="judul_buku" value="<?php echo $buku['judul_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis:</label>
                        <input type="text" name="penulis" id="penulis" value="<?php echo $buku['penulis_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" name="penerbit" id="penerbit" value="<?php echo $buku['penerbit_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_terbit">Tanggal Terbit:</label>
                        <input type="date" name="tanggal_terbit" id="tanggal_terbit" value="<?php echo $buku['tanggal_terbit']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="genre_buku">Genre Buku:</label>
                        <input type="text" name="genre_buku" id="genre_buku" value="<?php echo $buku['genre_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori_buku">Kategori Buku:</label>
                        <select name="kategori_buku" id="kategori_buku">
                            <?php
                            // Query untuk mengambil data kategori buku dari tabel kategori
                            $query_kategori = "SELECT * FROM kategori";
                            $result_kategori = mysqli_query($conn, $query_kategori);

                            // Menampilkan data kategori buku dalam bentuk dropdown
                            while ($row = mysqli_fetch_assoc($result_kategori)) {
                                $id_kategori = $row['id_kategori'];
                                $nama_kategori = $row['nama_kategori'];
                                $selected = ($id_kategori == $buku['id_kategori']) ? 'selected' : '';

                                echo "<option value='$id_kategori' $selected>$nama_kategori</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi"><?php echo $buku['deskripsi_buku']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_buku">File Buku:</label>
                        <input type="file" name="file_buku" id="file_buku" accept=".pdf">
                    </div>
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                </form>
            </div>
            <?php
        } else {
            echo "Buku tidak ditemukan.";
        }

        // Membebaskan hasil query
        mysqli_free_result($result);
    } else {
        echo "ID buku tidak diberikan.";
    }

    // Menutup koneksi database
    mysqli_close($conn);
    ?>
</body>
</html>
