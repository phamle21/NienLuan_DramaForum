<?php
    require_once('../../database/config.php');

    //Phân trang của newpost
    if(isset($_POST['pagi_newpost'])){
        //Đếm số bài viết
        $result_count_post = $con->query("SELECT COUNT(id_post) as total FROM posts");
        $row = $result_count_post->fetch_assoc();
        $count_post = $row['total'];//tổng số bài viết
        $step = 1; //Số lượng bài viết ở mỗi trang
        $page_quanti = round($count_post/$step);//Tổng số trang (làm tròn lấy cận trên)

        $page = $_POST['page'];
        if($page < 1) $page=1;
        if($page > $page_quanti) $page = $page_quanti;

        
        $page_start = ($page-1)*$step;
        $page_now = $page; //Trang hiện tại

        ?>
        <div id="list_content_forum">
            <?php
                
                $sql_post = "SELECT posts.*,chude.chude FROM posts
                            LEFT JOIN chude ON posts.id_chude=chude.id_chude 
                            ORDER BY id_post DESC LIMIT $page_start, $step";
                $result_post = $con->query($sql_post);

                while ($row = $result_post->fetch_assoc()) :
                    $id_post = $row['id_post'];
                    $id_tv = $row["id_thanhvien"];
                    $title = $row['title'];
                    $description = trim($row['description_post']);
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
                                <textarea rows="3" cols="73" readonly><?php echo $description ?></textarea>
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
                endwhile;
            ?>
        </div>
        <div class="pagination" id="pagination_newpost">
            <ul>
                <?php if($page_now >1): ?>
                    <li><a onclick="pagi_page(<?=$page_now-1?>)" class="prev">&laquo;</a></li>
                <?php else: ?>
                    <li><a class="prev">&#9679;</a></li>
                <?php endif; ?>
                
                    <?php for($i=1; $i <= $page_quanti; $i++):?>
                        <li><a onclick="pagi_page(<?=$i?>)" id="num_pagi_<?=$i?>" class="number_pagination <?php if($page_now == $i) echo"active";?>"><?=$i?></a></li>
                    <?php endfor; ?>


                <?php if($page_now < $page_quanti): ?>
                    <li><a onclick="pagi_page(<?=$page_now+1?>)" class="next">&raquo;</a></li>
                <?php else: ?>
                    <li><a class="next">&#9679;</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php 
    }

    //Phân trang cho Q&A

?>