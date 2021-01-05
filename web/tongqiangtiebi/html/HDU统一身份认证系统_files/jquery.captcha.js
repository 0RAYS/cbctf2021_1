;(function( $ ){
	$.fn.captcha = function(options){
			
		
	var defaults = {  
	   borderColor: "",  
	   captchaDir: "comm/plugin/captcha",  
	   url: "captcha",  
	   formId: "loginForm",  
	   text: "<font size='2'>请拖动 <span>scissors</span> 进入圆圈内.</font>",
	   items: Array("电视","飞机","狗","花",
			   "猫","苹果","手机","树","水杯","太阳","月亮","桌子","车子","足球","书包",
			   "香蕉","鱼","旗子","椅子") 
	  },list = {
	  		'电视':'tv'
	  		,'飞机' : 'plane'
	  		,'狗' : 'dog'
	  		,'花' : 'flower'
	  		,'猫' : 'cat'
	  		,'苹果' : 'apple'
	  		,'手机' : 'mobile'
	  		, '树' : 'tree'
	  		, '水杯' : 'cup'
	  		, '太阳' : 'sun'
	  		, '月亮' : 'moon'
	  		, '桌子' : 'desk'
	  		, '车子' : 'bike'
	  		, '足球' : 'football'
	  		, '书包' : 'bag'
	  		, '香蕉' : 'banana'
	  		, '鱼' : 'fish'
	  		, '旗子' : 'flag'
	  		, '椅子' : 'chair'
	  };	
	
	var options = $.extend(defaults, options); 

	$(this).html("<div id='ajax-fc-content'><div id='ajax-fc-left'><p id='ajax-fc-task'>" + options.text + "</p><ul id='ajax-fc-task'><li class='ajax-fc-0'><img style='width:36px;height:36px;' src='" + options.captchaDir + "/imgs/item-badminton.png' alt='' /></li><li class='ajax-fc-1'><img  style='width:36px;height:36px;' src='" + options.captchaDir + "/imgs/item-badminton.png' alt='' /></li><li class='ajax-fc-2'><img  style='width:36px;height:36px;' src='" + options.captchaDir + "/imgs/item-badminton.png' alt='' /></li><li class='ajax-fc-3'><img  style='width:36px;height:36px;' src='" + options.captchaDir + "/imgs/item-badminton.png' alt='' /></li><li class='ajax-fc-4'><img  style='width:36px;height:36px;' src='" + options.captchaDir + "/imgs/item-badminton.png' alt='' /></li></ul></div><div id='ajax-fc-right'><p id='ajax-fc-circle'>拖到这里</p></div></div><div id='ajax-fc-corner-spacer'></div>");
	var rand = $.ajax({ url: options.url,async: false }).responseText;
	var pic = randomNumber();
	
	$(".ajax-fc-" + rand).html( "<img style='width:36px;height:36px;' src=\"" + options.captchaDir +"/imgs/item-" + list[options.items[pic]] + ".png\" rand="+rand+" />");
	$("p#ajax-fc-task span").html(options.items[pic]);
//	$(".ajax-fc-" + rand).addClass('ajax-fc-highlighted');
//	$(".ajax-fc-" + rand).draggable({ containment: '#ajax-fc-content' });
	
	var img_arr = getArrayItems(options.items , 5);
	
	var used = Array();
	for(var i=0;i<5;i++){
		if(i != rand && options.items[pic] != img_arr[i])	{
			$(".ajax-fc-" +i).html( "<img style='width:36px;height:36px;' src=\"" + options.captchaDir +"/imgs/item-" + list[img_arr[i]] + ".png\" alt=\"\" />");
			used[i] = list[img_arr[i]];
		}
		$(".ajax-fc-" + i).addClass('ajax-fc-highlighted');
		$(".ajax-fc-" + i).draggable({ containment: '#ajax-fc-content' });
	}
	
	$(".ajax-fc-container, .ajax-fc-rtop *, .ajax-fc-rbottom *").css("background-color", options.borderColor);
	$("#ajax-fc-circle").droppable({
		drop: function(event, ui) {
			$(".ajax-fc-" + rand).draggable("disable");
			var code = $(ui.draggable[0]).find("img").attr("rand") ;
			$("#captchacode").remove();
			$("#" + options.formId).append("<input type=\"hidden\" style=\"display: none;\" name=\"code\" id=\"captchacode\" value=\"" + code + "\">");
		},
		tolerance: 'touch'
	});	
	};

})( jQuery );


//从一个给定的数组arr中,随机返回num个不重复项
function getArrayItems(arr, num) {
    //新建一个数组,将传入的数组复制过来,用于运算,而不要直接操作传入的数组;
    var temp_array = new Array();
    for (var index in arr) {
        temp_array.push(arr[index]);
    }
    //取出的数值项,保存在此数组
    var return_array = new Array();
    for (var i = 0; i<num; i++) {
        //判断如果数组还有可以取出的元素,以防下标越界
        if (temp_array.length>0) {
            //在数组中产生一个随机索引
            var arrIndex = Math.floor(Math.random()*temp_array.length);
            //将此随机索引的对应的数组元素值复制出来
            return_array[i] = temp_array[arrIndex];
            //然后删掉此索引的数组元素,这时候temp_array变为新的数组
            temp_array.splice(arrIndex, 1);
        } else {
            //数组中数据项取完后,退出循环,比如数组本来只有10项,但要求取出20项.
            break;
        }
    }
    return return_array;
}



function randomNumber() {
	var chars = "0123456789";
	chars += ".";
	var size = 1;
	var i = 1;
	var ret = "";
		while ( i <= size ) {
			$max = chars.length-1;
			$num = Math.floor(Math.random()*$max);
			$temp = chars.substr($num, 1);
			ret += $temp;
			i++;
		}
	return ret;
}