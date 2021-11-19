<?php
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    if(isset($_POST['rememberme'])){
        $rememberme = $_POST['rememberme'];
    }
    require_once('../../database/config.php');
    
    $sql="SELECT * FROM thanhvien WHERE username = '$username' AND password = '$password'";
    $result = $con->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
    }

    if ($result->num_rows > 0) {
        if(isset($rememberme) && $rememberme == 'true'){
            setcookie('login_tv', $id, time()+7*24*60*60, '/');
        }else{
            setcookie('login_tv', $id, 0, '/');
        }
        setcookie('thongbao', 'true', time() -10, '/');
        header('Location: ' . '../index.php');
    } else { 
        setcookie('thongbao', 'true', time() +3, '/');
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }

    $con->close(); 
?>