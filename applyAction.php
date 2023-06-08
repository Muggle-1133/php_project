<?php
    // $bookerName = $_POST['username'];
    // $bookerNum = $_POST['usernum'];
    // $bookerGrade = $_POST['usergrade'];
    // $date = $_POST['selected-date'];
    // $startTime = $_POST['start'];
    // $lastTime = $_POST['last'];

    $con = mysqli_connect("localhost", "id", "password", "part3");
    $sql = "insert into memberc(id, name, gender, post_num, address, tel, age)";
    $sql .= "values ('yeongji', '이영지', 'W', '1201', '서울시 강남구', '235-9850', 25);";

    $result = mysqli_query($con, $sql);
    $i = var_dump($result);
    echo "$i";
    mysqli_close($con);
?>
