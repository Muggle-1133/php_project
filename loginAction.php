<?php
    if($_REQUEST['userID']!=NULL && $_REQUEST['userPW']!=NULL) {
        $id  = $_REQUEST['userID'];
        $pwd = $_REQUEST['userPW'];

        exec("python login_auth.py"." ".$id." ".$pwd, $output);

        if($output[2]=="alert") {
            $message = iconv('EUC-KR','UTF-8//IGNORE', $output[1]);
            //$output[0] = iconv('EUC-KR','UTF-8//IGNORE',$output[0]);
        }
        else {
            for($i=1; $i<=6; $i++) {
                $output[$i] = iconv('EUC-KR','UTF-8//IGNORE',$output[$i]);
            }
        }
        
        // $output[1] = iconv('EUC-KR','UTF-8//IGNORE',$output[1]);
        // $output[2] = iconv('EUC-KR','UTF-8//IGNORE',$output[2]);
        // $output[3] = iconv('EUC-KR','UTF-8//IGNORE',$output[3]);
        // $output[4] = iconv('EUC-KR','UTF-8//IGNORE',$output[4]);
        // $output[5] = iconv('EUC-KR','UTF-8//IGNORE',$output[5]);
        

        if(count($output) == 2) {
            // 로그인 실패시
            echo ("
                <script> 
                    window.alert('$message')
                    history.go(-1)
                </script>
            ");
        }
        else if(count($output) == 6 && $output[3] !== "사이버보안학과") {
            echo ("
                <script>
                    window.alert(이 사이트는 사이버보안학과 학생만 이용가능합니다.)
                    history.go(-1)
                </script>
            ");
        }
        else if(count($output) == 6 && $output[5]!=="재학") {
            echo ("
                <script>
                    window.alert('현재 재학중인 학생만 이용가능합니다.')
                    history.go(-1)
                </script>
            ");
        }
        else {
            // 로그인 성공
            session_start();
            $_SESSION['num'] = $output[2];
            $_SESSION['name'] = $output[4];
            $_SESSION['grade'] = $output[6]."학년";

            echo ("
                <script>
                    location.href = 'index.php';
                </script>
            ");
        }
    }

?>
