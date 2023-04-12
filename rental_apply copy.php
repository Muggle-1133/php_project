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
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/inputCheck.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropdown-btn').mouseover(function(){
                $('.dropdown-btn').css({"color":"#222"})
            })
            $('.dropdown-btn').click(function(){
                $('.dropdown-submenu').toggle()
            })

            let today = new Date().toISOString().substr(0, 10);
            document.querySelector("#apply-date").value = today;
        })
    </script>
</head>
<body>
    <nav>
        <?php include "header.php";?>
    </nav>
    <section>
        <form method="post" action="applyAction.php" class="apply-form" name="applyForm">
            <span id="title">노트북 대여 신청서</span>
            <ul class="list">
                <li class="item">
                    <div class="left">
                        <div class="name">예약자</div>
                    </div>
                    <div class="right">
                        <?=$username?>
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">학번</div>
                    </div>
                    <div class="right">
                        <?=$usernum?>
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">학년</div>
                    </div>
                    <div class="right">
                        <?=$usergrade?>
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">대여 날짜</div>
                    </div>
                    <div class="right">
                        <input type="date" name="date" id="apply-date">
                    </div>
                </li>
                <li class="item">
                    <div class="left">
                        <div class="name">대여 시간</div>
                    </div>
                    <div class="right">
                        <input type="time" name="start" id="start-time"> ~
                        <input type="time" name="last" id="last-time">
                    </div>
                </li>
            </ul>
            <div class="form-btn">
                <button id="apply-btn" onclick="inputCheck()" type="button">신청</button>
                <button id="cancel-btn" onclick="cancelForm()" type="button">취소</button>
            </div>
        </form>
    </section>
</body>
</html>