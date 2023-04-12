<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome 링크 -->
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/loginCheck.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        let key = getCookie("key");
        $("#userID").val(key);
        
        function setCookie(cookieName, value, exdays){
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
            document.cookie = cookieName + "=" + cookieValue;
        }
        
        function deleteCookie(cookieName){
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() - 1);
            document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
        }
        
        function getCookie(cookieName) {
            cookieName = cookieName + '=';
            var cookieData = document.cookie;
            var start = cookieData.indexOf(cookieName);
            var cookieValue = '';
            if(start != -1){
                start += cookieName.length;
                var end = cookieData.indexOf(';', start);
                if(end == -1)end = cookieData.length;
                cookieValue = cookieData.substring(start, end);
            }
            return unescape(cookieValue);
        }
        
        if($("#userID").val() != ""){ 
            // 이전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
            $("#chk-id").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
        }
        
        $("#chk-id").change(function(){ // 체크박스에 변화가 있다면,
            if($("#chk-id").is(":checked")){ // ID 저장하기 체크했을 때,
                setCookie("key", $("#userID").val(), 7); // 7일 동안 쿠키 보관
            }else{ // ID 저장하기 체크 해제 시,
                deleteCookie("key");
            }
        });
        
        // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
        $("#userID").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
            if($("#chk-id").is(":checked")){ // ID 저장하기를 체크한 상태라면,
                setCookie("key", $("#userID").val(), 7); // 7일 동안 쿠키 보관
            }
        });
    })
    </script>
</head>
<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="https://www.ync.ac.kr/kor/intro.do" target="_blank"><img src="img/logo.png">
                </a>
                <span class="logo-text">Cybersecurity School</span>
            </div>
            <div class="btn">
                <button class="home-btn">
                    <a href="index.php">홈</a>
                </button>
                <button class="notice-btn">
                    <a href="notice.php">노트북 대여 방침</a>
                </button>
            </div>
        </div>
    </nav>
    <section>
        <form action="loginAction.php" method="post" class="login-form" name="login_form">
            <span class="login-text">로그인</span>
            <span class="info-text">
                ＊yportal ID와 PASSWORD를 입력해주세요
            </span>
            <input type="text" id="userID" name="userID" placeholder="아이디" maxlength="12" onkeyup="enterkey();">
            <input type="password" id="userPW" name="userPW" placeholder="패스워드" maxlength="12" onkeyup="enterkey();">
            <input type="checkbox" name="save-id" id="chk-id">
            <label for="chk-id">아이디 저장</label>
            <input id="login-submit-btn" type="button" onclick="loginCheck(); loading();" value="로그인">
            </input>
        </form>
    </section>
    <div class="loading">
        <p>처리중입니다...</p>
        <span></span>
        <span></span>
        <span></span>
    </div>
</body>
</html>