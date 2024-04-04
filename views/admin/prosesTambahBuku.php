<?php
include '../../koneksi.php';

// Mendapatkan data yang dikirim melalui form
$judul_buku = $_POST['judul_buku'];
$penulis_buku = $_POST['penulis'];
$penerbit_buku = $_POST['penerbit'];
$tanggal_terbit = $_POST['tanggal_terbit'];
$kategori_buku = $_POST['kategori_buku'];
$genre_buku = $_POST['genre_buku'];
$deskripsi_buku = $_POST['deskripsi'];

// Mengecek apakah file cover_buku telah diupload
if (isset($_FILES['cover_buku'])) {
    $cover_buku = $_FILES['cover_buku'];

    // Mendapatkan informasi file cover_buku
    $cover_buku_name = $cover_buku['name'];
    $cover_buku_tmp = $cover_buku['tmp_name'];
    $cover_buku_size = $cover_buku['size'];
    $cover_buku_error = $cover_buku['error'];

    // Memeriksa apakah tidak ada error saat upload file cover_buku
    if ($cover_buku_error === UPLOAD_ERR_OK) {
        // Memeriksa ekstensi file cover_buku
        $cover_buku_ext = pathinfo($cover_buku_name, PATHINFO_EXTENSION);
        $allowed_ext = array("jpg", "jpeg", "png");

        if (in_array($cover_buku_ext, $allowed_ext)) {
            // Membuat nama unik untuk file cover_buku
            $cover_buku_new_name = $cover_buku_name;

            // Menentukan lokasi penyimpanan file cover_buku
            $cover_buku_destination = "../../assets/images/cover-buku/" . $cover_buku_new_name;

            // Memindahkan file cover_buku ke folder tujuan
            move_uploaded_file($cover_buku_tmp, $cover_buku_destination);

            // Mengecek apakah file file_buku telah diupload
            if (isset($_FILES['file_buku'])) {
                $file_buku = $_FILES['file_buku'];

                // Mendapatkan informasi file file_buku
                $file_buku_name = $file_buku['name'];
                $file_buku_tmp = $file_buku['tmp_name'];
                $file_buku_size = $file_buku['size'];
                $file_buku_error = $file_buku['error'];

                // Memeriksa apakah tidak ada error saat upload file file_buku
                if ($file_buku_error === UPLOAD_ERR_OK) {
                    // Memeriksa ekstensi file file_buku
                    $file_buku_ext = pathinfo($file_buku_name, PATHINFO_EXTENSION);
                    $allowed_ext = array("pdf");

                    if (in_array($file_buku_ext, $allowed_ext)) {
                        // Membuat nama unik untuk file file_buku
                        $file_buku_new_name = $file_buku_name;

                        // Menentukan lokasi penyimpanan file file_buku
                        $file_buku_destination = "../../assets/files/" . $file_buku_new_name;

                        // Memindahkan file file_buku ke folder tujuan
                        move_uploaded_file($file_buku_tmp, $file_buku_destination);

                        // Memperbarui query untuk menyertakan id_kategori
                        $query = "INSERT INTO buku (judul_buku, penulis_buku, penerbit_buku, tanggal_terbit, genre_buku, deskripsi_buku, cover_buku, file_buku, id_kategori) VALUES ('$judul_buku', '$penulis_buku', '$penerbit_buku', '$tanggal_terbit', '$genre_buku', '$deskripsi_buku', '$cover_buku_new_name', '$file_buku_new_name', '$kategori_buku')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "<script>alert('Buku berhasil ditambahkan.');
                            window.location.href = 'tambahBuku.php';
                            </script>";
                            exit();
                        } else {
                            echo "Gagal menambahkan buku";
                        }
                    } else {
                        echo "Ekstensi file file_buku tidak valid";
                    }
                } else {
                    echo "Error saat mengupload file file_buku";
                }
            } else {
                echo "File buku tidak ditemukan";
            }
        } else {
            echo "Ekstensi file cover_buku tidak valid";
        }
    } else {
        echo "Error saat mengupload file cover_buku";
    }
} else {
    echo "File cover buku tidak ditemukan";
}

// Menutup koneksi database
mysqli_close($conn);
?>
