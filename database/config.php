<?php
     define('DB_SERVER','localhost');
     define('DB_USER','root');
     define('DB_PASS' ,'');
     define('DB_NAME', 'diendan');
 
     $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
     $con->set_charset("utf8");
 
     // Check connection
     if (mysqli_connect_errno()){
          echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
          exit;
     }
     
     function alert($content){
          echo "<script type='text/javascript'>alert('$content');</script>";
     }
?>