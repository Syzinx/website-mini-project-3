<?php
require '../../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_user']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if ($password !== $password2) {
        echo "<script>alert('Password dan konfirmasi password tidak cocok');
		window.location.href = 'index.php';
		</script>";
        exit();
    }

    $query = "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script>alert('Registrasi berhasil');
		window.location.href = 'login.php';
		</script>";
    } else {
        echo "<script>alert('Registrasi gagal: " . mysqli_error($conn) . "');
		window.location.href = 'index.php';
		</script>";
    }
}

mysqli_close($conn);
?>
