<?php
error_reporting(0);
//ini_set('display_errors', 1);


class waf{
	
	private $request_url;
	private $request_method;
	private $request_data;
	private $headers;
	private $raw;
	/*
	waf类
	*/

	
// 自动部署构造方法
function __construct(){
	//echo "class waf construct execute..</br>";   //debug code
	$this->write_access_log_probably();  //记录访问纪录    类似于日志
	$this->write_access_logs_detailed();  //纪录详细访问请求包  
	//echo "class waf construct execute..2</br>";	
	if($_SERVER['REQUEST_METHOD'] != 'POST' && $_SERVER['REQUEST_METHOD'] != 'GET'){
    write_attack_log("method");
	}
	//echo "class waf construct execute..3</br>";
	$this->request_url= $_SERVER['REQUEST_URI']; //获取url来进行检测


	$this->request_data = file_get_contents('php://input'); //获取post

	$this->headers =$this->get_all_headers(); //获取header  

	//echo "class waf construct execute half..</br>";


	$this->filter_attack_keyword($this->filter_invisible(urldecode($this->filter_0x25($this->request_url)))); //对URL进行检测，出现问题则拦截并记录
	$this->filter_attack_keyword($this->filter_invisible(urldecode($this->filter_0x25($this->request_data)))); //对POST的内容进行检测，出现问题拦截并记录
	//echo "class waf construct execute..4</br>";
	$this->detect_upload();

	$this->gloabel_attack_detect();
	
	
	//echo "class waf construct execute  success..</br>";



}

//全局输入检测  基本的url和post检测过了则对所有输入进行简单过滤

function gloabel_attack_detect(){
	
	foreach ($_GET as $key => $value) {
		$_GET[$key] = $this->filter_dangerous_words($value);
	}
	foreach ($_POST as $key => $value) {
		$_POST[$key] = $this->filter_dangerous_words($value);
	}
	foreach ($headers as $key => $value) {
		$this->filter_attack_keyword($this->filter_invisible(urldecode(filter_0x25($value)))); //对http请求头进行检测，出现问题拦截并记录
		$_SERVER[$key] = $this->filter_dangerous_words($value); //简单过滤
	}
}


//拦截所有的文件上传  并记录上传操作  并将上传文件保存至系统tmp文件夹下
function detect_upload(){
	/*foreach ($_FILES as $key => $value) {
        if($_FILES[$key]['size']>1){
			echo "upload file error";
			$this->write_attack_log("Upload");
			move_uploaded_file($_FILES[$key]["tmp_name"],'/tmp/uoloadfiles/'.$_FILES[$key]["name"]);
			exit(0);
		}
    }*/
	echo "";
}
	
	
//记录每次大概访问记录，类似日志，以便在详细记录中查找
function write_access_log_probably() { 
    $raw = date("Y/m/d H:i:s").'    '; 
    $raw .= $_SERVER['REQUEST_METHOD'].'     '.$_SERVER['REQUEST_URI'].'     '.$_SERVER['REMOTE_ADDR'].'    '; 
    $raw .= 'POST: '.file_get_contents('php://input')."\r\n"; 
	$ffff = fopen('/tmp/all_requests.txt', 'a'); //日志路径 
    #fwrite($ffff, $raw);  
    fclose($ffff);
}

//记录详细的访问头记录，包括GET POST http头   以获取通防waf未检测到的攻击payload
function write_access_logs_detailed(){
    $data = date("Y/m/d H:i:s")." -- "."\r\n".$this->get_http_raws()."\r\n\r\n";
    $ffff = fopen('/tmp/all_requests_detail.txt', 'a'); //日志路径 
    #fwrite($ffff, urldecode($data));  
    fclose($ffff);
}	
	
/*
获取http请求头并写入数组
*/
function get_all_headers() { 
    $headers = array(); 
 
    foreach($_SERVER as $key => $value) { 
        if(substr($key, 0, 5) === 'HTTP_') { 
            $headers[$key] = $value; 
        } 
    } 
 
    return $headers; 
}
/*
检测不可见字符造成的截断和绕过效果，注意网站请求带中文需要简单修改
*/
function filter_invisible($str){
    for($i=0;$i<strlen($str);$i++){
        $ascii = ord($str[$i]);
        if($ascii>126 || $ascii < 32){ //有中文这里要修改
            if(!in_array($ascii, array(9,10,13))){
                write_attack_log("interrupt");
            }else{
                $str = str_replace($ascii, " ", $str);
            }
        }
    }
    $str = str_replace(array("`","|",";",","), " ", $str);
    return $str;
    
}

/*
检测网站程序存在二次编码绕过漏洞造成的%25绕过，此处是循环将%25替换成%，直至不存在%25
*/
function filter_0x25($str){/*
    if(strpos($str,"%25") !== false){
        $str = str_replace("%25", "%", $str);
        return filter_0x25($str);
    }else{
        return $str;
    }*/
    return $str;
} 	


/*
攻击关键字检测，此处由于之前将特殊字符替换成空格，即使存在绕过特性也绕不过正则的\b
*/
function filter_attack_keyword($str){

    if(preg_match("/flag/i", $str)){
        $this->write_attack_log("GETFLAG");
    }
    if(preg_match("/php:/i", $str)){
        $this->write_attack_log("PHP");
    }
     if(preg_match("/http:/i", $str)){
        $this->write_attack_log("PHP");
    }

}

/*
简单将易出现问题的字符替换成中文
*/
function filter_dangerous_words($str){
    #$str = str_replace("'", "‘", $str);
    #$str = str_replace("\"", "“", $str);
    #$str = str_replace("<", "《", $str);
    #$str = str_replace(">", "》", $str);
    return $str;
}

function get_http_raws() { 
    $raw = ''; 

    $raw .= $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL']."\r\n"; 
     
    foreach($_SERVER as $key => $value) { 
        if(substr($key, 0, 5) === 'HTTP_') { 
            $key = substr($key, 5); 
            $key = str_replace('_', '-', $key); 
            $raw .= $key.': '.$value."\r\n"; 
        } 
    } 
    $raw .= "\r\n"; 
    $raw .= file_get_contents('php://input'); 
    return $raw; 
}


function write_attack_log($alert){
    $data = date("Y/m/d H:i:s")." -- [".$alert."]"."\r\n".$this->get_http_raws()."\r\n\r\n";
    $ffff = fopen('/tmp/attack_detected_log.txt', 'a'); 
    #fwrite($ffff, $data);  
    fclose($ffff);
    if($alert == 'GETFLAG'){
        echo 'CBCTF{'.md5(rand()).'}';; //如果请求带有flag关键字，显示假的flag
        exit(0);
    }
    
    
    if($alert == 'PHP'){
        echo '呜呜呜 别打了别打了'; 
        exit(0);
    }
    sleep(1);
    exit(0);
}

	
}
$waf = new waf();

?>
