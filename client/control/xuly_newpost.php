<?php

    include('database/config.php');

    if(!isset($_COOKIE['login_tv'])){
        echo "Bạn chưa đăng nhập <br>";
    }
    $id_tv = $_COOKIE['login_tv'];

    $title = $_POST['title'];
    $description = trim($_POST['description']);
    $content = $_POST['content'];
    $img_des = "";
    if ($_FILES['img_des']['name'] != NULL) {
        
        $path = "./img/img_post/"; // Ảnh sẽ lưu vào thư mục images
        $tmp_name = $_FILES['img_des']['tmp_name'];
        $name = $id_tv."-". time()."-". $_FILES['img_des']['name'];

        // Upload ảnh vào thư mục images
        move_uploaded_file($tmp_name, $path . $name);

        $img_des = $path.$name;
    } else {
        alert("Bạn chưa chọn ảnh mô tả");
    }  

    $sql = "INSERT INTO posts (id_thanhvien, title, content, description_post, img_description) 
            VALUES ('$id_tv', '$title', '$content', '$description', '$img_des' )";

    if($con->query($sql) === TRUE){
        header('Location: ./index.php');
    }else{
        echo "Lỗi đăng bài...<br>";
        echo "Error: "  . "<br>" . $con->error;
        echo "<br>".$content;
    }
    $con->close(); 
?>