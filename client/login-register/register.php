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
	<script>
		
	</script>
	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg); ">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4" style="background-color: #0000009c; padding-top: 15px; border-radius: 15px;">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section" style="width: 315px">Đăng ký</h2>
					</div>
					<div class="login-wrap p-0">
						<!-- FORM LOGIN -->
						<form action="xuly_register.php" onsubmit="return checkdangky()" name="dangky" method="post" class="signin-form">

                            <div class="form-group">
								<input type="text" name="fullname" class="form-control" placeholder="Tên của bạn" >
                                <i id="error_name" style="margin-left: 20px;letter-spacing: 1px;"><small >Tên này sẽ hiển thị trên diễn đàn</small></i>
                            
							</div>
							<div class="form-group">
								<input type="text" name="username" onchange="kiemtraten(this.value)" class="form-control" placeholder="Tên đăng nhập" >
                                <p id="error_user" style="margin-left: 20px;color: red"></p>
							</div>
                            <div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email" >
                                <p id="error_email" style="margin-left: 20px;color: red"></p>
							</div>
                            <div class="form-group">
								<input type="date" name="birthday" class="form-control" placeholder="Ngày sinh" >
                                <p id="error_birthday" style="margin-left: 20px;color: red"></p>
							</div>
							<div class="form-group">
								<input id="password-field" name="password" type="password" class="form-control" placeholder="Mật khẩu" >
								<span style="height:65px; top:auto" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								<p id="error_pass" style="margin-left: 20px;color: red"></p>
							</div>
                            <div class="form-group">
								<input id="repassword" type="password" name="repassword" class="form-control" placeholder="Xác nhận mật khẩu" >
								<p id="error_repass" style="margin-left: 20px;color: red"></p>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Đăng ký</button>
							</div>
						</form>

						<p class="w-100 text-center">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
		      		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/register.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	
	</body>
</html>

