<?php include '../templates/head.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .square {
            position: relative; /* Add position relative to the square element */
            width: 500px;
            height: 300px;
            background-image: url("../../assets/images/library.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            margin: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .delete:hover {
            transform: scale(1.1) translateX(20px);
        }

        .add:hover {
            transform: scale(1.1) translateX(-20px);
        }

        .add:hover::before,
        .delete:hover::before {
            opacity: 0.4;
        }

        .add::before,
        .delete::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgb(4, 0, 25);
            opacity: 0.8;
            z-index: -1; /* Add z-index to move the pseudo-element behind the text */
            transition: opacity 0.5s;
        }

        .add::before {
            border-radius: 100px 0 0 100px;
        }

        .delete::before {
            border-radius: 0 100px 100px 0;
        }

        .add {
            border-radius: 100px 0 0 100px;
        }

        .delete {
            border-radius: 0 100px 100px 0;
        }

        .container a {
            text-decoration: none;
            color: white;
            font-size: 40px;
            position: relative; /* Add position relative to the link */
            z-index: 1; /* Add z-index to bring the text in front */
        }

        .link-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .link-button {
            width: 80%;
            height: 80px;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        .link-button:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    
    <div class="container">
        <a class="square add" href="tambahBuku.php">Add Book</a>
        <a class="square delete" href="hapusBuku.php">Delete Book</a>
    </div>

    <div class="link-container">
        <a class="link-button" href="listUser.php">List peminjaman user</a>
    </div>

</body>
</html>

<?php include '../templates/foot.php' ?>