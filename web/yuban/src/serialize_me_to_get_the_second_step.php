<?php
error_reporting(0);
highlight_file(__FILE__);

class a
{
    public $uname;
    public $password;
    public function __construct($uname,$password)
    {
        $this->uname=$uname;
        $this->password=$password;
    }
    public function __wakeup()
    {
            if($this->password==='whiskey')
            {
                include('flag.php');
                echo $flag;    
            }
            else
            {
                echo 'wrong password';
            }
        }
    }

function filter($string){
    return str_replace('host','wendell',$string);
}

$uname=$_GET[1];
$password=1;
$ser=filter(serialize(new a($uname,$password)));
$test=unserialize($ser);
?>