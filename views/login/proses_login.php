<?php
session_start();
require '../../koneksi.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        if($_SESSION['username'] == "admin" || $_SESSION['username'] == "Admin") {
            header("Location: ../admin/dashboard.php ");
        } else {
            header("Location: ../home/index.php ");
        }
        exit();
    } else {
        echo "<script>alert('Username atau password salah');
            window.location.href = './login.php';
            </script>";
        exit();
    }
}

mysqli_close($conn);
?>
