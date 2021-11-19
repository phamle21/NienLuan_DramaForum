
function kiemtraten(str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("error_user").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "check_username.php?u="+str, true);
    xmlhttp.send();
}

function checkdangky() {
    var tendangnhap = document.dangky.username.value.trim();
    var matkhau = document.dangky.password.value.trim();
    var rematkhau = document.dangky.repassword.value.trim();
    var email = document.dangky.email.value.trim();
    var birthday = document.dangky.birthday.value.trim();
    var name = document.dangky.fullname.value.trim();

    var status = true;
    var tendangnhap1 = /^[A-Za-z][A-Za-z0-9]{4,14}$/;
    var matkhau1 = /^[A-Za-z0-9]{6,15}$/;


    if (tendangnhap.length < 1)
    {
        document.getElementById('error_user').innerHTML = "Nhập tên đăng nhập của bạn";
        status = false;
    } 
    else if (tendangnhap1.test(tendangnhap) == false) 
    {
        document.getElementById('error_user').innerHTML = "Nhập bắt đầu phải là chữ cái, dài 5-15 ký tự";
        status = false;
        
    }
    else 
    {
        document.getElementById('error_user').innerHTML = "";
    } 
    
    if (matkhau.length < 1)
    {
        document.getElementById("error_pass").innerHTML = "Nhập mật khẩu của bạn";
        status = false;
    } 
    else if (matkhau1.test(matkhau) == false)
    {
        document.getElementById("error_pass").innerHTML = "Sử dụng 6-15 ký tự cho mật khẩu, không dùng ký tự đặt biệt";
        status = false;
    }
    else 
    {
        document.getElementById("error_pass").innerHTML = "";
    }
    
    if (rematkhau != matkhau || rematkhau.length < 1)
    {
        document.getElementById("error_repass").innerHTML = "Mật khẩu chưa khớp";
        status = false;
    } 
    else 
    {
        document.getElementById("error_repass").innerHTML = "";
    }

    if(email.length <1){
        document.getElementById("error_email").innerHTML = "Nhập email của bạn!";
        status = false;
    }else{
        document.getElementById("error_email").innerHTML = "";
    }

    if(birthday.length <1){
        document.getElementById("error_birthday").innerHTML = "Nhập ngày sinh của bạn!";
        status = false;
    }else{
        document.getElementById("error_birthday").innerHTML = "";
    }

    if(name.length <1){
        document.getElementById("error_name").innerHTML = "Nhập tên của bạn!";
        document.getElementById("error_name").style.color = "red";
        document.getElementById("error_name").style.fontStyle = "normal";
        status = false;
    }else{
        document.getElementById("error_name").innerHTML = "";
    }
    return status;
}

//Countdown
var count=30;
var counter=setInterval(timer, 1000); 
function timer()
{
    document.getElementById('countdown').innerHTML = count;
    count=count-1;
    if (count <= 0)
    {
        clearInterval(counter);
        document.getElementById('hidden').style.display = " ";
        return;
    }

}