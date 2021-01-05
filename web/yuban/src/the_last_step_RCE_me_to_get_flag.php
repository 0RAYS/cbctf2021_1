<?php
    error_reporting(0);
    echo "try to read source ?action=";
    $action = $_GET['action'];
        if (isset($action)) {
            if (preg_match("/base|data|input|zip|zlib|flag/i", $action)) {
                echo "<script>alert('Yang_99 said you are A Hacker!!!')</script>";
            } else {
                include("$action");
            }
        }
    $hint="h1nt.php";
?>

