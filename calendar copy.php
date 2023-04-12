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

    <script type="text/javascript">
        let day = null;
        let month = null;
        let year = null;
        
        $(document).ready(function(){
            buildCalendar();
            $(document).on("click", "#select", function(){
                if(day == null) {
                    alert("대여할 날짜를 선택해주세요.");
                    history.go(-1);
                }
                else {
                    $(opener.document).find("input[type=text]").val(year+ "년" + month + "월" + day + "일");
                    $(opener.document).find("#apply-date").css("margin-left", "-32px");
                    $(opener.document).find("#selected-date").css("display", "inline-block");
                    window.close();
                }
            })
            $(document).on("click", "#cancel", function(){
                if(confirm("취소 하시겠습니까?")) {
                    buildCalendar();
                }
            })
        })
    </script>
</head>
<body>
    <section>
        <div class="container">
            <table id="calendar">
                <tr>
                    <td><label onclick="prevCalendar()"><</label></td>
                    <td  id="tbCalendarYM" colspan="5">
                    yyyy년 m월</td>
                    <td><label onclick="nextCalendar()">>
                        
                    </label></td>
                </tr>
                <tr class="day">
                    <td style=" color: #FE3872">일</td>
                    <td>월</td>
                    <td>화</td>
                    <td>수</td>
                    <td>목</td>
                    <td>금</td>
                    <td style="color: #6FAEFC">토</td>
                </tr> 
            </table>
        </div>
        <div class="calendar-btn">
            <button type="button" id="select">
                선택
            </button>
            <button type="button" id="cancel">
                취소
            </button>
        </div>
    </section>
</body>
</html>