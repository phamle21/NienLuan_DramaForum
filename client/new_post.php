<?php
    require_once('../database/config.php');
    
    include('top_master.php');
?>

<!-- NEW POST -->
<link rel="stylesheet" href="css/new_post.css">

<div class="new_post">
    <h1 id="newpost_h1">Bài viết mới</h1>
    <form action="xuly_newpost.php" enctype="multipart/form-data" method="post" class="form">
        <div class="title_newpost">
            <textarea type="text" name="title" placeholder="Tiêu đề bài viết"></textarea>
        </div>

        <div class="description">
            <label for="" style="font-weight: bold;">Mô tả ngắn: </label>
            <textarea type="text" name="description" placeholder="Mô tả ngắn..."></textarea>
        </div>

        <div class="img_description">
            <label for="" style="font-weight: bold;">Ảnh mô tả: </label>
            <input type="file" name="img_des" accept="image/gif, image/jpg, image/jpeg, image/png" onchange="readURL(this);">
            <div class="demo_file">
                <img src="" id="demo-img" alt="Xem trước"/>
            </div>
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#demo-img')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </div>
                <style>
                    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused){
                        resize: vertical;
                        height: 250px;
                    }
                </style>
        <label for="" style="font-weight: bold;">Nội dung bài viết: </label>
        <div class="content_newpost" >
            <textarea style="height: 1000px; " name="content" id="editor"></textarea>
        </div>

        <!-- <label for="" style="font-weight: bold; ">Hastag: </label>
        <div class="hashtag">
            <textarea name="hashtag" id="" placeholder="Nhập hastag để người dùng có thể dễ dàng tìm kiếm bài viết của bạn. Mỗi hastag cách nhau 1 khoảng trắng... 
VD: newbie hello"></textarea>
        </div> -->

        <div class="btn_submit">
            <button class="btn" type="submit">Đăng bài</button>
        </div>
        
    </form>
</div>

<script src="js/jquery-3.6.0.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="/ckfinder/ckfinder.js"></script>
<script>

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            }
        } )
        .catch( error => {
            console.error( error );
        } );
    
</script>

<?php
    include('bot_master.php');  
?>