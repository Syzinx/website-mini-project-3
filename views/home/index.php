<?php include "../templates/head.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpusku</title>
</head>

<body>
    <header>
        <div class="grid">
            <p>Selamat datang di,</p>
            <h1>Perpustakaanku</h1>
            <p class="sub">Temukan berbagai macam buku yang menarik dari berbagai macam koleksi yang tersedia</p>
            <form class="search" id="cari" name="cari" method="POST" action="../searchBooks/index.php">
                <select name="point">
                    <option value="judul">Judul</option>
                    <option value="pengarang">Pengarang</option>
                    <option value="penerbit">Penerbit</option>
                </select>
                <input required class="box" type="text" name="cari" value=""
                    placeholder="Ketik judul buku yang ingin dicari!!"><input class="cta" name="search" type="submit"
                    value="Cari Buku">
            </form>
        </div>
        <div class="bg">
            <img src="../../assets/images/bg-home.jpg" alt="bg-header">
        </div>
    </header>

    <h1 id="dataKategori">Data Kategori</h1>
    <ul>
        <?php
        require '../../koneksi.php';

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM kategori";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $kategoriNama = $row["nama_kategori"];
                echo "<li><a href='?kategori=$row[id_kategori]'><img src='../../assets/images/icon-kategori/$row[icon_kategori]'>" . $kategoriNama . "</a></li>";
                }
        } else {
            echo "<li>Tidak ada data kategori.</li>";
        }

        mysqli_close($conn);
        ?>
    </ul>


    <h1 id="Listbook">List Book</h1>
    <div class="card-wrapper">
        <?php
        require '../../koneksi.php';
        $selectedCategory = isset($_GET['kategori']) ? $_GET['kategori'] : '';

        $query = "SELECT * FROM buku";
        if (!empty($selectedCategory)) {
            $query .= " WHERE id_kategori = '$selectedCategory'";
        }
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card" id="listBook">
                    <img src="../../assets/images/cover-buku/<?= $row['cover_buku']; ?>" alt="Book Cover" class="card-image">
                    <div class="card-content">
                        <h3 class="card-title">
                            <?= $row['judul_buku']; ?>
                        </h3>
                        <p class="card-author">by
                            <?= $row['penulis_buku']; ?>
                        </p>
                        <p class="card-publisher">Publisher:
                            <?= $row['penerbit_buku']; ?>
                        </p>
                        <p class="card-year">Publication Year:
                            <?= $row['tanggal_terbit']; ?>
                        </p>
                        <a href="../details/index.php?id_buku=<?= $row['id_buku']; ?>" class="btn-read">Read More</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Tidak ada data buku.";
        }
        ?>
    </div>

    <script> 
        $('nav').removeClass('active');
		$('nav .menu .list:first-child').addClass('active');

		$(window).on("scroll", function () {
			if ($(window).scrollTop() === 0) {
				$('nav').removeClass('active');
			} else {
				$('nav').addClass('active');
			}
		});

    </script>
</body>
</html>
<?php include '../templates/foot.php' ?>    