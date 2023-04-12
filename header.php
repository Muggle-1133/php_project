
        <div class="navbar">
            <div class="logo">
                <a href="https://www.ync.ac.kr/kor/intro.do" target="_blank"><img src="img/logo.png">
                </a>
                <span class="logo-text">Cybersecurity School</span>
            </div>
            <div class="btn">
                <button class="home-btn">
                    <a href="index.php">홈</a>
                </button>
                <button class="notice-btn">
                    <a href="notice.php">노트북 대여 방침</a>
                </button>
<?php
    if(!$usernum) {
?>
                <button class="login-btn">
                    <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>
                    로그인</a>
                </button>
<?php
    }
    else {
?>
                <div class="dropdown">
                    <button class="dropdown-btn">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <div class="dropdown-submenu">
                            <a href="myPage.php"><i class="fa fa-user" aria-hidden="true"></i>마이페이지</a>
                            <a href="myList.php"><i class="fa fa-list-ul" aria-hidden="true"></i>신청내역</a>
                            <a href="logoutAction.php"><i class="fa fa-sign-out" aria-hidden="true"></i>로그아웃</a>
                        </div>
                    </button>
                </div>
<?php
    }
?>
            </div>
        </div>
