<?php
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];

    require_once('../../database/config.php');

    $randomcode = rand(100000,999999);

    $sql="INSERT INTO thanhvien (username, password, fullname, email, birthday, code) 
        VALUES ('$username', '$password', '$fullname', '$email', '$birthday', '$randomcode')";

    if ($con->query($sql) === TRUE) {
        $id = $con->insert_id;
        setcookie('login_tv', $id, 0, '/');

        $to_email = $email;
        $subject = "Xác nhận đăng ký - Drama Forum";
        $message = "<p>Gửi ".$fullname.",</p>
                    <p>Chào mừng bạn đến với diễn đàn.</p>
                    <p> Đây là mã xác nhận tài khoản ".$username." của bạn: </p>
                    <h1 style='color: green; font-size: 20px;'>".$randomcode."</h1>
                    <p>Xin cảm ơn.</p>";
        
        include('sendmail.php');

        $success = $mail->Send();

        if($success == TRUE){
            header("Location: ./xacnhan_mail.php");
        }else{
            echo "Gửi mail thất bại";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close(); 
    
?>