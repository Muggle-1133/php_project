<?php
    session_start();
    if(isset($_SESSION['num'])) {
        $usernum = $_SESSION['num'];
    }
    else {
        $usernum = "";
    }
    if(isset($_SESSION['name'])) {
        $username = $_SESSION['name'];
    }
    else {
        $username = "";
    }
    if(isset($_SESSION['grade'])) {
        $usergrade = $_SESSION['grade'];
    }
    else {
        $usergrade = "";
    }

    if($username == "" && $usernum == "") {
        echo ("
            <script>
                window.alert('로그인시 이용 가능합니다.');
                location.href = 'login.php';
            </script>
        ");
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>소프트웨어컨텐츠 노트북 대여 신청</title>
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/apply.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome 링크 -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/inputCheck.js"></script>
    <script src="js/dropdown.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            dropDown();
        })
    </script>
</head>
<body>
    <nav>
        <?php include "header.php";?>
    </nav>
    <section>
        <span class="name">
            <?=$username?><?=$usernum?>님의 대여 신청 내역
        </span>
        <div class="container">
            <table id="apply-list">
                <tr>
                    <th>날짜</th>
                    <th>시간</th>
                    <th>노트북</th>
                </tr>
                <?php
                    // 데이터베이스에서 로그인한 username으로 저장된 레코드를 들고와서
                    // 저장된 레코드 개수 만큼 for문을 사용해서 보여줌 
                ?>
            </table>
        </div>
    </section> 
</body>
</html>