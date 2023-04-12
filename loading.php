<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="css/loading.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        function loading() {
            $('.loading').css({"display":"block"});
        }
        function closeLoading() {
            $('.loading').hide();
            $('.loading').remove();
        }
        $(document).ready(function(){
            loading();	
            setTimeout("closeLoading()", 9000);
        })
    </script>
</head>
<body>
    <div class="loading">
        <p>처리중입니다...</p>
        <span></span>
        <span></span>
        <span></span>
    </div>
</body>
</html>