<?php
   //goi thu vien
        include '../PHPMailer/class.smtp.php';
        include '../PHPMailer/class.phpmailer.php'; 
        $nFrom = "Diễn đàn Drama";    //mail duoc gui tu dau, thuong de ten cong ty ban
        $mFrom = 'dramaconfirmple@gmail.com';  //dia chi email cua ban 
        $mPass = 'Le210420';       //mat khau email cua ban
        $nTo = 'Quản trị viên'; //Ten nguoi nhan
        $mTo =  "$to_email";   //dia chi nhan mail
        $mail  = new PHPMailer();
        $body  = "$message";   // Noi dung email
        $title = "$subject";   //Tieu de gui mail
        $mail->IsSMTP();             
        $mail->CharSet  = "utf-8";
        $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;    // enable SMTP authentication
        $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";    // sever gui mail.
        $mail->Port       = 465;         // cong gui mail de nguyen
   // xong phan cau hinh bat dau phan gui mail
        $mail->Username   = $mFrom;  // khai bao dia chi email
        $mail->Password   = $mPass;              // khai bao mat khau
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo('dramaconfirmple@gmail.com', 'Admin'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->Subject    = $title;// tieu de email 
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
?>