<?php
session_start();
header("Content-type:text/html;charset=utf-8");
function stop_hack($value)
{
    $pattern = "<\?|php";
    $back_list = explode("|", $pattern);
    foreach ($back_list as $hack) {
        if (@preg_match("/$hack/i", $value)) {
            die("呜呜呜，别日了别日了");
        }
    }
    return $value;
}

if (!isset($_GET['source'])) {
    show_source(__FILE__);
    die();
}
$a=$_GET['source'];
$sandbox = 'sandbox/'.sha1($_COOKIE['PHPSESSID']).'/';
highlight_string($sandbox);
if (!file_exists($sandbox)) {
    mkdir($sandbox);
}
file_put_contents($sandbox."index.php", stop_hack($a));
