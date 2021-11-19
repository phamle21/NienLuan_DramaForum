<?php
    if(isset($_POST['recode']) && $_POST['recode'] == 1){
        $username = $_COOKIE['repass'];
        require_once('../../database/config.php');

        $sql="SELECT * FROM thanhvien WHERE username = '$username'";
        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {
            $randomcode = $row["code"];
            $email = $row["email"];
            $fullname = $row["fullname"];
        }
        $to_email = $email;
        $subject = "Quên mật khẩu - Drama Forum";
        $message = "<p>Gửi ".$fullname.",</p><p>Có vẻ bạn đã quên mật khẩu của mình.</p><p> Đây là mã xác nhận lấy lại mật khẩu của bạn: </p><h1 style='color: green; font-size: 20px;'>".$randomcode."</h1><p>Xin cảm ơn.</p>";
        $header = "From: phamle21@gmail.com.vn";

        include('sendmail.php');
        $success = $mail->Send();
        if($success == TRUE){
            setcookie('error_resend','Mã xác nhận đã được gửi đi!',time() +5, '/');
            header('Location: ./forget_pass1.php');
        }else{
            setcookie('error_resend','Lỗi chưa gửi được mã xác nhận!',time() +5, '/');
            header('Location: ./forget_pass1.php');
        }
        $success = $mail->Send();
        
    }

    if(isset($_POST['recode_register']) && $_POST['recode_register'] == 1){
        $username = $_COOKIE['repass'];
        include('../database/config.php');

        $sql="SELECT * FROM thanhvien WHERE username = '$username'";
        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {
            $randomcode = $row["code"];
            $email = $row["email"];
            $fullname = $row["fullname"];
        }
        $to_email = $email;
        $subject = "Quên mật khẩu - Drama Forum";
        $message = "<p>Gửi ".$fullname.",</p>
                    <p>Chào mừng bạn đến với diễn đàn.</p>
                    <p> Đây là mã xác nhận tài khoản ".$username." của bạn: </p>
                    <h1 style='color: green; font-size: 20px;'>".$randomcode."</h1>
                    <p>Xin cảm ơn.</p>";
        $header = "From: phamle21@gmail.com.vn";

        include('sendmail.php');
        $success = $mail->Send();
        if($success == TRUE){
            setcookie('error_resend','Mã xác nhận đã được gửi đi!',time() +5, '/');
            header('Location: ./forget_pass1.php');
        }else{
            setcookie('error_resend','Lỗi chưa gửi được mã xác nhận!',time() +5, '/');
            header('Location: ./forget_pass1.php');
        }
        $success = $mail->Send();
        
    }

?>