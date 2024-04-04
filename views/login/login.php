<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login">
				<form class="login100-form" method="post" action="./proses_login.php">
					<h1 class="login100-form-title">
						LOGIN
					</h1>
					<div class="wrap-input100" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="register100-form-btn" name="submit">
							Login
						</button>
					</div>

					<div class="login-more">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a href="./index.php" class="txt2">
							Sign up
						</a>
						<br><br>
						<a href="../home/" class="txt2">
							Kembali ke Home
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
