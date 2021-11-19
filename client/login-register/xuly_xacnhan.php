<?php
    $code = $_POST['code'];

    $id = $_COOKIE['login_tv'];
    require_once('../../database/config.php');
    $sql="SELECT * FROM thanhvien WHERE id = '$id'";
    $result = $con->query($sql);

    while ($row = $result->fetch_assoc()) {
        $code_xacnhan = $row["code"];
    }
    
    if($code == $code_xacnhan){
        $sql1 = "UPDATE thanhvien SET code='active' WHERE id=$id ";
        $result1 = $con->query($sql1);
        if($result1 === TRUE){
            header('Location: ../index.php');
        }else{
            echo "Update Fail: " . $sql . "<br>" . $con->error;
        }
        
    }else{
        setcookie('error_code_active', 'true', time()+10, '/');
        header('Location: ./xacnhan_mail.php');
    }
    
?>