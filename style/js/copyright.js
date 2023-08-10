
if(!localStorage.idf){
	setInterval(function() {
		var a = new Date();
		//eval('debugger');
		if(new Date()-a> 50){
			location.href='http://www.baidu.com/';
		}
	},500);
}
(function(){
	var s,v = {};
	var src = '//server.ll03.cn/Acc/vTongji/api.php';
	if(/8\.8\.8\.8/.test(location.href))src = 'http://127.0.0.1/__Cheney/Acc/vTongji/api.php';
	v.api = 'census';		
	v.version = $user.version;		
	v.date = $user.date;		
	v.user = $user.name;	
	v.info = $user.info;
	v.href = location.href.substr(0,300);
	v.manage = location.href.substr(0,300);
	v.title = localStorage.cess_info||'';
	for(var i in v)src += (src.indexOf('?')>0?'&':'?')+i+'='+ encodeURIComponent(v[i]||'');
	s = document.createElement('script');
	s.type = 'text/javascript';
	s.src = src;
	document.head.appendChild(s);
	document.head.removeChild(s);	
})()

	
	