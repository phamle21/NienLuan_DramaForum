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
	
	<link rel="stylesheet" href="./css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg); ">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Quên mật khẩu</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<!-- FORM LOGIN -->
						<form action="xuly_forgetpass.php" method="post" class="signin-form">
							
                            <p>Nhập email đã xác nhận đúng với tài khoản, mã xác nhận sẽ được gửi đến email.</p>
                            <?php
								
								if(isset($_COOKIE['thongbao1'])){
							?>
                                <div>
                                    <a style="color: red; display: flex; justify-content: center;">Tài khoản và email không khớp</a>
                                </div>
							<?php
								}
							?>
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input id="text" name="email" type="email" class="form-control" placeholder="Email" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Gửi</button>
							</div>
						</form>

						<p class="w-100 text-center">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
		      		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/main.js"></script>

	</body>
</html>

