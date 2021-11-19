<?php
    require_once("../../database/config.php");
    
    if(isset($_POST['username']) && isset($_POST['email'])){
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM thanhvien WHERE username='$username' AND email='$email'";
        $result = $con->query($sql);

        if ($result->num_rows > 0){
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*';
            $newcode_repass = substr(str_shuffle($permitted_chars), 0, 10);

            $sql1 = "UPDATE thanhvien SET code = '$newcode_repass' WHERE username='$username' ";
            $result1 = $con->query($sql1);

            $to_email = $email;
            $subject = "Quên mật khẩu - Drama Forum";
            $message = "<p>Gửi ".$username.",</p><p>Có vẻ bạn đã quên mật khẩu của mình.</p><p> Đây là mã xác nhận lấy lại mật khẩu của bạn: </p><h1 style='color: green; font-size: 20px;'>".$newcode_repass."</h1><p>Xin cảm ơn.</p>";
            $header = "From: phamle21@gmail.com.vn";

            include('sendmail.php');

            $success = $mail->Send();

            header('Location: ./forget_pass1.php');
            setcookie('repass',$username,0,'/');
        }else{
            setcookie('thongbao1','true',time()+3 ,'/');
            header('Location: ./forget_pass.php');
        }
    }else{
        setcookie('thongbao1','true',time()+3 ,'/');
        header('Location: ./forget_pass.php');
    }
?>