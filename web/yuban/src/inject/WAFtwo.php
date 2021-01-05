<?php
function stop_hack($value)
{
    $pattern = "insert|into|load_file|outfile|dumpfile|sub|hex|file_put_contents|fwrite|curl|system|eval|innodb|sleep";
    $back_list = explode("|", $pattern);
    foreach ($back_list as $hack) {
        if (preg_match("/$hack/i", $value)) {
            die("dlddddhm");
        }
    }
    return $value;
}
