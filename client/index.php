<?php
    
    require_once('../database/config.php');
    if(isset($_COOKIE['login_tv'])){
        $id = $_COOKIE['login_tv'];
        
        $sql="SELECT * FROM thanhvien WHERE id = '$id'";
        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {
            $code_xacnhan = $row["code"];
        }

        if($code_xacnhan != 'active'){
            header('Location: ./login-register/xacnhan_mail.php');
        }
    }
    
    include('top_master.php');
?>

<!-- Content Body -->
<div id="body_content">

<div id="top_trending">
    <div class="content_top">
        <img src="img/logo_trending.jpg" alt="logo_trending">
        <h1>Top Trending</h1>
    </div>
    <div id="list_trend">
        <?php
            $sql_trend = "SELECT * FROM posts
                          ORDER BY views DESC
                          LIMIT 5";
            $result_trend = $con->query($sql_trend);

            while($row = $result_trend->fetch_assoc()){
                $id_post = $row['id_post'];
                $title = $row['title'];
                $img_trend = $row['img_description'];
                $id_thanhvien = $row['id_thanhvien'];

                $sql_tv = "SELECT * FROM thanhvien WHERE id='$id_thanhvien'";
                        $result_tv = $con->query($sql_tv);
                        while($row = $result_tv->fetch_assoc()){
                            $fullname_tv = $row['fullname'];
                        }

        ?>
        <div id="content_trend">
            <a href="">
                <a id="title_trend" href="./show_post.php?p=<?php echo $id_post ?>"><?php echo $title ?></a>
                <a id="author_trend">Phạm Lê</a>
                <img id="img_trend" src="<?php echo $img_trend ?>" alt="">
            </a>
        </div>
        <?php
            }
        ?>
    </div>
</div>

<div id="notify_admin">
    <div class="content_top">
        <img src="img/logo_notifyadmin.png" alt="logo_notify_admin">
        <h1>Thông báo từ admin</h1>
    </div>
    <div id="list_notify_admin">
        <?php
            
            $sql_postadmin = "SELECT * FROM posts_admin ORDER BY id_post_admin DESC";
            $result_postadmin = $con->query($sql_postadmin);
            
            
            while ($row = $result_postadmin->fetch_assoc()) {
                
                $id_admin = $row["id_admin"];
                $id_post_admin = $row['id_post_admin'];
                $title = $row['title'];
                $views = $row['views'];
                $cmt = $row['cmt'];
                $create_date = $row['created_at'];
                $date = date("d/m/Y", strtotime($create_date));

                $sql_admin = "SELECT * FROM admin WHERE id_admin='$id_admin' ";
                $result_admin = $con->query($sql_admin);
                while ($row = $result_admin->fetch_assoc()) {
                    $name_admin = $row['fullname'];
                    $avt_admin = $row['avt'];
                }
                
        ?>
        <article>
            <div id="avt_notify_admin">
                <img  src="<?php echo $avt_admin ?>" alt="">
                <a><?php echo $name_admin ?></a>
            </div>
            <div id="content_notify_admin">
                <div id="title_notify_admin">
                    <a href="./show_post_admin.php?pa=<?=$id_post_admin;?>"><?php echo $title ?></a>
                </div>
                <div id="icon_notify_admin">
                    <i class="far fa-comment"> <?= $cmt ?></i>
                    <i class="far fa-eye"> <?= $views ?></i>
                    <i class="far fa-calendar-check"> <?= $date ?></i>
                </div>
            </div>
        </article>
        <hr>
        <?php
            }
        ?>
    </div>
    <div id="quangcao">
        <img src="https://gamek.mediacdn.vn/thumb_w/600/133514250583805952/2020/8/4/2-1596535616859109961818.png" alt="">
    </div>
</div>

<div id="forum">
    <div class="content_top">
        <img src="img/logo_forum.png" alt="logo_forum">
        <h1>Forum Mini</h1>
    </div>
    <div id="content_forum">
            
        <div id="left_content_forum">
            <!-- FORUM MINI -->
            <div id="navigation_forum">
                <ul>
                    <li><a href="./#forum_newpost"><i class="fas fa-feather-alt"></i> Bài viết mới</a></li>
                    <li><a href="./#forum_QA"><i class="fas fa-question"></i> Hỏi đáp</a></li>
                    <li><a href="./#forum_member"><i class="fas fa-users"></i> Thành viên</a></li>
                </ul>
            </div>
            <hr>
            <!-- New Post -->
            <section class="forum_newpost" id="forum_newpost">
            </section>
            <!-- Q & A -->
            <section class="forum_QA" id="forum_QA">
                <div id="list_content_forum">
                    <?php
                        
                        $sql_post = "SELECT posts.*,chude.chude FROM posts
                                    LEFT JOIN chude ON posts.id_chude=chude.id_chude 
                                    ORDER BY id_post DESC LIMIT 0, 2";
                        $result_post = $con->query($sql_post);

                        while ($row = $result_post->fetch_assoc()) {
                            $id_post = $row['id_post'];
                            $id_tv = $row["id_thanhvien"];
                            $title = $row['title'];
                            $description = $row['description_post'];
                            $img_des = $row['img_description'];
                            $create_date = $row['created_at'];
                            $date = date("d/m/Y", strtotime($create_date));
                            $chude = $row['chude'];

                            $sql_tv = "SELECT * FROM thanhvien WHERE id='$id_tv'";
                            $result_tv = $con->query($sql_tv);
                            while($row = $result_tv->fetch_assoc()){
                                $fullname_tv = $row['fullname'];
                                $avt_tv = $row['avt'];
                            }

                        
                    ?>
                    <article class="post_tv">
                        <div id="img_post">
                            <a href="./show_post.php?p=<?php echo $id_post ?>">
                                <img  src="<?php echo $img_des ?>" alt="">
                            </a>
                        </div>
                        <div id="content_post">
                            <div id="title_post">
                                <a href="./show_post.php?p=<?php echo $id_post ?>"><?php echo $title ?> </a>
                            </div>
                            <div id="description_post">
                                <p><?php echo $description ?></p>
                            </div>
                            <div id="author_post">
                                <img src="<?php echo $avt_tv ?>" alt="avt">
                                <span><?php echo $fullname_tv ?></span>
                                <a> - </a>
                                <a><?php echo $date ?></a>
                                <a> - </a>
                                <a href="#chude"><?=$chude;?></a>
                            </div>
                        </div>
                    </article>
                    <?php
                        }
                    ?>
                </div>
                <div class="pagination">
                    <ul>
                        <?php 
                            //Đếm số bài viết
                            $result_count_post = $con->query("SELECT COUNT(id_post) as total FROM posts");
                            $row = $result_count_post->fetch_assoc();
                            $count_post = $row['total'];//tổng số bài viết
                            
                        ?>
                        <li><a class="prev">&laquo;</a></li>
                        <li><a class="active">1</a></li>
                        <li><a>2</a></li>
                        <li><a>3</a></li>
                        <li><a class="next">&raquo;</a></li>
                    </ul>
                </div>
            </section>
            <!-- Member -->
            <section class="forum_member" id="forum_member">
                <div id="list_content_forum">
                    <?php
                        
                        $sql_post = "SELECT posts.*,chude.chude FROM posts
                                    LEFT JOIN chude ON posts.id_chude=chude.id_chude 
                                    ORDER BY id_post DESC LIMIT 0, 5";
                        $result_post = $con->query($sql_post);

                        while ($row = $result_post->fetch_assoc()) {
                            $id_post = $row['id_post'];
                            $id_tv = $row["id_thanhvien"];
                            $title = $row['title'];
                            $description = $row['description_post'];
                            $img_des = $row['img_description'];
                            $create_date = $row['created_at'];
                            $date = date("d/m/Y", strtotime($create_date));
                            $chude = $row['chude'];

                            $sql_tv = "SELECT * FROM thanhvien WHERE id='$id_tv'";
                            $result_tv = $con->query($sql_tv);
                            while($row = $result_tv->fetch_assoc()){
                                $fullname_tv = $row['fullname'];
                                $avt_tv = $row['avt'];
                            }

                        
                    ?>
                    <article class="post_tv">
                        <div id="img_post">
                            <a href="./show_post.php?p=<?php echo $id_post ?>">
                                <img  src="<?php echo $img_des ?>" alt="">
                            </a>
                        </div>
                        <div id="content_post">
                            <div id="title_post">
                                <a href="./show_post.php?p=<?php echo $id_post ?>"><?php echo $title ?> </a>
                            </div>
                            <div id="description_post">
                                <p><?php echo $description ?></p>
                            </div>
                            <div id="author_post">
                                <img src="<?php echo $avt_tv ?>" alt="avt">
                                <span><?php echo $fullname_tv ?></span>
                                <a> - </a>
                                <a><?php echo $date ?></a>
                                <a> - </a>
                                <a href="#chude"><?=$chude;?></a>
                            </div>
                        </div>
                    </article>
                    <?php
                        }
                    ?>
                </div>
                <div class="pagination">
                    <ul>
                        <?php 
                            //Đếm số bài viết
                            $result_count_post = $con->query("SELECT COUNT(id_post) as total FROM posts");
                            $row = $result_count_post->fetch_assoc();
                            $count_post = $row['total'];//tổng số bài viết
                            
                        ?>
                        <li><a class="prev">&laquo;</a></li>
                        <li><a class="active">1</a></li>
                        <li><a>2</a></li>
                        <li><a>3</a></li>
                        <li><a class="next">&raquo;</a></li>
                    </ul>
                </div>
            </section>
            <!-- END FORUM MINI -->
        </div>
            
        <div id="right_content_forum">
            <div id="new_post">
                <a href="./new_post.php">Viết bài</a>
            </div>
            <div class="BXH">
                <div class="content_BXH">
                    <h3>Tác giả nổi bật</h3>
                    <hr>
                    <ul>
                        <!-- <li>
                            <a>T O P</a>
                            <a>N A M E</a>
                        </li> -->
                        <li>
                            <p>#1</p>
                            <a href="">P Lê</a>
                        </li>
                        <li>
                            <p>#2</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#3</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#4</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#5</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#6</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#7</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#8</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#9</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#10</p>
                            <a href="">OneChampYasou</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="BXH">
                <div class="content_BXH">
                    <h3>Thành viên tích cực</h3>
                    <hr>
                    <ul>
                        <!-- <li>
                            <a>T O P</a>
                            <a>N A M E</a>
                        </li> -->
                        <li>
                            <p>#1</p>
                            <a href="">P Lê</a>
                        </li>
                        <li>
                            <p>#2</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#3</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#4</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#5</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#6</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#7</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#8</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#9</p>
                            <a href="">OneChampYasou</a>
                        </li>
                        <li>
                            <p>#10</p>
                            <a href="">OneChampYasou</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /Content body -->
<?php
    include('bot_master.php');
?>