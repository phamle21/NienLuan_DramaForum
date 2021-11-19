$('#btn_search').on('click',function(){
    document.getElementById('input_search').style.display = "inline";
});

$(window).on('click',function(){
    document.getElementById('input_search').style.display = "inline";
});

function check_search(){
    if($('#input_search').val() == ''){
        // $('#input_search').attr("placeholder","Hãy nhập gì đó để tìm kiếm!");
        return false;
    }else{
        return true;
    }
}


function clickDrop() {
    $(".content_dropdown").toggle("show");
}

// $('#body_content').css({"background-color":"red"});

function pagi_page(page){ 
    $.ajax({
        type: "post",
        url: './control/xuly_pagination.php',
        data: {
            page: page,
            pagi_newpost: true,
        },
        success: function(result) {
            $('#forum_newpost').html(result);
        }
    });
}
$(document) .ready (function(){
    var pagenow = 1;
    $.ajax({
        type: "post",
        url: './control/xuly_pagination.php',
        data: {
            page: pagenow,
            pagi_newpost: true,
        },
        success: function(result) {
            $('#forum_newpost').html(result);
        }
    });
});