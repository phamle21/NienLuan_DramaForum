<?php
    require_once("../../database/config.php");

    if(isset($_POST['code_repass'])){
        $username = $_COOKIE['repass'];
        $sql = "SELECT * FROM thanhvien WHERE username='$username'";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
            $code = $row['code'];
        }
        echo $_POST['code_repass'];
        if($_POST['code_repass'] == $code){
            setcookie('confirm_code_repass','true', 0, '/');
            header('Location: ./repassword.php');
        }else{
            setcookie('error_code_repass','Bạn đã nhập sai mã xác nhận!',time()+5, '/');
            header('Location: ./forget_pass1.php');
        }

    }else{
        setcookie('error_code_repass','Lỗi!!!',time()+5, '/');
        header('Location: ./forget_pass1.php');
    }
    
?>