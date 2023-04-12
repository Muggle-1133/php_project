function loginCheck(){
    let id = $("input[type=text]").val();
    let pwd = $("input[type=password]").val();
    let form = document.login_form;
    if(id == "") {
        alert("아이디를 입력하세요.");
    }
    else if(pwd == "") {
        alert("패스워드를 입력하세요.");
    }
    else {
        form.submit();
    }
}

function enterkey() {
    if(window.event.keyCode == 13) {
        loginCheck();
        loading();
    }
}
function loading() {
    $.ajax({
        url: "loginAction.php?userID="+$("#userID").val()+"&userPW="+$("input[type=password]").val()
        ,type: "POST"
        ,dataType: "text"
        ,success: function(data){
        }
        ,beforeSend:function() {
            $('.loading').css({"display" : "block"});
            $('section').css({"display" : "none"});
        }
        ,complete: function() {
            $('.loading').css({"display" : "none"});
            $('.loading').remove();
            $('section').css({"display" : "flex"});
        }
        ,error: function(error){
            alert("error : " + error);
        }
    });
}