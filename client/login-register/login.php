<?php
	session_start();
	
	require_once("../../database/config.php");
	
	if(isset($_COOKIE['login_tv'])){
		header('Location: ' .'../index.php');
	}
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg); ">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng nhập</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<!-- FORM LOGIN -->
						<form action="xuly_login.php" method="post" class="signin-form">
							<?php
								
								if(isset($_COOKIE['thongbao'])){
							?>
							<div>
								<a style="color: red; display: flex; justify-content: center;">Tài khoản hoặc mật khẩu sai</a>
							</div>
							<?php
								}
							?>

							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" name="rememberme" value="true" checked="">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="forget_pass.php" style="color: #fff">Quên mật khẩu</a>
								</div>
							</div>
						</form>

						<p class="w-100 text-center">Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
		      		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

