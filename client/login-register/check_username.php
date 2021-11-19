<?php
    require_once('../../database/config.php');

    $username = $_GET['u'];
    $pattern = "/^[A-Za-z][A-Za-z0-9]{4,14}$/";

    $sql="SELECT * FROM thanhvien WHERE username = '$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0){
        echo "Tài khoản đã tồn tại";
    }else if(!preg_match($pattern,$username)){
        echo "Nhập bắt đầu phải là chữ cái, dài 5-15 ký tự";
    }else{
        echo "<p style='color:#33b300;'>Tài khoản có thể sử dụng</p>";
    }
?>