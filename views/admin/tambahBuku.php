<?php include "../templates/head.php"; 
include '../../koneksi.php';

// Mendapatkan data kategori buku dari tabel kategori
$query = "SELECT * FROM kategori";
$result = mysqli_query($conn, $query);

// Memasukkan data kategori ke dalam variabel $kategori_options
$kategori_options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $id_kategori = $row['id_kategori'];
    $nama_kategori = $row['nama_kategori'];
    $kategori_options .= "<option value='$id_kategori'>$nama_kategori</option>";
}

// Menutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <title>Admin Perpustakaan</title>
</head>
<body>
  <h1>Tambah Buku</h1>
  <div class="book-form">
    <form method="POST" action="./prosesTambahBuku.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="cover_buku">Cover Buku:</label>
        <input type="file" name="cover_buku" id="cover_buku" accept="image/*" required>
      </div>
      <div class="form-group">
        <label for="judul_buku">Judul Buku:</label>
        <input type="text" name="judul_buku" id="judul_buku" required>
      </div>
      <div class="form-group">
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" required>
      </div>
      <div class="form-group">
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit" required>
      </div>
      <div class="form-group">
        <label for="tanggal_terbit">Tanggal Terbit:</label>
        <input type="date" name="tanggal_terbit" id="tanggal_terbit" required>
      </div>
      <label for="genre_buku">Genre Buku:</label>
        <select name="genre_buku" id="genre_buku" required>
            <option value="">Pilih Genre</option>
            <option value="Novel/Fiksi Filosofis">Novel/Fiksi Filosofis</option>
            <option value="Nonfiksi">Nonfiksi</option>
            <option value="Novel/Fiksi Fantasi">Novel/Fiksi Fantasi</option>
            <option value="Novel/Fiksi Ilmuah">Novel/Fiksi Ilmuah</option>
            <option value="Novel/Fiksi">Novel/Fiksi</option>
            <option value="Panduan Pendidikan">Panduan Pendidikan</option>
        </select><br>
      <label for="kategori_buku">Kategori Buku:</label>
        <select name="kategori_buku" id="kategori_buku" required>
            <option value="">Pilih Kategori</option>
            <?php echo $kategori_options; ?>
        </select><br>
      <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required></textarea>
      </div>
      <div class="form-group">
        <label for="file_buku">File Buku:</label>
        <input type="file" name="file_buku" id="file_buku" accept=".pdf" required>
      </div>
      <button type="submit" class="btn-submit">Tambah Buku</button>
    </form>
  </div>
</body>
</html>
