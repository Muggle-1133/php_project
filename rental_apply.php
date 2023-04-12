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
    <link rel="stylesheet" type="text/css" href="css/calendar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font Awesome 링크 -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/inputCheck.js"></script>
    <script src="js/dropdown.js"></script>
    <script type="text/javascript">
        let day = null;
        let month = null;
        let year = null;
        function popupCalendar(){
            day = null;
            month = null;
            year = null;
            $("#calendarWin").load("calendar.php", function(){
                buildCalendar();
                $(".select").click(function(){
                    if(day == null) {
                        alert("대여할 날짜를 선택해주세요.");
                    }
                    else {
                        $("#selected-date").val(year+ "-" + ZeroFill(month, 2) + "-" + ZeroFill(day,2));
                        $("#apply-date").css("margin-left", "-32px");
                        $("#selected-date").css("display", "inline-block");
                        $("#calendarWin").empty().hide();
                    }
                })
                $(".cancel").click(function(){
                    if(confirm("취소 하시겠습니까?")) {
                        $("#calendarWin").empty().hide();
                    }
                })
            }).show();
        }
        $(document).ready(function(){
            dropDown();
        })
    </script>
</head>
<body>
    <nav>
        <?php include "header.php";?>
    </nav>
    <section class="formContainer">
        <form method="post" action="applyAction.php" class="apply-form" name="applyForm">
            <span id="title">노트북 대여 신청서</span>
            <ul class="list">
                <li class="item">
                    <div class="left">
                        <div class="name">예약자</div>
                    </div>
                    <div class="right">
                        <?=$username?>
                        <input type="hidden" name="username" value="<?=$username?>">
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">학번</div>
                    </div>
                    <div class="right">
                        <?=$usernum?>
                        <input type="hidden" name="usernum" value="<?=$usernum?>">
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">학년</div>
                    </div>
                    <div class="right">
                        <?=$usergrade?>
                        <input type="hidden" name="usergrade" value="<?=$usergrade?>">
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">대여 날짜</div>
                    </div>
                    <div class="right">
                        <input type="text" value="null" id="selected-date" name="selected-date">
                        <button id="apply-date" type="button" onclick="popupCalendar();"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>날짜선택</button>
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">대여 시간</div>
                    </div>
                    <div class="right">
                        <input type="time" name="start" id="start-time" value="09:00:00" min="09:00:00" max="17:30:00" required> ~
                        <input type="time" name="last" id="last-time" value="09:05:00" min="09:05:00" max="17:50:00" required>
                    </div>
                </li>
            </ul>
            <div class="form-btn">
                <button id="apply-btn" onclick="inputCheck()" type="button">신청</button>
                <button id="cancel-btn" onclick="cancelForm()" type="button">취소</button>
            </div>
        </form>
    </section>
    <div id="calendarWin"></div>
</body>
</html>