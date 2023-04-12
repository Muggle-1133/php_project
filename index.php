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
    <title>사이버보안 노트북 대여 사이트</title>
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome 링크 -->
    <script src="js/jquery-3.6.0.min.js"></script>
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
        <div class="title">
            <p>
                노트북 대여 사이트
            </p>
            <i class="fa fa-laptop" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="state">
                <a href="rental_state.php">
                    <span>노트북 대여 현황</span>
                    <img src="img/web.png">
                </a>
            </div>
            <div class="apply">
                <a href="rental_apply.php">
                    <span>노트북 대여 신청</span>
                    <img src="img/submit.png">
                </a>
            </div>
        </div>
    </section>
</body>
</html>