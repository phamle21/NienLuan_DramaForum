<?php
    require_once('../database/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drama Forum| Trang chủ</title>
    
    <link rel="shortcut icon" href="./img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/index.css">
    
</head>
<body>
    <div id="all">
        <!-- Header -->
        <div id="header_0">
            <div id="header">
                <a id="logoclick" href="./"><img src="./img/logo.png" alt="logo"><i><small>Drama</small></i></img></a>

                <div class="search-container-mystyle">
                    <form id="search" onsubmit="return check_search()" action="">
                        <input id="input_search" type="text" placeholder="Nhập gì đó để tìm kiếm..." name="search">
                        <button id="btn_search" type="submit" ><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div id="navigation">
                    <a href="">Diễn đàn</a>
                    <a href="">Khám phá</a>
                    <a href="">Hỏi đáp</a>
                </div>
                
                <?php
                    
                    if(isset($_COOKIE['login_tv'])){
                        
                        $id = $_COOKIE['login_tv'];
                        $sql_user = "SELECT * FROM thanhvien WHERE id='$id'";
                        $result_user = $con->query($sql_user);

                        while($row = $result_user->fetch_assoc()){
                            $fullname = $row['fullname'];
                            $avt = $row['avt'];
                        }
                ?>
                <div id="user">                    
                    <i class="far fa-bell"></i>
                    <div id="user_content">
                        <div id="img_user">
                            <img src="<?php echo $avt; ?>" alt="">
                        </div>
                        <div id="name_user" >
                            <a onclick="clickDrop()" class="btn_dropdown">&nbsp;<?php echo $fullname; ?>&nbsp;<i class="fas fa-angle-down"></i></a>
                            
                        </div>
                        <div id="menu_user" class="content_dropdown">
                            <ul>
                                <li><a href=""><i class="far fa-user-circle" style="margin: 5px;"></i>Trang cá nhân</a></li>
                                <li><a href=""><i class="fas fa-lock" style="margin: 5px;"></i>Đổi mật khẩu</a></li>
                                <li><a href="./logout.php"><i class="fas fa-sign-out-alt" style="margin: 5px;"></i>Đăng xuất</a></li>                                
                            </ul>
                        </div>

                        
                        <script src="./js/jquery-3.6.0.js"></script>
                        <script src="./js/index.js"></script>

                    </div>
                </div>
                <?php
                }else{
                ?>
                <div id="user">
                    <a id="login" href="login-register/login.php">Đăng nhập</a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- /Header -->