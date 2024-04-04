<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">
				<form class="login100-form" action="./proses_register.php" method="POST">
					<h1 class="login100-form-title">REGISTER</h1>
					<div class="wrap-input100" data-validate="Enter username">
						<input class="input100" type="text" name="nama_user" placeholder="Nama">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100" data-validate="Enter password">
						<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
					</div>
					<div class="container-register100-form-btn">
						<button class="register100-form-btn" name="submit">
							REGISTER
						</button>
					</div>
					<div class="login-more">
						<span class="txt1">
							Have an account?
						</span>
						<a href="../../../perpusku/views/login/login.php" class="txt2">
							Login
						</a>
						<br><br>
						<a href="../../../perpusku/views/home/" class="txt2">
							Kembali ke Home
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
