<?php
    setcookie('login_tv', $_COOKIE['login_tv'],time()-10, '/' );
    header('Location: ./index.php');
?>