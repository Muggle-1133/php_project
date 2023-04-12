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
            <button type="button" class="select">
                선택
            </button>
            <button type="button" class="cancel">
                취소
            </button>
        </div>
    </section>
