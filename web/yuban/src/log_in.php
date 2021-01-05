<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(0);
$username = $_POST['logname'];
$password = $_POST['logpass'];
    if ($username == 'admin456' && $password == 'Cyberpunk2077') {
        session_start();
        $_SESSION['USER'] = true;
        echo 'logsuccess! and wait 3 sec';
        header('Refresh: 3; url=./serialize/index.php');
    } else {
        die('No! 密码错了,希望师傅不要爆破,不是爆破题');
    }
