let today = new Date();     //오늘 날짜 내 컴퓨터 로컬을 기준으로 today에 Date 객체를 넣어줌
let date = new Date();      //today의 Date를 세어주는 역할

function ZeroFill(number, length){
    number = number + "";
    var num_length = number.length;
    for(var i=0; i<length - num_length; i++){
        number = "0"+number;
    }
    return number;
}

function prevCalendar() {   //이전 달
// 이전 달을 today 변수에 저장하고 달력에 today를 넣어줌
//today.getFullYear() : 현재 년도   today.getMonth() : 월  today.getDate() : 일 
//getMonth()는 현재 달을 받아 오므로 이전달을 출력하려면 -1을 해줘야함
    today = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
    buildCalendar(); //달력 cell 만들어 출력 
}

function nextCalendar() {   //다음 달
// 다음 달을 today 변수에 저장하고 달력에 today를 넣어줌
//today.getFullYear() : 현재 년도   today.getMonth() : 월  today.getDate() : 일 
//getMonth()는 현재 달을 받아 오므로 다음달을 출력하려면 +1을 해줘야함
    today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
    buildCalendar();//달력 cell 만들어 출력
}
function buildCalendar(){   //현재 달 달력 만들기
    let doMonth = new Date(today.getFullYear(),today.getMonth(),1);
    let todayVal = null;
    let selectedDate = new Date($("#selected-date").val());
    //이번 달의 첫째 날,
    //new를 쓰면 이번달의 로컬 월을 정확하게 받아온다.     
    //new를 쓰지 않았을때는 이번달을 받아오려면 +1을 해줘야한다. getMonth()는 0~11을 반환하기 때문
    let lastDate = new Date(today.getFullYear(),today.getMonth()+1,0);
    //이번 달의 마지막 날
    //new를 써주면 정확한 월을 가져옴, getMonth()+1을 해주면 다음달로 넘어가는데
    //day를 1부터 시작하는게 아니라 0부터 시작하기 때문에 
    //다음달 시작일(1일)은 못가져오고 1 전인 0, 즉 전달 마지막일 을 가져오게 된다
    let tbCalendar = document.getElementById("calendar");
    //날짜를 찍을 테이블 변수 만듬, 일 까지 다 찍힘
    let tbCalendarYM = document.getElementById("tbCalendarYM");
    //테이블에 정확한 날짜 찍는 변수
    //innerHTML : js 언어를 HTML의 권장 표준 언어로 바꾼다
    //new를 찍지 않아서 month는 +1을 더해줘야 한다. 
        tbCalendarYM.innerHTML = today.getFullYear() + "년 " + (today.getMonth() + 1) + "월"; 

        /*while은 이번달이 끝나면 다음달로 넘겨주는 역할*/
    while (tbCalendar.rows.length > 2) {
        //열을 지워줌
        //기본 열 크기는 body 부분에서 2로 고정되어 있다.
        tbCalendar.deleteRow(tbCalendar.rows.length-1);
        //테이블의 tr 갯수 만큼의 열 묶음은 -1칸 해줘야지 
        //30일 이후로 담을달에 순서대로 열이 계속 이어진다.
    }
    let row = null;
    row = tbCalendar.insertRow();
    $(row).addClass("weekRow");
    //테이블에 새로운 열 삽입//즉, 초기화
    let cnt = 0;// count, 셀의 갯수를 세어주는 역할
    // 1일이 시작되는 칸을 맞추어 줌
    for (i=0; i<doMonth.getDay(); i++) {
        /*이번달의 day만큼 돌림*/
        
        cell = row.insertCell();//열 한칸한칸 계속 만들어주는 역할
        cnt = cnt + 1;//열의 갯수를 계속 다음으로 위치하게 해주는 역할
    }
    /*달력 출력*/
    let selectedDateCell = null;
    for (i=1; i<=lastDate.getDate(); i++) { 
        //1일부터 마지막 일까지 돌림
        cell = row.insertCell();//열 한칸한칸 계속 만들어주는 역할
        cell.innerHTML = i;//셀을 1부터 마지막 day까지 HTML 문법에 넣어줌
        cell.setAttribute("data-num", i);
        cell.setAttribute("data-month", doMonth.getMonth()+1);
        cell.setAttribute("data-year", doMonth.getFullYear());
        cnt = cnt + 1;//열의 갯수를 계속 다음으로 위치하게 해주는 역할

        let selDate = new Date(doMonth.getFullYear(), doMonth.getMonth(), i);
        let todayData = new Date();
        todayData.setHours(0);
        todayData.setMinutes(0);
        todayData.setSeconds(0);
        todayData.setMilliseconds(0);

        if(todayData - selDate > 0) {
            $(cell).css("text-decoration", "line-through");
        }
        else if (cnt % 7 == 1) {
            $(cell).css("text-decoration", "line-through");
        }
        else if (cnt % 7 == 0) {
            $(cell).css("text-decoration", "line-through");
        }
        else {
            cell.style.cursor = "pointer";
        }

        if(doMonth.getFullYear() === selectedDate.getFullYear() && 
            doMonth.getMonth() === selectedDate.getMonth() && 
            i === selectedDate.getDate()) {
                selectedDateCell = cell;
            }

        if (cnt % 7 == 1) {/*일요일 계산*/
            //1주일이 7일 이므로 일요일 구하기
            //월화수목금토일을 7로 나눴을때 나머지가 1이면 cnt가 1번째에 위치함을 의미한다
            cell.innerHTML = "<font color=#FE3872>" + i
            //1번째의 cell에만 색칠
            cell.className = "sun";
        }    
        if (cnt%7 == 0){/* 1주일이 7일 이므로 토요일 구하기*/
            //월화수목금토일을 7로 나눴을때 나머지가 0이면 cnt가 7번째에 위치함을 의미한다
            cell.innerHTML = "<font color=#6FAEFC>" + i
            //7번째의 cell에만 색칠
            cell.className = "sat";
            row = calendar.insertRow();
            $(row).addClass("weekRow");
            //토요일 다음에 올 셀을 추가
        }
        /*오늘의 날짜에 노란색 칠하기*/
        if (today.getFullYear() == date.getFullYear() && today.getMonth() == date.getMonth() && i == date.getDate()) {
            //달력에 있는 년,달과 내 컴퓨터의 로컬 년,달이 같고, 일이 오늘의 일과 같으면
            todayVal = today.getFullYear() + "년" + (date.getMonth()+1) + "월" + date.getDate() + "일";
            cell.setAttribute("data-today", todayVal);
            cell.bgColor = "#FAF58C";//셀의 배경색을 노랑으로
        }
    }
    $("#calendar .weekRow").children("td").not("td.sun, td.sat").click(function(e) {
        let selDate = new Date($(this).data("year"), $(this).data("month")-1, $(this).data("num"));
        let todayData = new Date();
        todayData.setHours(0);
        todayData.setMinutes(0);
        todayData.setSeconds(0);
        todayData.setMilliseconds(0);

        if(todayData - selDate <= 0){
            $("td").not($(this)).css("background-color", "transparent");
            $(this).css("background-color", "rgb(253, 203, 111)");
            
            day = $(this).data("num");
            month = $(this).data("month");
            year = $(this).data("year");
        }
    })
    $(selectedDateCell).click();

}
