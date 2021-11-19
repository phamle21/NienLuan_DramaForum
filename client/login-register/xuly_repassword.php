<?php
    require_once('../../database/config.php');
    $newpass = md5($_POST['password']);
    $username = $_COOKIE['repass'];

    $sql = "UPDATE thanhvien SET code='active', password='$newpass' WHERE username='$username' ";
    $result = $con->query($sql);

    $sql1="SELECT * FROM thanhvien WHERE username = '$username'";
    $result1 = $con->query($sql1);

    while($row = $result1->fetch_assoc()){
        $id = $row['id'];
    }

    if($result === TRUE){
        setcookie('login_tv', $id, 0, '/');
        header('Location: ../index.php');
    }else{
        echo "Update Fail: " . $sql . "<br>" . $con->error;
    }
?>