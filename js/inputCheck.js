function inputCheck() {
    let date = document.querySelector("#selected-date").value;
    let startTime = document.querySelector("#start-time").value;
    let lastTime = document.querySelector("#last-time").value;
    let form = document.applyForm;

    if(date == "null") {
        alert("대여할 날짜를 선택하세요.");
        document.getElementById('selected-date').focus();
    }
    else if(startTime == "") {
        alert("대여 시작 시간을 선택하세요.");
        document.getElementById('start-time').focus();
    }
    else if(lastTime == "") {
        alert("대여를 마칠 시간을 선택하세요.");
        document.getElementById('last-time').focus();
    }
    else if(startTime < "09:00" | startTime > "17:30") {
        alert("대여 시작 시간은 오전 09시부터 오후 17시 30분까지 가능합니다.");
    }
    else if(lastTime < "09:05" | lastTime > "17:55") {
        alert("대여 마감 시간은 오전 09시 05분부터 오후 17시 50분까지 입니다.");
    }
    else if(startTime > lastTime) {
        alert("대여가능 시간을 다시 확인해주세요.");
    }
    else {
        form.submit();
    }
}

function cancelForm() {
    if (!confirm("취소하시겠습니까?")) {
    } 
    else {
        let date = document.querySelector("#selected-date");
        let startTime = document.querySelector("#start-time");
        let lastTime = document.querySelector("#last-time");
    
        date.value = "null";
        $("#apply-date").css("display", "block");
        $("#selected-date").css("display", "none");
        startTime.value = "09:00:00";
        lastTime.value = "09:05:00";
        return;
    }
}