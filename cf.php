<?php
ini_set("display_errors", "On");
error_reporting(E_ALL ^ E_NOTICE);
ini_set('max_execution_time', 150);
/*if(is_file($df=  'D:\www\test\__Cheney\Acc\vAdm2\inc_creat.php' ))include($df);
if(is_file($dc='./web-creat.php'))include($dc);*/

class Index extends Admin{
	public function onSave($conf,$user){
		foreach($conf as $key=>$val)if(in_array($key,array('rise','site','user','pass')))unset($conf[$key]);
		$js = "//参数代码\r\nvar conf = ".json_encode($conf).";\r\n";
		if($conf['census']>0&&$user['cess']>0)$js .="//统计代码EcCensus\r\ndocument.write('<script src=\"'+host+'/mp/cess.php?id=5\"><\\/script>');\r\n";
		if(!empty($conf['tongji']))$js .= "//统计代码\r\ndocument.write(".json_encode('<div style="display:none;">'.$conf['tongji'].'</div>').");\r\n";
		file_put_contents('./mp/config.js',urldecode('%EF%BB%BF').$js);
	}
	public $form		=	array(
		'home' => './',
		'code' => './mp/config.js',
		'index' => 'setting',
		'setting' => array(
			'name' => '参数设置',
			'icon' => 'th-large',
			'list' => array(
				'home' => array(
					'title' => '参数列表',
					'html' => '{home}/',
					'name' => '测试地址',
					'info' => '点击此处测试',
				),
				'ready' => 'textarea|结尾跳转|观看结束的跳转地址',
				'topad' => array(
					'type' => 'textarea',
					'name' => '顶部广告',
					'info' => '顶部广告地址',
					'demo' => 'http://www.baidu.com/',
				),
				'btn2' => '按钮2|按钮文字2',
				'url2' => 'textarea|加群2|加群地址2',
				'btn3' => '按钮3|按钮文字3',
				'url3' => 'textarea|加群3|加群地址3',
//				'img4' => array(
//					'type' => 'image',
//					'name' => '底部广告',
//					'info' => '底部广告图片',
//				),
//				'pre' => array(
//					'type' => 'number',
//					'name' => '分享位置',
//					'info' => '分享位置（百分比）',
//				),
				'btn4' => '按钮4|按钮文字4',
				'url4' => 'textarea|加群4|加群地址4',
				'title' => '网站标题|网站标题',
				'adth1' => '提示开始|分享描述结尾',
				'adthe' => '提示结尾|分享描述结尾',
				'adthe' => '提示结尾|分享描述结尾',
				'timeTip' => '延时提示|分享描述结尾',
				'timeOut' => '延时时间|延时时间。多少秒后提示弹框',
				'timeSrc' => '延时跳转|点确认多少的跳转地址',
				'img1' => 'image|顶部广告|顶部广告图片',
				'sInfo' => array(
					'title' => '分享设置',
					'type' => 'textarea',
					'name' => '分享提示',
					'info' => '分享提示文字',
				),
				'sText' => 'textarea|分享文字|分享文字， ### 代表分享的地址',
				'sEnd' => 'textarea|复制提示|复制成功提示',
				'shu' => array(
					'info' => '点击卡片要跳转的方向（格式带http://），<br>默认值 ?_wv={www}&f=FROM&{www}={wwwwnnn} <br>建议不填',
				),
			),
		),
		'video' => array(
			'name' => '其他设置',
			'icon' => 'film',
			'list' => array(
				'title' => array(
					'title' => '其他设置',
				),
				'vdef' => 'number|默认次数|用户可以看几个视频',
				'vadd' => 'number|增加次数|用户分享可以看几个视频',
				'cache' => '',
				'tongji' => '',
				'm3u8' => 'switch|视频格式|支持模拟型 m3u8 格式视频',
				'mobile' => '',
				'census' => '',
				'videos' => array(
					'title' => '视频设置',
					'name' => '视频列表',
					'type' => 'textarea',
					'file' => '请上传视频列表',
					'info' => '视频列表，一行一个',
				),
			),
		),
	);
	public $setting		=	array(
		'rise' => 0,
		'site' => '鼎丰裂变引流程序',
		'path' => '0',
		'user' => 'admin',
		'pass' => '123456',
'pre' => '15',
'm3u8' => '0',
'img1' => './images/top.gif',
'img1' => './images/topad.jpg',
'img4' => './images/bot.gif',
'timeTip' => '更多精彩视频尽在<span style="color:red">精选/精品</span>平台',
'timeOut' => '50',
'timeSrc' => 'http://www.baidu.com/',
		'census' => '1',
		'deny' => '0',
		'vdef' => '5',
		'vadd' => '5',
		'cache' => '86400',
		'adth1' => '分享好友后获得+5次的刷新机会<br><br>提示朋友打开才管用呦！<br><img src="images/here.png" style="width:90%;margin-top:13px;border-radius:5px;">',
		'adthe' => '分享好友后获得+5次的刷新机会<br><br>提示朋友打开才管用呦！',
		'title' => 'QQ资源',
		'topad' => 'http://www.baidu.com/',
		'sInfo' => "没有观看次数了！\r\n①请复制转发到Q群 增加观看次数\r\n②每有一人打开你就增加5次\r\n③没有人打开不增加次数",
		'sText' => "各种网红大瓜？等你来开？弟兄们速度上车！！###",
		'sEnd' => "复制成功,返回QQ,粘贴发送到Q群吧",

		'shu' => '',


		'tongji' => '',
		'ready' => 'http://qm.qq.com/cgi-bin/qm/qr?k=eQkTaSZmzQq4TxNzqRN633RWLcBTee1Y',

		'btn2' => '最新色播APP-点这下载',
		'url2' => 'http://www.baidu.com/',
		'btn3' => 'VIP线路高清原创速度快秒打开',
		'url3' => 'http://www.baidu.com/',
		'btn4' => '点 这 里 进 QQ 群 无 限 看',
		'url4' => 'http://www.baidu.com/',
		'videos' => "http://cyberplayer.bcelive.com/videoworks/mda-kbuhu4wqdi08dwix/cyberplayer/mp4/cyberplayer-demo.mp4
http://cyberplayer.bcelive.com/videoworks/mda-kbuhu4wqdi08dwix/cyberplayer/mp4/cyberplayer-demo.mp4
http://cyberplayer.bcelive.com/videoworks/mda-kbuhu4wqdi08dwix/cyberplayer/mp4/cyberplayer-demo.mp4",
	);
}

class Admin{
	public $reload		= 0;
	public $config		= array();
	public $storage		= './mp/config.php';
	public $version		= array (

	);
	public function __construct(){

		if(!isset($_SESSION)){
			session_start();
		}
		if(is_file($this->storage)){
			$this->config=unserialize(include($this->storage));
		}
		if(isset($_GET['du'])){
			$this->get_action();
		}else{

			$this->get_admin();
		}
	}
	public function get_action(){
		if($_GET['du']=='upload'){
			$json=array('err'=>0,'msg'=>'上传成功');
			for($key=0;$key<count($_FILES['xhrUp']['name']);$key++){
				$path='./upload/'.date('YmdHis').$key.'.'.pathinfo($_FILES['xhrUp']['name'][$key],PATHINFO_EXTENSION);
				if(!is_dir(dirname($path)))mkdir(dirname($path),0777,true);
				if(preg_match('/\.(jpg|jpeg|png|gif|bmp|mp4|zip|doc|txt)$/',$path) && move_uploaded_file($_FILES['xhrUp']['tmp_name'][$key],$path)){
					if(!empty($this->config['path']))$path = ($this->config['path']==2?dirname('//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']):'').trim($path,'.');
					$json['dir'][] = $path;
				}else{
					$json['msg']='上传失败';
					$json['err']=1;
				}
			}
			exit(json_encode($json));
		}
	}
    public function make_js($config){
        $re = file_get_contents('foo.txt');

        $df = json_decode($re,true);

        foreach($df as $a=>$v){
            if(isset($config[$a])){
                $df[$a] = $config[$a];
            }
        }
        return json_encode($df);
    }
	public function get_admin($data = array()) {
		$data['user'] = $this->version;

		$data['user']['path']= str_replace('\\','/',__FILE__);
		$data['user']['host']=(empty($_SERVER['HTTPS'])?'http://':'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$data['user']['addr']=$this->get_ip();
		$data['user']['rise']=empty($this->config['rise'])?0:$this->config['rise'];
		$data['user']['cess']=0;
		$sign = md5(serialize([$this->form]));

		if(is_file($cessFile = './mp/cess.php')){
			include_once $cessFile;
			if(class_exists('EcCensus')){
				$data['user']['cess'] = EcCensus::$edition;
			}
		}
		if(isset($GLOBALS['testUser']))$data['user']=array_merge($data['user'],$GLOBALS['testUser']);
		if(empty($_SESSION['sign'])||$sign!=@$_SESSION['sign']||'reload'==@$_GET['da'])$this->reload = 1;
		if(empty($this->config)||!empty($this->reload)){
			$_SESSION['sign'] = $sign;
			$data['form']=$this->form;
			$data['conf']=$this->config=(empty($this->config)||count($this->config)<5)?$this->setting:$this->config;
			if(isset($GLOBALS['testConf']))$data['conf']=array_merge($data['conf'],$GLOBALS['testConf']);
		}
        //var_export($data['user']);die();
		if(!empty($_GET))$data['_GET']=$_GET;
        $login = include './mp/login.php';
        $login = unserialize($login);
        if($_GET['da'] == 'reset'){
            file_put_contents('./mp/config.php',file_get_contents('./mp/config_bak.php'));
            file_put_contents('./mp/config.js',file_get_contents('./mp/config_bak.js'));
            header('location:/cf.php');
            die();
        }
        if((!isset($_SESSION['log'])||$_SESSION['log']['user'] != $login['user'])||$_GET['da'] == 'logout'){


            if(!empty($_POST['log'])) {
                if($_POST['log']['user'] == $login['user']&&$_POST['log']['pass'] == $login['pass']){
                    $_SESSION['log']['user'] = $_POST['log']['user'];
                    exit(json_encode(array('err'=>0,'msg'=>'登陆成功~','url'=>'./cf.php')));
                }else{

                    exit(json_encode(array('err'=>0,'msg'=>'登陆失败~')));
                }
            }else{
                $_SESSION['log']['user'] = '';
            }
            include './cf/view/logout.php';
            die();
        }
        if(!empty($_POST['login'])) {

            foreach ($_POST['login'] as $a => $v) {
                $login[$a] = $v;
            }
            $data['_POST'] = $_POST;
            $serialize = serialize($login);
            $mb = file_get_contents('./mp/login_mb.php');
            $str = str_replace('{replace}', $serialize, $mb);
            file_put_contents('./mp/login.php', $str);
            $data['_POST'] = $_POST;
        }
		if(!empty($_POST['conf'])){

            $config = include './mp/config.php';
            $config = unserialize($config);
            foreach($_POST['conf'] as $a=>$v){
                $v = str_replace('\\','/',$v);
                $config[$a] = $v;
            }
            $data['_POST']=$_POST;
            $serialize = serialize($config);
            $mb = file_get_contents('./mp/config_mb.php');
            $str = str_replace('{replace}',$serialize,$mb);
            file_put_contents('./mp/config.php',$str);
            $data['_POST']=$_POST;

            $js = $this->make_js($config);
            $js = 'var conf = '.$js.';';
            file_put_contents('./mp/config.js',$js);
            exit(json_encode(array('err'=>0,'msg'=>'保存成功~','json'=>$json)));

        }
        $df = isset($_GET['df'])?$_GET['df']:'setting';
        $df = $df?$df:'setting';
        $file = './cf/view/'.$df.'.php';
        if(!is_file($file)){
            $file = './cf/view/setting.php';
        }
        $config = include './mp/config.php';
        $config = unserialize($config);
        $arr = [];
        foreach($config as $a=>$v){
            $arr[$a] = htmlentities($v);
        }
        //var_export($config);die();
        $config = $arr;


        $login = include './mp/login.php';
        $login = unserialize($login);
        $arr = [];
        foreach($login as $a=>$v){
            $arr[$a] = htmlentities($v);
        }
        //var_export($config);die();
        $login = $arr;
        include $file;

	}
	public function get_ip(){
		if(getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
			$ip = getenv("HTTP_CLIENT_IP");
		}else if(getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		}else if(getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")){
			$ip = getenv("REMOTE_ADDR");
		}else if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){
			$ip = $_SERVER['REMOTE_ADDR'];
		}else{
			$ip = '0.0.0.0';
		}
		return $ip;
	}
}
new Index;












