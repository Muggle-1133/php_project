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
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>소프트웨어컨텐츠 노트북 대여 사이트</title>
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/mypage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome 링크 -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropdown-btn').mouseover(function(){
                $('.dropdown-btn').css({"color":"#222"})
            })
            $('.dropdown-btn').click(function(){
                $('.dropdown-submenu').toggle()
            })
        })
    </script>
</head>
<body>
    <nav>
        <?php include "header.php";?>
    </nav>
    <section>
        <form class="info" name="myForm">
            <div class="profile">
                <img src="img/user-132-256.png">
            </div>
            <ul class="list">
                <li class="item">
                    <div class="left">
                        <i class="fa fa-id-badge" aria-hidden="true" style="font-size: 28px; margin-right: 5px;"></i>
                        <div class="name">이름</div>
                    </div>
                    <div class="right">
                        <?=$username?>
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <div class="name">학번</div>
                    </div>
                    <div class="right">
                        <?=$usernum?>
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <div class="name">학년</div>
                    </div>
                    <div class="right">
                        <?=$usergrade?>
                    </div>
                </li>
            </ul>
        </form>
    </section>
</body>
</html>