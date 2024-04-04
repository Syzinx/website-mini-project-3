<?php include "../templates/head.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        .grid-box {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 2vw;
        }

        @media (max-width: 960px) {
            grid {
            padding: 0 4vw;
            }
        }

        @media (max-width: 768px) {
            .grid-box {
            padding: 0 6vw;
            }
        }

        .swiper-container, .full, header .bg img, section#login .bg img, section.infos .grid-box .list .bg img {
            width: 100%;
            height: 100%;
        }

        .full, header .bg img, section#login .bg img, section.infos .grid-box .list .bg img {
            -o-object-fit: cover;
            object-fit: cover;
        }
                section.infos .grid-box {
            display: -ms-grid;
            display: grid;
            grid-gap: 2em;
            -ms-grid-columns: (minmax(48%, 1fr))[auto-fit];
                grid-template-columns: repeat(auto-fit, minmax(29%, 1fr));
        }

        section.infos .grid-box .list {
            height: 200px;
            background: #000;
            color: #fff;
            border-radius: 20px;
            position: relative;
            cursor: pointer;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                -ms-flex-direction: column;
                    flex-direction: column;
            overflow: hidden;
        }

        section.infos .grid-box .list .content {
            z-index: 5;
            text-align: center;
        }

        @media (min-width: 340px) {
            section.infos .grid-box .list .content {
            margin-left: auto;
            margin-right: 5em;
            }
        }

        section.infos .grid-box .list .content .count {
            font-weight: 700;
            font-size: 72px;
            margin: 0;
        }

        section.infos .grid-box .list .content .sub {
            font-size: 20px;
            margin-top: 0;
        }

        section.infos .grid-box .list .bg {
            position: absolute;
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                -ms-flex-direction: row;
                    flex-direction: row;
        }

        section.infos .grid-box .list .bg::before {
            width: 100%;
            height: 100%;
            content: '';
            position: absolute;
            z-index: 1;
            background: linear-gradient(-45deg, rgba(0, 89, 251, 0.75) 25%, rgba(0, 176, 255, 0) 75%);
        }

        section.infos .grid-box .list .bg:hover img {
            -webkit-transform: scale(2);
                    transform: scale(2);
            -webkit-transition-duration: 10s;
                    transition-duration: 10s;
        }

        .container {
            margin: 0 50px 50px 50px;
        }


        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            border-bottom: 1px solid #ddd;
        }

        .wrap {
            display: flex;
            align-items: center;
        }

        .wrap h1 {
            font-size: 24px;
            margin-right: 10px;
        }

        .wrap p {
            font-size: 16px;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .header a:hover {
            text-decoration: underline;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
            color: #212529;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background-color: #c6c6c6;
        }
        table tr:nth-child(odd) {
            background-color: #e6e6e6;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        table td:first-child,
        table th:first-child {
            padding-left: 20px;
        }

        table td:last-child,
        table th:last-child {
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <section class="infos">
        <div class="grid-box">
            <div class="list">
                <div class="content">
                    <?php
                    require '../../koneksi.php';

                    // Mengambil jumlah user dari database
                    $queryUser = "SELECT COUNT(*) AS totalUser FROM user";
                    $resultUser = mysqli_query($conn, $queryUser);
                    $rowUser = mysqli_fetch_assoc($resultUser);
                    $totalUser = $rowUser['totalUser'];
                    ?>
                    <p class="count">
                        <?= $totalUser; ?>
                    </p>
                    <p class="sub">Total Member</p>
                </div>
                <div class="bg"><img src="../../assets/images/X10423640.jpg" alt="bg-header"></div>
            </div>
            <div class="list">
                <div class="content">
                    <?php
                    // Mengambil jumlah buku dari database
                    $queryBuku = "SELECT COUNT(*) AS totalBuku FROM buku";
                    $resultBuku = mysqli_query($conn, $queryBuku);
                    $rowBuku = mysqli_fetch_assoc($resultBuku);
                    $totalBuku = $rowBuku['totalBuku'];
                    ?>
                    <p class="count">
                        <?= $totalBuku; ?>
                    </p>
                    <p class="sub">Total Buku</p>
                </div>
                <div class="bg"><img src="../../assets/images/0HOz23515.jpg" alt="bg-header"></div>
            </div>
            <div class="list">
                <div class="content">
                    <?php
                    // Mengambil jumlah buku dari database
                    // Get the count of records from 'peminjaman' table
                    $sqlPeminjaman = "SELECT COUNT(*) AS countPeminjaman FROM peminjaman";
                    $resultPeminjaman = $conn->query($sqlPeminjaman);
                    $rowPeminjaman = $resultPeminjaman->fetch_assoc();
                    $countPeminjaman = $rowPeminjaman['countPeminjaman'];

                    // Get the count of records from 'riwayat_peminjaman' table
                    $sqlRiwayatPeminjaman = "SELECT COUNT(*) AS countRiwayat FROM riwayat_peminjaman";
                    $resultRiwayatPeminjaman = $conn->query($sqlRiwayatPeminjaman);
                    $rowRiwayatPeminjaman = $resultRiwayatPeminjaman->fetch_assoc();
                    $countRiwayatPeminjaman = $rowRiwayatPeminjaman['countRiwayat'];

                    // Calculate the total transactions
                    $totalTransaksi = $countPeminjaman + $countRiwayatPeminjaman;
                    ?>
                    <p class="count">
                        <?= $totalTransaksi; ?>
                    </p>
                    <p class="sub">Transaksi</p>
                </div>
                <div class="bg"><img src="../../assets/images/0HOz23515.jpg" alt="bg-header"></div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="header">
            <div class="wrap">
                <h1>Anggota</h1>
                <p>4 terbaru</p>

            </div>
            <a href="listUser.php">Lihat Selengkapnya >></a>
        </div>
        <?php
        // Retrieve the four latest users
        $sqlLatestUsers = "SELECT id_user, nama, username FROM user ORDER BY id_user DESC LIMIT 4";
        $resultLatestUsers = $conn->query($sqlLatestUsers);
        ?>

        <table class="latest-users">
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
            </tr>
            <?php
            while ($row = $resultLatestUsers->fetch_assoc()) {
                $idUser = $row['id_user'];
                $nama = $row['nama'];
                $username = $row['username'];

                echo "<tr>";
                echo "<td>$idUser</td>";
                echo "<td>$nama</td>";
                echo "<td>$username</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div class="container">
        <div class="header">
            <div class="wrap">
                <h1>Buku</h1>
                <p>4 terbaru</p>

            </div>
            <a href="book.php">Lihat Selengkapnya >></a>
        </div>

    <?php
    // Retrieve the four latest books
    $sqlLatestBooks = "SELECT id_buku, judul_buku, penulis_buku, genre_buku FROM buku ORDER BY id_buku DESC LIMIT 4";
    $resultLatestBooks = $conn->query($sqlLatestBooks);
    ?>
        <table class="latest-books">
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis Buku</th>
                <th>Genre Buku</th>
            </tr>
            <?php
            while ($row = $resultLatestBooks->fetch_assoc()) {
                $idBuku = $row['id_buku'];
                $judulBuku = $row['judul_buku'];
                $penulisBuku = $row['penulis_buku'];
                $genreBuku = $row['genre_buku'];

                echo "<tr>";
                echo "<td>$idBuku</td>";
                echo "<td>$judulBuku</td>";
                echo "<td>$penulisBuku</td>";
                echo "<td>$genreBuku</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php include "../templates/foot.php"; ?>