function register(){
    if(!window.confirm("この内容で登録しますか？")){
        return false;
    }else{
        return true;
    }
};

function edit_confirm(){
    if(!window.confirm("この内容で編集しますか？")){
        return false;
    }else{
        return true;
    }
};

function logout(){
    if(!window.confirm("ログアウトしますか？")){
        return false;
    }else{
        return true;
    }
};

function delete_confirm(){
    if(!window.confirm("ユーザ情報が全て失われます。")){
        return false;
    }else{
        return true;
    }
};
function admin_delete_confirm(){
    if(!window.confirm("削除してよろしいですか？")){
        return false;
    }else{
        return true;
    }
};
function unregister_confirm(){
    if(!window.confirm("解除してよろしいですか？")){
        return false;
    }else{
        return true;
    }
};

$(function(){
    $('.overlay').on('click', function () {
        $(".sinein-pop").hide();
        $(".overlay").hide();
        $(".popup-window").removeClass("fade-up");
    });
    $('.pop,.ham-sign').on('click', function () {
        $(".popup-window").addClass("fade-up");
        $(".sinein-pop").show();
        $(".overlay").show();
    });

$(window).resize(modalResize);
function modalResize(){
 
    var w = $(window).width();
    var h = $(window).height();
 
    var cw = $(".popup-window").outerWidth();
    var ch = $(".popup-window").outerHeight();
 
    //取得した値をcssに追加する
    $(".popup-window").css({
        "left": ((w - cw)/2) + "px",
        "top": ((h - ch)/2) + "px"
    });
}

});

