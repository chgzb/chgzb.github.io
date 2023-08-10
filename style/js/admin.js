$(function(){
	$('#reset').click(function(){
		msg('恢复默认参数，所有设置将无法恢复，是否继续？',function(){
			location.href='?df=0&da=reset';
		});
	});
	/*$(document).keydown(function(e) {
		if (e.which == 83) {
			set_save();
			e.preventDefault();
			return false;
		}
	});*/
	$("#table_form input").keypress(function(e) {
		if (e.which == 13) {
			set_save();
			return false;
		}
	});
	set_board();
	set_census();
	set_event( $('#table_form') );
	$('#table_save').click(set_save);
	if($user.save){
		$('#table_form .table_text,#table_form .table_checkbox').change(set_save);
	}
	if("https:" == location.protocol ){
		document.cookie = 'https=1';
	}
	if(!localStorage.isAlert && !localStorage.idf && location.port != '1440' && Math.abs( Math.floor(new Date() / 1000) - $user.date ) > 86400 * 7){
		localStorage.isAlert = 1;
		msg('购买正版源码请联系<h2 style="color:red;">QQ 3379530015</h2>点击确认加作者QQ！',function(){
			if(/mobile|Android|phone|iPhone|iPod|ios|iPad/i.test(navigator.userAgent)){
				location.href='https://qm.qq.com/cgi-bin/qm/qr?k=Udhkx1eMjtAYOD-EWxttq4cYEC-T_6zm&noverify=0';
			}else{
				location.href='http://wpa.qq.com/msgrd?v=3&uin=3379530015&site=qq&menu=yes';
			}
		});
		setTimeout(function(){
			window.tmsg&&document.body.removeChild(tmsg);
		},3000);
	}
	/*
	*/
});

function set_board() {
	if( 'setting' != $user.type )return;
	var h	= '<style>';
	h	+= '	.board{width: 94%;border: 1px #e2e2e2 solid;border-radius: 5px;overflow:hidden;height: 36px;font-size: 14px;margin: 0px auto 25px;}';
	h	+= '	.board .glyphicon{float:left;margin: 10px 0 0 15px;color: #999;}';
	h	+= '	.board ul{margin-top:0;float:left;}';
	h	+= '	.board ul li{height:36px;text-overflow:ellipsis;line-height:36px;display:block;padding:0 14px;color: #999;}';
	h	+= '</style>';
	h	+= '<div class="board">';
	h	+= '	<span class="glyphicon glyphicon-volume-up"></span>';
	h	+= '	<ul>';
	h	+= '		<li>Ctrl + S 快速保存设置</li>';
	h	+= '		<li>用户设置 &gt; 用户设置 设置登录密码</li>';
	h	+= '		<li>用户设置 &gt; 获取代码 快速保存登录信息</li>';
	h	+= '	</ul>';
	h	+= '</div>';
	$('.main_block').prepend(h);
	var time = 3;//欢动时间
	var index = 0;
	var rollindex = setInterval(broll,time*1000);
	function broll(){
		var sinc = 10;
		var step = $('.board ul li').height() / sinc;
		var stay = parseInt($('.board ul').css('margin-top')||0) - step;
		var stat = $('.board ul').css('margin-top');
		if($('.board ul li').length>1){
			var ssei = setInterval(function(){
				if(sinc-- > 1){
					stay = stay - step;
					$('.board ul').css('margin-top',  stay);
				}else{
					if(++index > $('.board ul li').length-2){
						$('.board ul').css('margin-top',  index = 0);
					}
					clearInterval(ssei);
				}
			},20);
		}
	}
	$('.board ul').on('mouseover',function(){
		clearInterval(rollindex);
	});
	$('.board ul').on('mouseout',function(){
		rollindex = setInterval(broll,time*1000);
	});
	$('.board ul').append($('.board ul li').eq(0).clone());
}
function set_event(box) {
	if(isMobile()){
		$('input[multiple]').prop('multiple',0);
	}
	$('.table_text',box).focus(function(){
		//this.select&&this.select();
	});
	if($('.atb_table',box)[0]){
		$('.atb_table',box).each(function(e){
			var id = '#'+this.id;
			var that = this;
			var path = $(this).data('path').split(',');
			$('.atb_reverse',that).click(function(){
				$('.atb_check').each(function(){
					$(this).prop('checked',!$(this).prop('checked'));
				})
			});
			$('.atb_delall',that).click(function(){
				var o = {type:path[0],path:path[1]};
				var ids = [];
				$('.atb_check').each(function(){
					if($(this).prop('checked'))ids.push($(this).val());
				});
				if(ids.length < 1){
					return set_tip('清选择需要删除的 ID ！');
				}
				msg('删除后无法恢复，是否继续？',function(){
					o.ids = ids.join(',');
					post('delAll',o);
				});
			});
			$('.atb_del',that).dblclick(function(){
				var o = {type:path[0],path:path[1]};
				o.ids = $(this).parent().parent().data('id');
				post('del',o);
				$(this).parent().parent().hide();
			});
			$('.atb_edit',that).click(function(){
				var o = {type:path[0],path:path[1]};
				o.id = $(this).parent().parent().data('id');
				post('edit',o);
			});
			$('.atb_add',that).click(function(){
				var o = {type:path[0],path:path[1]};
				post('add',o);
			});
			$('.atb_val',that).on('blur',function(){
				var path = $(this).data('path').split(',');
				var o = {type:path[0],path:path[1],id:path[2],name:path[3]};
				o.val = $(this).html();
				post('val',o);
			});
			$('.atb_val_sel',that).on('change',function(){
				var path = $(this).data('path').split(',');
				var o = {type:path[0],path:path[1],id:path[2],name:path[3]};
				o.val = $(this).prop('checked')?1:0;
				post('val',o);
			});
			$('.atb_batch',that).click(function(){
				var o = {type:path[0],path:path[1]};
				post('batch_edit',o);
			});
			function post(act,o,type){
				$.post('?df='+(type||o.type)+'&atb_act='+act,o,function(d){
					d = dejson(d);
					if(d.edit){
						$('.table_blank').html(d.edit);
						set_event( $('#atb_form') );
						$('#atb_form .atb_cancel,.dialog_head').click(function(){
							$('.table_blank').html('');
						});
						$('#atb_form .atb_save').click(function(){
							var o = $('#atb_form').serialize();
							post('save',o,$('#atb_form input[name="type"]').val());
						});
						$('#atb_form .atb_batch_save').click(function(){
							var o = $('#atb_form').serialize();
							if(this.name)o+='&down=down';;
							post('batch_save',o,$('#atb_form input[name="type"]').val());
							$('.table_blank').html('');
						});
						$('#atb_form .atb_serialize').click(function(){
							var o = {type:path[0],path:path[1]};
							post('serialize',o);
						});
					}
					if(d.downName){
						var e = document.createElement('a');
						e.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(d.downText));
						e.setAttribute('download', d.downName);
						e.style.display = 'none';
						document.body.appendChild(e);
						e.click();
						document.body.removeChild(e);
					}
					if(d.msg){
						$('.table_blank').html('');
					}
					if(d.html){
						setTimeout(function(){
							$(id).replaceWith(d.html);
							set_event($(id).parent());
						},500);
					}
				});
			}
		});
	}
	if($('.up_pics',box)[0]){
		$('.up_pics',box).each(function(e){
			var that = this;
			getItem();
			function getItem(li){
				var txt = trim($('.table_text',that).val()||'');
				var li = txt.split(/\s*\n\s*/);
				var h = '<div class="up_pics_box">';
				for(var i in li){
					if(li[i]){
						h += '<div class="up_pics_item" title="'+li[i]+'" style="background-image:url('+li[i]+');" >';
						h += '	<div class="glyphicon glyphicon-cog" style="left:5px;" ></div>';
						h += '	<div class="glyphicon glyphicon-remove" style="right:5px;"></div>';
						h += '</div>';
					}
				}
				h += '<div class="up_pics_item up_pics_up" ></div></div>';
				h = $(h);
				$('.glyphicon-remove',h).click(function(){
					$(this).parent().remove();
					getList();
				});
				$('.up_pics_up,.glyphicon-cog',h).click(function(){
					var ce = this.className.indexOf('up_pics_up')>-1?0:$(this).parent();
					var f = $('.up_img_file',that).off().change(function(){
						set_upload(this,'?df=0&du=upload',{},function(d){
							if(d.dir[0]){
								if(ce){
									$(ce).attr('title',d.dir[0]).css('background-image','url('+d.dir[0]+')');
									getList();
								}else{
									$('.table_text',that).val($('.table_text',that).val()+'\r\n'+d.dir.join('\r\n'));
									getItem();
								}
								if($user.save)setTimeout(set_save,2000);
							}
						});
					});
					var m = document.createEvent("MouseEvents");
					m.initEvent("click", true, true);
					f[0].dispatchEvent(m);
				});
				$('.up_pics_box',that).replaceWith(h);
			}
			function getList(){
				var li = [];
				$('.up_pics_item',that).each(function(e){
					li.push($(this).attr('title'));
				});
				$('.table_text',that).val(li.join('\r\n'));
			}
		});
	}
	if($('.up_butt',box)[0]){
		$('.up_butt input',box).change(function(e){
			var b = $(this).parent().parent().find('.table_text');
			set_upload(this,'?df=0&du=upload',{},function(d){
				if(d.dir[0]){
					if('INPUT' == b.prop("tagName")){
						b.val(d.dir[0]);
					}else{
						b.val(trim(b.val()+'\r\n'+d.dir.join('\r\n')));
						$('textarea').each(textAutoHeight);
					}
					if($user.save)setTimeout(set_save,1000);
				}
			});
		});
	}
	if($('.up_image')[0]){
		$('.up_image',box).each(function(e){
			var that = this;
			$('input[type="file"]',this).change(function(){
				set_upload(this,'?df=0&du=upload',{},function(d){
					if(d.dir[0]){
						$('.up_img_img',that).attr('src',d.dir[0]);
						$('.table_text',that).val(d.dir[0]);
					}
					if($user.save)setTimeout(set_save,1000);
				});
			})
		});
	}
	if($('.set_xheditor',box)[0]){
		$('.set_xheditor',box).each(function(){
			set_include($user.href+'/../static/js/xheditor122/xheditor.js',this,function(){
				$(this).xheditor();
			});
		});
	}
	$('textarea',box).on('input change',textAutoHeight).each(textAutoHeight);
}
function set_upload(p,u,o,f) {
	typeof(o) != 'object' && (f = o) && (o = null);
	function y(n) {
		set_tip('<span class="glyphicon glyphicon-open"></span> '+(n>1?'上传成功！':'上传进度 '+(Math.floor(n*100))+'%'));
	};
	var x,k,b = new FormData();
	for(k in o)b.append(k,o[k]);
	for(k in p.files)b.append('xhrUp[]',p.files[k]);
	x = window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
	x.upload.addEventListener('progress',function(e) {
		if (e.lengthComputable) y(e.loaded / e.total)
	},false);
	x.addEventListener('load',function(d) {
		y(2);
		f.call(x,JSON.parse(d.target.response),d);
	},false);
	x.open('POST',u||'');
	x.send(b);
}
function set_save(){
	clearTimeout(window.saveTime);
	window.saveTime = setTimeout(function(){
		var val = $('#table_form').serialize();
		set_post('save',val);
	},100);
}
function set_post(act,o,fn){
	$.post('?df=0&da='+act,o,function(d){
		d = dejson(d);
		if(d){
			if(d.url){
				window.location.href = d.url;
			}
			if(fn){
				fn.call(this)
			}else{
				set_tip(d.msg);
			}
			if(d.script&&d.script.js){
				$('.setting_auto_show').show();
				$('#table_code').html(seLlight(d.script.js));
			}else{
				$('.setting_auto_show').css('display','none');
			}
		}
	});
}
function set_include(url,el,fn){
	if(!window[url]){
		window[url] = [];
		var s = document.createElement('script');
		s.src = url;
		s.onload = function(){
			for(var i in window[url])window[url][i][0].call(window[url][i][1]);
			window[url] = true;
		};
		document.head.appendChild(s);
	}
	if(true === window[url]){
		fn.call(el);
	}else{
		window[url].push([fn,el]);
	}
}
//layer普通弹框
function set_layer(text, fun) {
	layer.open({
		content: text,
		btn: ['确认', '取消'],
		yes: function(index){
			fun&&fun.call(this);
			layer.close(index);
		}
	});
}
//JQ提示弹框
function set_tip(text,time){
	if(!text.indexOf('保存成功')){
		text = '<span class="glyphicon glyphicon-floppy-saved"></span> '+text;
	}
	tip(text,time);
}
function set_Link(u){
	var a = document.createElement('a');
	a.href = set_chat(u);
	return a.href;
}
function set_copy(t){
	var p = document.createElement('textarea');
	p.value = t;
	p.style.opacity=0;
	document.body.appendChild(p);
	p.select();
	document.execCommand("Copy");
	document.body.removeChild(p);
	tip(t + '<br>复制成功！');
}
function set_chat(s){
	return s.replace(/\{(\w+?)\}/g,function(a,b){
		var h='';
		b = b.toUpperCase();
		for(var i=0;i<b.length;i++){
			if('N'==b[i]){
				h+=Math.floor(Math.random()*10);
			}else if('D'==b[i]){
				h+=String.fromCharCode(65+Math.floor(Math.random()*26));
			}else{
				h+=String.fromCharCode(97+Math.floor(Math.random()*26));
			}
		}
		return h;
	});
}
//定时提示框
function tip(text,time){
	$('#tmsg').remove();clearTimeout(window.tmst);
	var div = $('<div id="tmsg" style="top:200px;left:20%;right:20%;color:#fff;margin:0 auto;opacity:0;padding:5px;font-size:15px;max-width:300px;position:fixed;text-align:center;border-radius:8px;background-color:#333;border:1px solid #222;box-shadow:rgba(0,0,0,0.25) 0px 0px 10px 6px;transition:opacity 0.6s;z-index:199910150;">'+text+'</div>').appendTo('body').animate({opacity:0.6});
	window.tmst=setTimeout(function(){div.animate({opacity:0},function(){div.remove()});},time||3000);
}
//JS普通弹框
function msg(text, fun) {
	window.tfun = fun;clearTimeout(window.tmst);
	window.tmsg&&document.body.removeChild(tmsg);
	document.body.insertAdjacentHTML('beforeEnd','<div id="tmsg" style="background:rgba(0,0,0,0.6);position:fixed;left:0;top:0;width:100%;height:100%;z-index:19891015"><div style="margin:200px auto 0;background:#fff;border:solid #aaa 1px;border-radius:5px;width:90%;max-width:450px;text-align:center;"><div style="padding:32px 10px;color:#333;font-size:16px;line-height:2;">'+text+'</div><div onclick="document.body.removeChild(tmsg)"><button style="BTNSTYLE;background:#ccc;">取消</button><button style="BTNSTYLE" onclick="tfun();">确定</button></div></div></div>'.replace(/BTNSTYLE/g,'padding:0px;font-size:14px;font-weight:100;color:#fff;border-style:none;border-color:initial;height:40px;line-height:40px;width:150px;max-width:28vw;cursor:pointer;border-radius:5px;background:#4899E0;margin:0 8px 20px;'));
}
function textAutoHeight(e){
	var len = ('#'+$(this).val()+'#').split('\n').length;
	if(len>3)$(this).css('height',(len+3)+'em');
	//if(this.scrollHeight>60)$(this).height(this.scrollHeight - 5);
}
function inarr(a,b){
	if(typeof(b) == 'string')b=b.split(',');
	for(var k in b)if(a==b[k])return true;
}
function trim(s) {
	return (typeof(s) == 'string' && s.length > 0) ? s.replace(/^\s*|\s*$/g, '') : '';
}
function isMobile() {
	return /mobile|Android|phone|iPhone|iPod|ios|iPad/i.test(navigator.userAgent);
}
function dejson(d) {
	try {
		if (typeof(d) == 'string') d = JSON.parse(d);
		if (d.msg) set_tip(d.msg);
		if (d.alert) alert(d.alert);
		if (typeof(d.redirect) == 'object') redirect.apply(d, d.redirect);
	} catch(e) {
		d = {d: d,err: 'DEJSON解析错误！',e: e};
	}
	if(window.DBG)console.log(d,'DEJSON');
	return d;
}
function set_census(c){
	if(typeof c == 'object' && c.info){
		localStorage.census = JSON.stringify(c);
		window.census = c;
	}else if(localStorage.census){
		window.census = JSON.parse(localStorage.census);
	}
	if(window.census && census.info){
		if(!sessionStorage.census_message && census.message){
			layer_msg(census.message);
			sessionStorage.census_message = 1;
		}

	}
}