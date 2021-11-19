<?php
    include('top_master.php');
    
    $id_post_admin = $_GET['pa'];

    // Tinh lượt views
    if (!isset($_COOKIE['views_admin_'.$id_post_admin])) { // nếu chưa có cookie
        setcookie('views_admin_'.$id_post_admin, $id_post_admin, 0, '/');
        $con->query("UPDATE posts_admin
                     SET views = views + 1 
                     WHERE id_post_admin = '$id_post_admin'");
    }
    
    $sql_post_admin = "SELECT a.*, b.fullname, b.avt
                 FROM posts_admin as a
                 LEFT JOIN admin as b ON a.id_admin=b.id_admin 
                 WHERE a.id_post_admin='$id_post_admin'";
    $result_post_admin = $con->query($sql_post_admin);

    while($row = $result_post_admin->fetch_assoc()){
        $fullname_admin = $row['fullname'];
        $avt_admin = $row['avt'];
        $title_post = $row['title'];
        $content = $row['content'];
        $create_date = $row['created_at'];
        $date = date("d/m/Y H:m", strtotime($create_date));
        $views = $row['views'];
        $cmt = $row['cmt'];
    }
?>

<link rel="stylesheet" href="./css/post_admin.css">

<!-- //Show bài viết -->
<div class="show_post">
    <!-- LEFT -->
    <div id="go_top"></div>
    <div class="left_body_post">
        <div class="title_post">
            <h1><?= $title_post; ?></h1>
            <p for="">
                <i class="far fa-eye"> <?=$views;?></i>
                <a><?= $date; ?></a>
            </p>
        </div>
        <div class="author_post">
            <img src="<?= $avt_admin ?>" alt="">
            <a href=""><h3>&nbsp;&nbsp;<?= $fullname_admin; ?></h3></a>
        </div>
        
        <div class="content_post">
            <p><?= $content ?></p>
        </div>
        <div id="go_bot"></div>
    </div>
    <!-- RIGHT -->
    <div class="right_body_post">
        <a href="#go_top" ><i class="fas fa-arrow-up"></i> Đầu trang <i class="fas fa-arrow-up"></i></a>
        <a href="#go_bot" ><i class="fas fa-arrow-down"></i> Cuối trang <i class="fas fa-arrow-down"></i></a>
    </div>

</div>


<?php
    include('bot_master.php');  
?>