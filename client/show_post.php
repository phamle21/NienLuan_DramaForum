<?php
    require_once('../database/config.php');
    include('top_master.php');
    
    $id_post = $_GET['p'];

    // Tinh lượt views
    if (!isset($_COOKIE['views_'.$id_post])) { // nếu chưa có cookie
        setcookie('views_'.$id_post, $id_post, 0, '/');
        $con->query("UPDATE posts 
                     SET views = views + 1 
                     WHERE id_post = '$id_post'");
    }
    
    $sql_post = "SELECT a.*,  b.chude
                 FROM posts as a
                 LEFT JOIN chude as b ON a.id_chude=b.id_chude
                 WHERE a.id_post='$id_post'";
    $result_post = $con->query($sql_post);

    while($row = $result_post->fetch_assoc()){
        $title_post = $row['title'];
        $id_tv = $row['id_thanhvien'];
        $content = $row['content'];
        $create_date = $row['created_at'];
        $date = date("d/m/Y H:m", strtotime($create_date));
        $chude = $row['chude'];

        $sql_tv = "SELECT * FROM thanhvien WHERE id='$id_tv'";
        $result_tv = $con->query($sql_tv);
        while($row = $result_tv->fetch_assoc()){
            $fullname_tv = $row['fullname'];
            $avt_tv = $row['avt'];
        }
    }
?>

<link rel="stylesheet" href="./css/post.css">

<!-- //Show bài viết -->
<div class="show_post">
    <!-- LEFT -->
    <div id="go_top"></div>
    <div class="left_body_post">
        <div class="title_post">
            <h1><?php echo $title_post ?></h1>
            <a><?php echo $date ?></a>
        </div>
        <div class="author_post">
            <img src="<?php echo $avt_tv ?>" alt="">
            <a href=""><h3>&nbsp;&nbsp;<?php echo $fullname_tv ?> -&nbsp;</h3></a>
            
            <div class="theme">
                <a href=""><?= $chude;?></a>
            </div>
        </div>
        
        <div class="content_post">
            <p><?php echo $content ?></p>
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