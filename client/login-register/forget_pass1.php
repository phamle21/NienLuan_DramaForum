<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style1.css">

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
						<!-- FORM Active -->
						<form action="xuly_forgetpass1.php" method="post" class="signin-form">
                            <p>Xin chào, bạn vui lòng nhập mã xác nhận được gửi qua email nhé!<br> Có cái pass cũng quên nữa, não cá vừa thôi chứ!</p>
							<div class="form-group">
                                <?php
                                    if(isset($_COOKIE['error_code_repass'])){
                                    echo "<p id='error_user' style='margin-left: 20px;color: red;'>".$_COOKIE['error_code_repass']."</p>";
                                    }
                                ?>
								<input type="text" name="code_repass" class="form-control" placeholder="Nhập mã xác nhận" >
                                
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Xác nhận</button>
							</div>
						</form>
                        <form id="re_send_code" action="xuly_resendcode.php" method="post">
                            <input type="hidden" name="recode" value="1">
                            <?php
                                if(isset($_COOKIE['error_resend'])){
                                    echo "<p>".$_COOKIE['error_resend']."</p>";
                                }
                            ?>
                            <p class="w-100 text-center">Bạn chưa nhận được mã? <a id="countdown" style="color: white"> </a> <a id="hidden" onclick="document.getElementById('re_send_code').submit()">Gửi lại</a></p>
                        </form>
                        <script>
                            //Countdown
                            var count=60;
                            var counter=setInterval(timer, 1000); 
                            function timer()
                            {
                                document.getElementById('countdown').innerHTML =" Xin chờ thêm " + count + " giây";
                                count=count-1;
                                if (count <= 0)
                                {
                                    clearInterval(counter);
                                    document.getElementById('hidden').style.display = "inline";
                                    document.getElementById('countdown').style.display = "none";
                                    return;
                                }

                            }
                        </script>
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