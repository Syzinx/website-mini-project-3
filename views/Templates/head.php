<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Perpusku</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0082CC">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0aa1f9181b.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/stylenew.css">
</head>
<body>
    <div class="menu-mobile">
        <a class="list" href="../home/index.php">Home</a>
        <a class="list" href="../home/index.php#dataKategori">Category</a>
        <a class="list" href="../home/index.php#listBook">List Book</a>
        <a class="list" href="../login/logout.php">Log-Out</a>
    </div>
    
    <div id="menu-toggle">
        <div id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div id="cross">
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="float">
    <nav class="active">
        <div class="grid">
            <h1><a href="index.php?page=1">perpuss</a></h1>
            <div class="menu">
                <?php if(isset($_SESSION['username'])): ?>
                    <?php if($_SESSION['username'] == "admin" || $_SESSION['username'] == "Admin"): ?>
                        <a class="list" href="../admin/dashboard.php">Dashboard</a>
                        <a class="list" href="../admin/book.php">Book</a>
                        <a class="list" href="../admin/listUser.php">User</a>
                    <?php else: ?>
                        <a class="list" href="../home/index.php">Home</a>
                        <a class="list" href="../home/index.php#dataKategori">Category</a>
                        <a class="list" href="../home/index.php#listBook">List Book</a>
                        <a class="list" href="../catalogBooks/">My Book</a>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
            <div class="user">
                <?php if(isset($_SESSION['username'])): ?>
                    <span class="username"><?php echo $_SESSION['username']; ?></span> <i class="fas fa-sort-down"></i>
                    <div class="drop">
                        <a href="../login/logout.php">Log-Out</a>
                    </div>
                <?php else: ?>
                        <a href="../login/login.php" class="cta">Login</a>
                        <a href="../login/" class="cta">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <script> 
        var dropdownTimeout;

        $('nav .user').hover(function() {
            clearTimeout(dropdownTimeout);
            $('nav .user .drop').css('display', '-webkit-box').css('display', '-ms-flexbox').css('display', 'flex');
        }, function() {
            dropdownTimeout = setTimeout(function() {
                $('nav .user .drop').css('display', 'none');
            }, 1000);
        });
    </script>
</body> 