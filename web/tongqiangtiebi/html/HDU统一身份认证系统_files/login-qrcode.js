$("head").append("<link>");
$("head").children(":last").attr({
	rel: "stylesheet",
	type: "text/css",
	href: getRootPath_web()+"/comm/css/code.css"
});
var loginQRCode = function(target,width,height,colorDark,colorLight){
	this.target = target;
	this.width = (width == null)? 128:width;
	this.height = (height == null)? 128:height;
	this.colorDark = (colorDark == null)? "#000000":colorDark;
	this.colorLight = (colorLight == null)? "#ffffff":colorLight;
	this.int = null;
};
loginQRCode.prototype.generateUUID = function() {
	var d = new Date().getTime();
	var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
	  var r = (d + Math.random()*16)%16 | 0;
	  d = Math.floor(d/16);
	  return (c=='x' ? r : (r&0x3|0x8)).toString(16);
	});
	return uuid;
};
loginQRCode.prototype.generateLoginQRCode = function(callback){
	var obj = this;
	var uuid = this.generateUUID();
	var target = this.target;
	var width = this.width;
	var height = this.height;
	var qrcode = new QRCode(document.getElementById(target), {
	    width: this.width,
	    height: this.height,
	    colorDark : this.colorDark,
	    colorLight : this.colorLight,
	    correctLevel : QRCode.CorrectLevel.L
	});
	qrcode.makeCode(getRootPath_web()+"/"+"qyQrLogin?uuid=" + uuid);
	var timesRun = 0;
	var interval = setInterval(function(){
		timesRun += 1;
		if(timesRun === 60){
			clearInterval(interval);
			$("#"+target).addClass("code-box");
			$("#"+target).append("<div class='code-gray'>" +
					"<p class='code-fail'>二维码已失效</p>" +
					"<button class='code-refresh'>刷新</button>" +
					"</div>");
			var codeFail = function(a){
			    var wd = width;
			    var ht = height;
			    var fz1 = wd * 0.1;
			    var fz2 = wd * 0.1;
			    $(".code-box").css({"width":wd,"height":ht});
			    $(".code-gray").css({"width":wd,"height":ht});
			    $(".code-fail").css("font-size",fz1);
			    $(".code-refresh").css("font-size",fz2);
			};
			codeFail();
			$(window).resize(function(){
			    codeFail();
			});
			$(".code-refresh").click(function(){
				$("#" + target).empty();
				obj.generateLoginQRCode(callback);
		    });
		}
		$.ajax({  
		    url:getRootPath_web()+"/checkQRCodeScan?uuid=" + uuid,  
		    dataType:'json',  
		    success:function(result) {  
	    		clearInterval(interval);
	    		callback(result);
		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) {
			},
			complete: function(XMLHttpRequest, textStatus) {
			}
		});
	}, 2000);
	this.int = interval;
};
loginQRCode.prototype.clear = function() {
	$("#" + this.target).empty();
	clearInterval(this.int);
};

function getRootPath_web() {
    var curWwwPath = window.document.location.href;
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    var webPath = curWwwPath.substring(0, pos);
    var projectName = pathName.substring(0, pathName.substr(1).indexOf('/') + 1);
    return (webPath + projectName);
}
