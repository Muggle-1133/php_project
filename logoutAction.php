<?php
    session_start();
    unset($_SESSION['num']);
    unset($_SESSION['name']);
    unset($_SESSION['grade']);

    echo ("
        <script>
            location.href = 'index.php';
        </script>
    ");
?>