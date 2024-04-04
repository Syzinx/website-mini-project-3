<?php include "../templates/head.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 25%;
        }

        .header a{
            font-size: 18px;
            font-weight: bold;
            padding: 0 15px;
            border-left: 2px solid #212529;
        }
    </style>
</head>
<body>
    <br><br><br><br>
    <div class="header">
        <h1 id="Listbook" class="admin-page">Daftar Buku</h1>
        <a href="tambahBuku.php">add book</a>
    </div>

    <?php include "hapusBuku.php"; ?>

</body>
</html>
<?php include "../templates/foot.php"; ?>