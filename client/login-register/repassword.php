<?php

	require_once("../../database/config.php");
	if(!isset($_COOKIE['confirm_code_repass'])){
		setcookie('error_code_repass','Lỗi! Xin hãy nhập lại mã xác nhận!',time()+5, '/');
		header('Location: ./forget_pass1.php');
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
						<h2 class="heading-section" style="width: 315px">Đổi mật khẩu mới</h2>
					</div>
					<div class="login-wrap p-0">
						<!-- FORM LOGIN -->
						<form action="xuly_repassword.php" onsubmit="return check()" name="dangky" method="post" class="signin-form">

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
								<button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
							</div>
						</form>
						<script>
							function check() {
							var matkhau = document.dangky.password.value.trim();
							var rematkhau = document.dangky.repassword.value.trim();

							var status = true;
							var matkhau1 = /^[A-Za-z0-9!@#$%^&*]{6,15}$/;

							if (matkhau.length < 1)
							{
								document.getElementById("error_pass").innerHTML = "Nhập mật khẩu của bạn";
								status = false;
							} 
							else if (matkhau1.test(matkhau) == false)
							{
								document.getElementById("error_pass").innerHTML = "Sử dụng 6-15 ký tự cho mật khẩu, được dùng các kí tự !@#$%^&*";
								status = false;
							}
							else 
							{
								document.getElementById("error_pass").innerHTML = "";
							}
							
							if (rematkhau != matkhau || rematkhau.length < 1)
							{
								document.getElementById("error_repass").innerHTML = "Mật khẩu chưa khớp";
								status = false;
							} 
							else 
							{
								document.getElementById("error_repass").innerHTML = "";
							}

							return status;
						}
						</script>
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

